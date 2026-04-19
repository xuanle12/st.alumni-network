<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $user = User::first();

        if (!$user) {
            $this->command->warn('Chưa có user');
            return;
        }

        DB::table('post')->insert([
            [
                'user_id' => $user->id,
                'content' => 'Chào mọi người 👋 mình vừa tham gia mạng lưới cựu sinh viên VNUA!',
                'category' => 'normal',
                'likes_count' => 5,
                'comments_count' => 2,
                'shares_count' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'content' => 'Công ty mình đang tuyển Laravel Developer 🚀 ai quan tâm ib nhé!',
                'category' => 'job',
                'likes_count' => 12,
                'comments_count' => 4,
                'shares_count' => 3,
                'created_at' => now()->subHours(3),
                'updated_at' => now()->subHours(3),
            ],
            [
                'user_id' => $user->id,
                'content' => 'Hẹn gặp mọi người tại ngày hội kết nối cựu sinh viên 🎓',
                'category' => 'event',
                'likes_count' => 8,
                'comments_count' => 1,
                'shares_count' => 0,
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay(),
            ],
        ]);
    }
}
