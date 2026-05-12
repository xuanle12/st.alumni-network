<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userA = User::where('email', 'a@gmail.com')->first();
        $userB = User::where('email', 'b@gmail.com')->first();
        $userC = User::where('email', 'c@gmail.com')->first();
 
        $posts = Post::orderBy('id')->get();
 
        if ($posts->isEmpty()) {
            $this->command->warn('⚠ Chưa có posts. Chạy PostSeeder trước!');
            return;
        }
 
        $post1 = $posts->get(0);
        $post2 = $posts->get(1);
        $post3 = $posts->get(2); 

        $c1 = Comment::create([
            'post_id'   => $post1->id,
            'user_id'   => $userB->id,
            'parent_id' => null,
            'content'   => 'Chào mừng bạn đến với mạng lưới! 🎉 Hy vọng sẽ kết nối được nhiều bạn bè cũ.',
        ]);
 
        // Reply cho c1
        Comment::create([
            'post_id'   => $post1->id,
            'user_id'   => $userA->id,
            'parent_id' => $c1->id,
            'content'   => 'Cảm ơn bạn Trần Thị B nhiều nha! 😊',
        ]);
 
        $c2 = Comment::create([
            'post_id'   => $post1->id,
            'user_id'   => $userC->id,
            'parent_id' => null,
            'content'   => 'Mình K64 CNTT đây, bạn khóa nào vậy? 👋',
        ]);

        Comment::create([
            'post_id'   => $post1->id,
            'user_id'   => $userA->id,
            'parent_id' => $c2->id,
            'content'   => 'Mình K66 bạn ơi! Rất vui được quen 🤝',
        ]);
 
        Comment::create([
            'post_id'   => $post1->id,
            'user_id'   => $userB->id,
            'parent_id' => $c2->id,
            'content'   => 'Mình K65, cùng thế hệ với bạn luôn 😄',
        ]);
        $c3 = Comment::create([
            'post_id'   => $post2->id,
            'user_id'   => $userC->id,
            'parent_id' => null,
            'content'   => 'Cho mình hỏi yêu cầu kinh nghiệm tối thiểu là mấy năm vậy bạn?',
        ]);
        Comment::create([
            'post_id'   => $post2->id,
            'user_id'   => $userA->id,
            'parent_id' => $c3->id,
            'content'   => 'Fresher cũng được bạn ơi, quan trọng là có portfolio nhé!',
        ]);
 
        $c4 = Comment::create([
            'post_id'   => $post2->id,
            'user_id'   => $userB->id,
            'parent_id' => null,
            'content'   => 'Công ty làm sản phẩm hay outsource vậy bạn? 🤔',
        ]);
        Comment::create([
            'post_id'   => $post2->id,
            'user_id'   => $userA->id,
            'parent_id' => $c4->id,
            'content'   => 'Mình làm product bạn ơi, stack chính là Laravel + Vue 🚀',
        ]);
 
        Comment::create([
            'post_id'   => $post2->id,
            'user_id'   => $userC->id,
            'parent_id' => null,
            'content'   => 'Mức lương range bao nhiêu vậy? Inbox mình với nha!',
        ]);
        $c5 = Comment::create([
            'post_id'   => $post3->id,
            'user_id'   => $userB->id,
            'parent_id' => null,
            'content'   => 'Sự kiện tổ chức ở đâu vậy bạn? Mình muốn đăng ký tham dự!',
        ]);
        Comment::create([
            'post_id'   => $post3->id,
            'user_id'   => $userA->id,
            'parent_id' => $c5->id,
            'content'   => 'Tổ chức tại Hội trường A - VNUA bạn nhé! Đăng ký trên trang sự kiện.',
        ]);
 
        $c6 = Comment::create([
            'post_id'   => $post3->id,
            'user_id'   => $userC->id,
            'parent_id' => null,
            'content'   => 'Năm ngoái mình có tham dự, rất hay và kết nối được nhiều bạn cũ lắm! 🎓',
        ]);

        
        Comment::create([
            'post_id'   => $post3->id,
            'user_id'   => $userB->id,
            'parent_id' => $c6->id,
            'content'   => 'Thật không? Vậy năm nay mình nhất định phải đi rồi 😍',
        ]);
 
        
        foreach ($posts as $post) {
            $total = Comment::where('post_id', $post->id)->count();
            $post->update(['comments_count' => $total]);
        }
 
        $total = Comment::count();
        $this->command->info("✓ Đã seed {$total} comments + replies thành công!");
    
    }
}
