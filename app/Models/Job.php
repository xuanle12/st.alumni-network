<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     protected $fillable =[
         'title', 'company', 'location', 'type',
        'field', 'salary', 'logo_emoji', 'is_active','khoa',
    ];

     // Label hiển thị cho loại công việc
    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            'full-time'  => 'Full-time',
            'part-time'  => 'Part-time',
            'internship' => 'Thực tập',
            default      => $this->type,
        };
    }
    const KHOA_LIST = [
        'CNTT' => 'Công nghệ thông tin',
        'QTKD' => 'Quản trị kinh doanh',
        'KT'   => 'Kế toán',
        'TCNH' => 'Tài chính ngân hàng',
        'NN'   => 'Ngoại ngữ',
    ];
 
    // CSS class cho badge
    public function getTypeClassAttribute(): string
    {
        return match($this->type) {
            'internship' => 'tag-gold',
            default      => 'tag-green',
        };
    }
 
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
