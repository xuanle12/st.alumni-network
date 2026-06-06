<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MentorProfile extends Model
{
    protected $fillable = [
        'user_id', 'expertise', 'skills', 'bio',
        'contact_info', 'max_mentee', 'status', 'admin_note',
    ];
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending'  => 'Chờ duyệt',
            'approved' => 'Đã duyệt',
            'rejected' => 'Từ chối',
            default    => '—',
        };
    }
}
