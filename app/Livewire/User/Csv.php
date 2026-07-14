<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;
use App\Models\Job;
use App\Models\Post;
use App\Models\User;

class Csv extends Component
{
    use WithFileUploads;

    public string $filter = 'all';

    public $currentUser;
    public $posts = [];
    public $events = [];
    public $contacts = [];
    public $jobs = [];

    /* modal post */
    public bool $showModal = false;

    public string $title = '';
    public string $content = '';
    public string $category = 'normal';

    public array $tags = [];
    public string $tagInput = '';

    public $coverImage = null;      // giữ để tương thích
    public array $coverImages = []; // hỗ trợ nhiều ảnh (kiểu Facebook)


    public function mount()
    {
        $this->currentUser = Auth::user()->load('profile');
        $this->loadData();
    }


    public function setFilter(string $filter)
    {
        $this->filter = $filter;
        $this->loadData();
    }


    private function loadData()
    {
        // Hiện bài đã duyệt cho mọi người + bài đang chờ duyệt CỦA CHÍNH mình
        $query = Post::with([
            'author.profile',
            'job',
            'event',
        ])->where(function ($q) {
            $q->where('status', 'published')
              ->orWhere(function ($q2) {
                  $q2->where('status', 'pending')
                     ->where('user_id', $this->currentUser->id);
              });
        })->latest();

        $this->posts = match ($this->filter) {

            'recruit' =>
                $query->recruitment()->get(),

            'alumni' =>
                $query->fromAlumni()->get(),

            'friends' =>
                $query->fromFriends($this->currentUser)->get(),

            default =>
                $query->get(),
        };

        $this->events   = Event::latest()->limit(4)->get();
        $this->jobs     = Job::active()->latest()->limit(4)->get();
        $this->contacts = User::with('profile')
            ->where('id', '!=', $this->currentUser->id)
            ->limit(5)
            ->get();
    }


    public function openModal(string $category = 'normal')
    {
        $this->category = in_array($category, ['normal', 'job', 'event'], true)
            ? $category : 'normal';
        $this->showModal = true;
    }


    public function closeModal()
    {
        $this->reset([
            'showModal',
            'title',
            'content',
            'category',
            'tags',
            'tagInput',
            'coverImage',
            'coverImages',
        ]);
    }

    /** Xoá một ảnh đã chọn khỏi danh sách trước khi đăng. */
    public function removeCoverImage(int $i): void
    {
        unset($this->coverImages[$i]);
        $this->coverImages = array_values($this->coverImages);
    }


    public function addTag()
    {
        $tag = trim($this->tagInput);

        if ($tag && !in_array($tag, $this->tags) && count($this->tags) < 5) {
            $this->tags[] = $tag;
        }

        $this->tagInput = '';
    }


    public function removeTag($i)
    {
        unset($this->tags[$i]);
        $this->tags = array_values($this->tags);
    }


    public function publish()
    {
        $this->validate([
            'content'        => 'required|min:3',
            'coverImages.*'  => 'image|max:5120', // mỗi ảnh tối đa 5MB
        ], [
            'coverImages.*.image' => 'File tải lên phải là ảnh.',
            'coverImages.*.max'   => 'Mỗi ảnh tối đa 5MB.',
        ]);

        $body = trim($this->title) !== ''
            ? $this->title . "\n\n" . $this->content
            : $this->content;

        $bannedWords = [
            'đụ', 'địt', 'lồn', 'cặc', 'đéo',
            'đmm', 'vkl', 'cl', 'dm', 'đm',
            'ngu', 'óc chó', 'mẹ mày', 'con chó',
            'fuck', 'shit', 'bitch', 'asshole',
        ];

        $bodyLower = mb_strtolower($body);
        $hasBanned = false;

        foreach ($bannedWords as $word) {
            if (str_contains($bodyLower, mb_strtolower($word))) {
                $hasBanned = true;
                break;
            }
        }

        // Lưu tất cả ảnh đã chọn
        $paths = [];
        foreach ($this->coverImages as $img) {
            $paths[] = $img->store('posts', 'public');
        }
        // Tương thích: nếu dùng ô upload đơn cũ
        if (empty($paths) && $this->coverImage) {
            $paths[] = $this->coverImage->store('posts', 'public');
        }

        $newPost = Post::create([
            'user_id'  => Auth::id(),
            'content'  => $body,
            'category' => in_array($this->category, ['normal', 'job', 'event'], true)
                          ? $this->category : 'normal',
            'image'    => $paths[0] ?? null,
            'images'   => count($paths) ? $paths : null,
            'status'   => 'pending', // Mọi bài đều chờ quản trị viên duyệt
        ]);

        // Báo admin có bài chờ duyệt (đánh dấu nếu nghi chứa nội dung không phù hợp)
        \App\Models\Notification::sendToAdmins(
            'post_pending',
            $hasBanned
                ? 'Có bài viết chờ duyệt (nghi chứa nội dung không phù hợp)'
                : 'Có bài viết mới chờ duyệt',
            \Illuminate\Support\Str::limit($body, 120),
            route('admin.post'),
            Auth::id()
        );

        $this->closeModal();
        $this->loadData();

        $this->dispatch('toast', type: 'success',
            message: 'Đã gửi bài viết, đang chờ quản trị viên duyệt.'
        );
    }
    public function like(int $postId): void
    {
    if (!Auth::check()) return;

    $post = Post::find($postId);
    if (!$post) return;

    $post->toggleLike();

    $this->loadData();
    }


    public function render()
    {
        return view('livewire.user.csv', [
            'stats' => [
                'posts'   => Post::where('user_id', $this->currentUser->id)->count(),
                'members' => User::count(),
                'events'  => Event::count(),
            ],
        ]);
    }
}
