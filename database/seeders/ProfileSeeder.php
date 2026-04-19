<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $users = User::all();

        if ($users->isEmpty()) {
            $this->command->info('Chưa có user nào, hãy tạo user trước khi chạy seeder này!');
            return;
        }

        // Danh sách dữ liệu mẫu
        $profiles = [
            [
                'msv'            => 'SV2024001',
                'lop'            => 'CNTT01',
                'khoa'           => 'Công nghệ Thông tin',
                'nganh'          => 'Kỹ thuật phần mềm',
                'nam_tot_nghiep' => 2024,
                'phone'          => '0987654321',
                'bio'            => 'Đam mê lập trình Laravel và xây dựng hệ thống.',
                'tinh_thanh'     => 'Hà Nội',
                'status'         => 'active',
            ],
            [
                'msv'            => 'SV2024002',
                'lop'            => 'KTPM02',
                'khoa'           => 'Công nghệ Thông tin',
                'nganh'          => 'Hệ thống thông tin',
                'nam_tot_nghiep' => 2025,
                'phone'          => '0912345678',
                'bio'            => 'Thích tìm hiểu về dữ liệu và AI.',
                'tinh_thanh'     => 'Đà Nẵng',
                'status'         => 'pending',
            ],
            [
                'msv'            => 'SV2024003',
                'lop'            => 'KHMT01',
                'khoa'           => 'Công nghệ Thông tin',
                'nganh'          => 'Khoa học máy tính',
                'nam_tot_nghiep' => 2023,
                'phone'          => '0355667788',
                'bio'            => 'Chuyên gia bảo mật mạng trong tương lai.',
                'tinh_thanh'     => 'TP. Hồ Chí Minh',
                'status'         => 'active',
            ],
        ];

        // Duyệt qua danh sách user và gán dữ liệu từ mảng $profiles
        foreach ($users as $index => $user) {
            // Lấy dữ liệu từ mảng profiles theo vòng lặp (nếu hết thì quay lại từ đầu)
            $data = $profiles[$index % count($profiles)];
            
            // Thêm user_id vào dữ liệu
            $data['user_id'] = $user->id;
            $data['created_at'] = now();
            $data['updated_at'] = now();

            // Sử dụng updateOrInsert để tránh trùng lặp nếu chạy seeder nhiều lần
            DB::table('profile')->updateOrInsert(
                ['msv' => $data['msv']], // Điều kiện kiểm tra trùng (MSV là duy nhất)
                $data
            );
        }
    }
}
