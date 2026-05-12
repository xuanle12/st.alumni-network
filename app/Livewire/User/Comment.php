<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment as CommentModel;
use Illuminate\Support\Facades\Auth;

class Comment extends Component
{
     public Post   $post;
    public string $newComment  = '';
    public ?int   $replyTo     = null;
    public string $replyName   = '';
    public array  $openReplies = [];
 
    public function mount(Post $post): void
    {
        $this->post = $post;
    }
 
    public function toggleReplies(int $commentId): void
    {
        if (in_array($commentId, $this->openReplies)) {
            $this->openReplies = array_values(
                array_filter($this->openReplies, fn($id) => $id !== $commentId)
            );
        } else {
            $this->openReplies[] = $commentId;
        }
    }
 
    public function setReply(int $commentId, string $name): void
    {
        $this->replyTo   = $commentId;
        $this->replyName = $name;
    }
 
    public function cancelReply(): void
    {
        $this->replyTo   = null;
        $this->replyName = '';
    }
 
    public function submit(): void
    {
        if (!Auth::check()) return;
 
        $this->validate([
            'newComment' => 'required|string|min:1|max:1000',
        ], ['newComment.required' => 'Vui lòng nhập nội dung.']);
 
        Comment::create([
            'post_id'   => $this->post->id,
            'user_id'   => Auth::id(),
            'parent_id' => $this->replyTo,
            'content'   => trim($this->newComment),
        ]);
 
        Post::where('id', $this->post->id)->increment('comments_count');
 
        if ($this->replyTo && !in_array($this->replyTo, $this->openReplies)) {
            $this->openReplies[] = $this->replyTo;
        }
 
        $this->newComment = '';
        $this->replyTo    = null;
        $this->replyName  = '';
    }
 
    public function deleteComment(int $id): void
    {
        $comment = Comment::find($id);
        if ($comment && $comment->user_id === Auth::id()) {
            Comment::where('parent_id', $id)->delete();
            $comment->delete();
            Post::where('id', $this->post->id)->decrement('comments_count');
        }
    }
 
    public function likeComment(int $id): void
    {
        if (!Auth::check()) return;
        $comment = Comment::find($id);
        if ($comment) $comment->toggleLike();
    }
    public function render()
    {
        $comments = CommentModel::with(['user','replies.user'])
            ->where('post_id', $this->post->id)
            ->whereNull('parent_id')
            ->latest()
            ->get();
        return view('livewire.user.comment', compact('comments'));
    }
}
