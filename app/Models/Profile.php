<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

     protected $table = 'profile';
 
    protected $fillable = [
        'user_id', 'msv', 'lop', 'khoa', 'nganh',
        'nam_tot_nghiep', 'phone', 'bio', 'avatar',
        'tinh_thanh', 'que_quan',
        'linkedin', 'github', 'website',
        'status', 'admin_note',
        'role', 'position', 'is_online', 'current_company',
    ];

    protected $casts = [
        'is_online' => 'boolean',
    ];
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
 
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'active'   => 'Đang học',
            'pending'  => 'Chờ duyệt',
            'inactive' => 'Không hoạt động',
            default    => '—',
        };
    }
    public function getRoleLabelAttribute(): string
    {
        return match ($this->role) {
            'alumni'   => 'Cựu SV',
            'student'  => 'Sinh viên',
            'lecturer' => 'Giảng viên',
            'admin'    => 'Quản trị',
            default    => '—',
        };
    }
}
