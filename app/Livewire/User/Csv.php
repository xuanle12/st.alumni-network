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

    public $coverImage = null;


    public function mount()
    {
        $this->currentUser = Auth::user()->load('profile');
        $this->loadData();
    }


    /* filter feed */
    public function setFilter(string $filter)
    {
        $this->filter = $filter;
        $this->loadData();
    }


    /* load data — chỉ lấy bài published */
    private function loadData()
    {
        $query = Post::with([
            'author.profile',
            'job'
        ])->where('status', 'published')->latest();

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
        $this->jobs     = Job::latest()->limit(4)->get();
        $this->contacts = User::with('profile')
            ->where('id', '!=', $this->currentUser->id)
            ->limit(5)
            ->get();
    }


    /* mở modal */
    public function openModal()
    {
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
            'coverImage'
        ]);
    }


    /* thêm tag */
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


    /* đăng bài — tự động kiểm tra từ cấm */
    public function publish()
    {
        $this->validate([
            'content' => 'required|min:3'
        ]);

        $body = trim($this->title) !== ''
            ? $this->title . "\n\n" . $this->content
            : $this->content;

        // Danh sách từ cấm
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

        $path = null;
        if ($this->coverImage) {
            $path = $this->coverImage->store('posts', 'public');
        }

        Post::create([
            'user_id'  => Auth::id(),
            'content'  => $body,
            'category' => in_array($this->category, ['normal', 'job', 'event'], true)
                          ? $this->category : 'normal',
            'image'    => $path,
            'status'   => $hasBanned ? 'pending' : 'published',
        ]);

        $this->closeModal();
        $this->loadData();

        session()->flash('success', $hasBanned
            ? 'Bài viết đang chờ admin duyệt do chứa nội dung không phù hợp.'
            : 'Đăng bài thành công!'
        );
    }


    public function render()
    {
        return view('livewire.user.csv');
    }
}