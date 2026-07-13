<?php

namespace App\Console\Commands;

use App\Services\AlumniSyncService;
use Illuminate\Console\Command;

class SyncAlumni extends Command
{
    protected $signature = 'alumni:sync';

    protected $description = 'Lấy danh sách cựu sinh viên từ API và lưu (upsert theo msv) vào bảng ds_csv';

    public function handle(AlumniSyncService $service): int
    {
        $this->info('Đang đồng bộ danh sách cựu sinh viên từ API...');

        try {
            $r = $service->sync();
        } catch (\Throwable $e) {
            $this->error('Thất bại: ' . $e->getMessage());
            return self::FAILURE;
        }

        $this->info(sprintf(
            'Xong. Nhận %d bản ghi → thêm mới %d, cập nhật %d, bỏ qua %d.',
            $r['fetched'], $r['inserted'], $r['updated'], $r['skipped']
        ));

        return self::SUCCESS;
    }
}
