<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use RuntimeException;

/**
 * Lấy danh sách cựu sinh viên từ API bên ngoài và lưu vào bảng `ds_csv`
 * để dùng offline, tránh phụ thuộc API khi đang chạy.
 *
 * Cấu hình trong config/services.php -> 'alumni' (đọc từ .env).
 */
class AlumniSyncService
{
    /** Các tên khóa có thể gặp trong JSON API, map về cột của ds_csv. */
    private const FIELD_MAP = [
        'msv'            => ['msv', 'student_code', 'ma_sv', 'mssv', 'code', 'studentId', 'student_id'],
        'ho_ten'         => ['ho_ten', 'full_name', 'fullname', 'name', 'ten', 'hoten'],
        'lop'            => ['lop', 'class', 'class_name', 'lop_hoc'],
        'khoa'           => ['khoa', 'faculty', 'department', 'khoa_vien'],
        'nganh'          => ['nganh', 'major', 'major_name', 'nganh_hoc'],
        'nam_tot_nghiep' => ['nam_tot_nghiep', 'graduation_year', 'grad_year', 'nam_tn', 'year'],
    ];

    /**
     * Chạy đồng bộ: gọi API -> chuẩn hóa -> upsert theo msv.
     *
     * @return array{fetched:int, inserted:int, updated:int, skipped:int}
     */
    public function sync(): array
    {
        $config = $this->resolveConfig();

        if (empty($config['url'])) {
            throw new RuntimeException(
                'Chưa cấu hình API cựu sinh viên. Vui lòng nhập URL API ở nút "Cấu hình API" trên trang quản trị.'
            );
        }

        $items = $this->fetch($config);

        return $this->upsert($items);
    }

    /**
     * Cấu hình lấy từ DB (admin nhập trên giao diện) trước, thiếu thì fallback về .env.
     *
     * @return array{url:?string, token:?string, data_key:?string, verify_ssl:bool, timeout:int}
     */
    private function resolveConfig(): array
    {
        $default = config('services.alumni');

        $verify = Setting::get('alumni.verify_ssl');

        return [
            'url'        => Setting::get('alumni.url')      ?: ($default['url']      ?? null),
            'token'      => Setting::get('alumni.token')    ?: ($default['token']    ?? null),
            'data_key'   => Setting::get('alumni.data_key') ?: ($default['data_key'] ?? 'data'),
            'verify_ssl' => $verify !== null
                ? filter_var($verify, FILTER_VALIDATE_BOOLEAN)
                : (bool) ($default['verify_ssl'] ?? true),
            'timeout'    => (int) (Setting::get('alumni.timeout') ?: ($default['timeout'] ?? 30)),
        ];
    }

    /** Gọi API và trả về mảng bản ghi thô. */
    private function fetch(array $config): array
    {
        $request = Http::timeout((int) ($config['timeout'] ?? 30))
            ->acceptJson();

        if (!($config['verify_ssl'] ?? true)) {
            $request = $request->withoutVerifying();
        }

        if (!empty($config['token'])) {
            $request = $request->withToken($config['token']);
        }

        try {
            $response = $request->get($config['url']);
        } catch (\Throwable $e) {
            throw new RuntimeException('Không kết nối được tới API: ' . $e->getMessage());
        }

        if (!$response->successful()) {
            throw new RuntimeException(
                'API trả về lỗi HTTP ' . $response->status() . '.'
            );
        }

        $json = $response->json();

        if (!is_array($json)) {
            throw new RuntimeException('Dữ liệu API trả về không phải JSON hợp lệ.');
        }

        // Lấy mảng dữ liệu: theo data_key (hỗ trợ đường dẫn kiểu "data.items") hoặc mảng gốc.
        $dataKey = $config['data_key'] ?? null;

        if (!empty($dataKey) && !array_is_list($json)) {
            $items = data_get($json, $dataKey);
        } else {
            $items = $json;
        }

        if (!is_array($items)) {
            throw new RuntimeException(
                'Không tìm thấy mảng dữ liệu trong JSON.'
                . ($dataKey ? " (đã tìm theo khóa \"{$dataKey}\")" : '')
            );
        }

        return $items;
    }

    /** Chuẩn hóa và ghi vào ds_csv, upsert theo msv. */
    private function upsert(array $items): array
    {
        $fetched  = 0;
        $inserted = 0;
        $updated  = 0;
        $skipped  = 0;

        DB::transaction(function () use ($items, &$fetched, &$inserted, &$updated, &$skipped) {
            foreach ($items as $item) {
                if (!is_array($item)) {
                    $skipped++;
                    continue;
                }

                $fetched++;

                $msv    = $this->pick($item, self::FIELD_MAP['msv']);
                $hoTen  = $this->pick($item, self::FIELD_MAP['ho_ten']);

                // Bắt buộc có msv và họ tên (cột NOT NULL trong ds_csv).
                if ($msv === null || $msv === '' || $hoTen === null || $hoTen === '') {
                    $skipped++;
                    continue;
                }

                $data = [
                    'ho_ten'         => \Illuminate\Support\Str::limit((string) $hoTen, 255, ''),
                    'lop'            => $this->pick($item, self::FIELD_MAP['lop']) ?: null,
                    'khoa'           => $this->pick($item, self::FIELD_MAP['khoa']) ?: null,
                    'nganh'          => $this->pick($item, self::FIELD_MAP['nganh']) ?: null,
                    'nam_tot_nghiep' => $this->normalizeYear($this->pick($item, self::FIELD_MAP['nam_tot_nghiep'])),
                    'updated_at'     => now(),
                ];

                $msv = \Illuminate\Support\Str::limit((string) $msv, 20, '');

                $exists = DB::table('ds_csv')->where('msv', $msv)->exists();

                if ($exists) {
                    DB::table('ds_csv')->where('msv', $msv)->update($data);
                    $updated++;
                } else {
                    DB::table('ds_csv')->insert(array_merge($data, [
                        'msv'        => $msv,
                        'created_at' => now(),
                    ]));
                    $inserted++;
                }
            }
        });

        return compact('fetched', 'inserted', 'updated', 'skipped');
    }

    /** Lấy giá trị đầu tiên tồn tại trong item theo danh sách khóa ứng viên. */
    private function pick(array $item, array $keys): ?string
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $item) && $item[$key] !== null && $item[$key] !== '') {
                return is_scalar($item[$key]) ? trim((string) $item[$key]) : null;
            }
        }

        return null;
    }

    /** Chuẩn hóa năm tốt nghiệp về 4 chữ số hợp lệ, hoặc null. */
    private function normalizeYear(?string $value): ?int
    {
        if ($value === null) {
            return null;
        }

        if (preg_match('/(\d{4})/', $value, $m)) {
            $year = (int) $m[1];
            if ($year >= 1950 && $year <= 2100) {
                return $year;
            }
        }

        return null;
    }
}
