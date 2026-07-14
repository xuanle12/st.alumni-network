<?php

namespace App\Traits;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;

trait HasLikes
{
    // Relationship: model này có nhiều likes
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    // Kiểm tra user hiện tại đã like chưa
    public function isLikedBy(?int $userId = null): bool
    {
        $userId = $userId ?? Auth::id();
        if (!$userId) return false;
        return $this->likes()->where('user_id', $userId)->exists();
    }

    // Toggle like — trả về ['liked' => bool, 'count' => int]
    public function toggleLike(): array
    {
        $userId   = Auth::id();
        $existing = $this->likes()->where('user_id', $userId)->first();

        if ($existing) {
            $existing->delete();
            $this->decrement('likes_count');
            return ['liked' => false, 'count' => $this->fresh()->likes_count];
        }

        $this->likes()->create(['user_id' => $userId]);
        $this->increment('likes_count');

        // Thông báo cho chủ sở hữu (nếu có cột user_id)
        $ownerId = $this->user_id ?? null;
        if ($ownerId) {
            $what = $this instanceof \App\Models\Post ? 'bài viết' : 'bình luận';
            \App\Models\Notification::send(
                $ownerId,
                'like',
                (Auth::user()->name ?? 'Ai đó') . ' đã thích ' . $what . ' của bạn',
                null,
                route('csv'),
                $userId
            );
        }

        return ['liked' => true, 'count' => $this->fresh()->likes_count];
    }
}