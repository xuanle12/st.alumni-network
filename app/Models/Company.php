<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = [
        'name', 'field', 'website', 'size', 'address', 'description', 'logo',
        'contact_name', 'contact_position', 'contact_email', 'contact_phone',
        'status', 'admin_note', 'created_by',
    ];
 
    public function job()
    {
        return $this->hasMany(Job::class);
    }
 
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
 
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'active'   => 'Đang hợp tác',
            'pending'  => 'Chờ duyệt',
            'inactive' => 'Ngừng hợp tác',
            default    => '—',
        };
    }
 
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'active'   => 'green',
            'pending'  => 'amber',
            'inactive' => 'red',
            default    => 'gray',
        };
    }
 
    public function getInitialsAttribute(): string
    {
        $words = explode(' ', trim($this->name));
        return mb_strtoupper(
            collect($words)->take(2)->map(fn($w) => mb_substr($w, 0, 1))->join('')
        );
    }
    public function jobs()
    {
        return $this->hasMany(Job::class,'company_id');
    }
}
