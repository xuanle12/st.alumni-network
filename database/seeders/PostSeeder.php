<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $a = User::where('email', 'a@gmail.com')->first(); // Nguyễn Văn A - admin, KTPM, HN, TN 2024
        $b = User::where('email', 'b@gmail.com')->first(); // Trần Thị B   - alumni, HTTT, Đà Nẵng, TN 2025
        $c = User::where('email', 'c@gmail.com')->first(); // Lê Văn C     - student, KHMT, HCM, TN 2023

        if (!$a || !$b || !$c) {
            $this->command->warn('⚠ Thiếu user. Chạy UserSeeder trước!');
            return;
        }

        DB::table('post')->insert([
            [
                // A - admin, vừa tốt nghiệp 2024, giới thiệu bản thân
                'user_id'        => $a->id,
                'content'        => 'Chào mọi người! 👋 Mình là Văn A, cựu SV lớp CNTT01 – ngành Kỹ thuật Phần mềm, tốt nghiệp 2024. Hiện đang làm việc tại Hà Nội. Rất vui được kết nối với anh chị em trong mạng lưới VNUA! 🎓',
                'category'       => 'normal',
                'likes_count'    => 0, 'comments_count' => 0, 'shares_count' => 1,
                'created_at'     => now()->subDays(2), 'updated_at' => now()->subDays(2),
            ],
            [
                // B - alumni HTTT, đang làm ở Đà Nẵng, tuyển đúng ngành mình
                'user_id'        => $b->id,
                'content'        => 'Công ty mình tại Đà Nẵng đang tuyển vị trí Business Analyst 📊 Ưu tiên cựu SV ngành HTTT hoặc CNTT, có kinh nghiệm phân tích nghiệp vụ, làm việc với SQL. Fresher năng động cũng được cân nhắc! Inbox mình để biết thêm chi tiết nha 🙌',
                'category'       => 'job',
                'likes_count'    => 0, 'comments_count' => 0, 'shares_count' => 3,
                'created_at'     => now()->subDay(), 'updated_at' => now()->subDay(),
            ],
            [
                // C - student năm cuối KHMT, hỏi về ngày hội kết nối
                'user_id'        => $c->id,
                'content'        => 'Mọi người ơi, sắp có Ngày hội kết nối cựu sinh viên VNUA không ạ? 🙋 Mình là Văn C, sinh viên năm cuối ngành Khoa học Máy tính, muốn tham gia để gặp gỡ anh chị và tìm hiểu cơ hội việc làm. Ai có thông tin cho mình hỏi với nhé! 🙏',
                'category'       => 'event',
                'likes_count'    => 0, 'comments_count' => 0, 'shares_count' => 0,
                'created_at'     => now()->subHours(6), 'updated_at' => now()->subHours(6),
            ],
        ]);

        $this->command->info('✓ Đã seed 3 posts thành công!');
    }
}