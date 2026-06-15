<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     protected $fillable =[
         'title', 'company', 'location', 'type',
        'field', 'min_salary', 'max_salary', 'is_active', 'khoa',
        'description', 'experience_required', 'deadline', 'created_by', 'contact_email'
    ];

    // Label hiển thị cho khoa (cột khoa đã lưu sẵn dạng tên hiển thị)
    public function getKhoaLabelAttribute(): ?string
    {
        return $this->khoa;
    }

     // Label hiển thị cho loại công việc
    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'full-time'  => 'Full-time',
            'part-time'  => 'Part-time',
            'internship' => 'Thực tập',
            'remote'     => 'Remote',
            default      => $this->type,
        };
    }
    
 
    // CSS class cho badge
    public function getTypeClassAttribute(): string
    {
        return match($this->type) {
            'internship' => 'tag-gold',
            'remote'     => 'tag-blue',
            default      => 'tag-green',
        };
    }
 
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function skills()
    {
    return $this->belongsToMany(Skill::class, 'job_skills');
    }
}