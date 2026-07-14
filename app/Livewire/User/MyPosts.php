<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class MyPosts extends Component
{
    use WithPagination;

    public string $filter = 'all';

    public bool $showDelete = false;
    public ?int $deleteId   = null;

    public function updatingFilter(): void
    {
        $this->resetPage();
    }

    public function confirmDelete(int $id): void
    {
        // chỉ cho phép xoá bài của chính mình
        $ok = Post::where('id', $id)->where('user_id', Auth::id())->exists();
        if (!$ok) {
            return;
        }

        $this->deleteId   = $id;
        $this->showDelete = true;
    }

    public function closeDelete(): void
    {
        $this->showDelete = false;
        $this->deleteId   = null;
    }

    public function delete(): void
    {
        $post = Post::where('id', $this->deleteId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$post) {
            $this->closeDelete();
            return;
        }

        DB::transaction(function () use ($post) {
            $commentIds = Comment::where('post_id', $post->id)->pluck('id');

            // Like của các bình luận (đa hình — không tự cascade)
            if ($commentIds->isNotEmpty()) {
                Like::where('likeable_type', Comment::class)
                    ->whereIn('likeable_id', $commentIds)
                    ->delete();
            }

            // Like của chính bài viết
            Like::where('likeable_type', Post::class)
                ->where('likeable_id', $post->id)
                ->delete();

            // Xoá file ảnh khỏi ổ đĩa
            foreach ($post->photos as $ph) {
                Storage::disk('public')->delete($ph);
            }

            // Xoá bài → bình luận & reply tự cascade theo khoá ngoại
            $post->delete();
        });

        $this->closeDelete();
        $this->dispatch('toast', type: 'success',
            message: 'Đã xoá bài viết cùng toàn bộ bình luận.'
        );
    }

    public function render()
    {
        $uid = Auth::id();

        $posts = Post::where('user_id', $uid)
            ->when($this->filter !== 'all', fn ($q) => $q->where('status', $this->filter))
            ->withCount(['comments as comment_count'])
            ->latest()
            ->paginate(8);

        $counts = [
            'all'       => Post::where('user_id', $uid)->count(),
            'published' => Post::where('user_id', $uid)->where('status', 'published')->count(),
            'pending'   => Post::where('user_id', $uid)->where('status', 'pending')->count(),
        ];

        return view('livewire.user.my-posts', compact('posts', 'counts'))
            ->layout('components.layouts.app');
    }
}
