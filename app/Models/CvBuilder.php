<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvBuilder extends Model
{
    protected $table = 'cv_builder';

    protected $fillable = [
        'user_id', 'full_name', 'job_title', 'email', 'phone', 'address',
        'website', 'summary', 'education', 'experience', 'skills',
        'projects', 'certificates',
    ];

    protected $casts = [
        'education'    => 'array',
        'experience'   => 'array',
        'skills'       => 'array',
        'projects'     => 'array',
        'certificates' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
