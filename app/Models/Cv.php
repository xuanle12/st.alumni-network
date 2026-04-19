<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
     protected $fillable = [
        'user_id', 'content', 'image', 'category',
        'likes_count', 'comments_count', 'shares_count',
    ];
 
    protected $casts = [
        'likes_count'    => 'integer',
        'comments_count' => 'integer',
        'shares_count'   => 'integer',
    ];
 
    // -------------------------------------------------------
    // Relationships
    // -------------------------------------------------------
 
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
 
    public function job()
    {
        return $this->hasOne(Job::class, 'post_id');
    }
 
 
    /** Lọc bài tuyển dụng */
    public function scopeRecruitment($query)
    {
        return $query->where('category', 'job');
    }
 
    /** Lọc bài của cựu sinh viên — check qua profile */
    public function scopeFromAlumni($query)
    {
        return $query->whereHas('author.profile', fn ($q) => $q->where('role', 'alumni'));
    }
 
    /** Lọc bài của bạn bè (contacts của user hiện tại) */
    public function scopeFromFriends($query, User $user)
    {
        $friendIds = $user->contacts()->pluck('users.id');
        return $query->whereIn('user_id', $friendIds);
    }
}
