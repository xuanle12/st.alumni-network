<?php

namespace App\Models;

use App\Traits\HasLikes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasLikes;
    protected $table = 'post';
     protected $fillable = [
        'user_id', 'content', 'image', 'category', 'status',
        'likes_count', 'comments_count', 'shares_count',
    ];
 
    protected $casts = [
        'likes_count'    => 'integer',
        'comments_count' => 'integer',
        'shares_count'   => 'integer',
    ];
 
    public const CATEGORIES = [

    'general' => 'Thảo luận chung',

    'event' => 'Sự kiện',

    'job' => 'Việc làm',

    'share' => 'Chia sẻ',

    'question' => 'Hỏi đáp',

    ];
 
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
 
    public function job()
    {
        return $this->hasOne(Job::class, 'post_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)
                    ->whereNull('parent_id')
                    ->with(['user', 'replies.user'])
                    ->latest();
    }
     public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
 
    public function scopeRecruitment($query)
    {
        return $query->where('category', 'job');
    }
    public function scopeFromAlumni($query)
    {
        return $query->whereHas('author.profile', fn ($q) => $q->where('role', 'alumni'));
    }

    public function scopeFromFriends($query, User $user)
    {
        $friendIds = $user->contacts()->pluck('users.id');
        return $query->whereIn('user_id', $friendIds);
    }
}
