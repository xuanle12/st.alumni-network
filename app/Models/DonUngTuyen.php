<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonUngTuyen extends Model
{
    protected $table = 'job_applications';
    protected $fillable = [
        'job_id',
        'user_id',
        'name',
        'email',
        'phone',
        'location',
        'cover_letter',
        'cv_path',
        'allow_ai',
        'status',
    ];
 
    protected $casts = [
        'allow_ai' => 'boolean',
    ];
 
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending'   => 'Đang chờ xét duyệt',
            'reviewing' => 'Đang xem xét',
            'accepted'  => 'Đã chấp nhận',
            'rejected'  => 'Không phù hợp',
            default     => 'Không xác định',
        };
    }
 
    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending'   => 'gray',
            'reviewing' => 'blue',
            'accepted'  => 'green',
            'rejected'  => 'red',
            default     => 'gray',
        };
    }
}
