<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $a = User::where('email', 'a@gmail.com')->first(); // Nguyễn Văn A - admin, KTPM, HN
        $b = User::where('email', 'b@gmail.com')->first(); // Trần Thị B   - alumni, HTTT, Đà Nẵng
        $c = User::where('email', 'c@gmail.com')->first(); // Lê Văn C     - student, KHMT, HCM

        if (!$a || !$b || !$c) {
            $this->command->warn('⚠ Thiếu user. Chạy UserSeeder trước!');
            return;
        }

        $posts = Post::orderBy('id')->get();

        if ($posts->count() < 3) {
            $this->command->warn('⚠ Chưa đủ 3 posts. Chạy PostSeeder trước!');
            return;
        }

        $p1 = $posts->get(0); // A đăng: giới thiệu bản thân
        $p2 = $posts->get(1); // B đăng: tuyển BA ở Đà Nẵng
        $p3 = $posts->get(2); // C đăng: hỏi về ngày hội kết nối

        // ── Bài 1: A giới thiệu bản thân ────────────────────────────────────
        // B chào mừng A
        $r1 = Comment::create([
            'post_id' => $p1->id, 'user_id' => $b->id, 'parent_id' => null,
            'content' => 'Chào mừng Văn A! Mình Thị B, cựu SV KTPM02 – HTTT, đang làm ở Đà Nẵng. Rất vui được kết nối! 🎉',
        ]);
        // A reply cảm ơn B
        Comment::create([
            'post_id' => $p1->id, 'user_id' => $a->id, 'parent_id' => $r1->id,
            'content' => 'Ôi chào Thị B! Bạn làm ở Đà Nẵng rồi, mình đang tính tìm hiểu cơ hội ở đó nữa 😄',
        ]);
        // C hỏi A kinh nghiệm
        $r2 = Comment::create([
            'post_id' => $p1->id, 'user_id' => $c->id, 'parent_id' => null,
            'content' => 'Chào anh Văn A! Em Văn C, KHMT01, đang học năm cuối. Anh có thể chia sẻ kinh nghiệm xin việc sau tốt nghiệp không ạ? 🙏',
        ]);
        // A reply C
        Comment::create([
            'post_id' => $p1->id, 'user_id' => $a->id, 'parent_id' => $r2->id,
            'content' => 'Được chứ Văn C! Inbox mình đi, mình sẽ chia sẻ lộ trình và kinh nghiệm tìm việc ngành CNTT nhé 🤝',
        ]);

        // ── Bài 2: B tuyển BA ở Đà Nẵng ─────────────────────────────────────
        // C hỏi B về điều kiện ứng tuyển
        $r3 = Comment::create([
            'post_id' => $p2->id, 'user_id' => $c->id, 'parent_id' => null,
            'content' => 'Chị Thị B ơi, em ngành KHMT có ứng tuyển được không ạ? Em tốt nghiệp cuối năm nay 🙋',
        ]);
        // B reply C
        Comment::create([
            'post_id' => $p2->id, 'user_id' => $b->id, 'parent_id' => $r3->id,
            'content' => 'KHMT cũng phù hợp em ơi! Em gửi CV kèm bảng điểm qua inbox chị nhé, chị sẽ xem xét 😊',
        ]);
        // A hỏi B về công ty
        $r4 = Comment::create([
            'post_id' => $p2->id, 'user_id' => $a->id, 'parent_id' => null,
            'content' => 'Bạn B ơi công ty làm product hay outsource vậy? Và có hỗ trợ remote không? Hỏi giúp bạn bè mình đang tìm việc Đà Nẵng 😄',
        ]);
        // B reply A
        Comment::create([
            'post_id' => $p2->id, 'user_id' => $b->id, 'parent_id' => $r4->id,
            'content' => 'Làm product in-house bạn ơi! Remote hybrid, 2 ngày/tuần vào văn phòng thôi. Bạn bè cứ gửi CV qua mình nhé 🚀',
        ]);

        // ── Bài 3: C hỏi về ngày hội kết nối ────────────────────────────────
        // A trả lời C về thông tin sự kiện
        $r5 = Comment::create([
            'post_id' => $p3->id, 'user_id' => $a->id, 'parent_id' => null,
            'content' => 'Thường tổ chức tháng 11 bạn ơi, tại Hội trường A – VNUA. Bạn theo dõi fanpage Khoa CNTT để đăng ký sớm nhé! 📅',
        ]);
        // C reply cảm ơn A
        Comment::create([
            'post_id' => $p3->id, 'user_id' => $c->id, 'parent_id' => $r5->id,
            'content' => 'Cảm ơn anh Văn A nhiều! Em sẽ theo dõi fanpage và đăng ký ngay khi mở 🙏',
        ]);
        // B chia sẻ kinh nghiệm tham dự
        $r6 = Comment::create([
            'post_id' => $p3->id, 'user_id' => $b->id, 'parent_id' => null,
            'content' => 'Mình từng tham dự năm 2023, rất bổ ích! Kết nối được nhiều anh chị đi làm, thậm chí nhận được offer luôn 😄 Bạn nên đăng ký sớm!',
        ]);
        // C reply hỏi thêm B
        Comment::create([
            'post_id' => $p3->id, 'user_id' => $c->id, 'parent_id' => $r6->id,
            'content' => 'Xịn vậy chị B! Vậy năm nay em nhất định phải đi rồi 🎯',
        ]);

        // Cập nhật comments_count
        foreach ($posts as $post) {
            $post->update(['comments_count' => Comment::where('post_id', $post->id)->count()]);
        }

        $this->command->info('✓ Đã seed ' . Comment::count() . ' comments thành công!');
    }
}