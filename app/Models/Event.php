<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
     protected $fillable = [
        'title', 'location', 'event_date',
        'start_time', 'end_time', 'badge', 'is_active',
    ];
 
    protected $casts = [
    'event_date' => 'datetime',
    'start_time' => 'datetime:H:i',
    'end_time'   => 'datetime:H:i',
    'is_active'  => 'boolean',
    ];
 
    public function getBadgeLabelAttribute(): string
    {
        return match($this->badge) {
            'free'     => 'Miễn phí',
            'register' => 'Đăng ký',
            'paid'     => 'Có phí',
            default    => '',
        };
    }
 
    public function getBadgeClassAttribute(): string
    {
        return match($this->badge) {
            'free'     => 'eb-green',
            'register' => 'eb-gold',
            'paid'     => 'eb-red',
            default    => '',
        };
    }
 
    public function getTimeRangeAttribute(): string
    {
        $start = $this->start_time ? substr($this->start_time, 0, 5) : '';
        $end   = $this->end_time   ? substr($this->end_time, 0, 5)   : '';
        return $start && $end ? "{$start} – {$end}" : $start;
    }
    // -------------------------------------------------------
    // Accessors mới — dùng trong sidebar Livewire
    // -------------------------------------------------------
 
    /** Trả về số ngày: "15" */
    public function getDayAttribute(): string
    {
        return $this->event_date->format('d');
    }
 
    /** Trả về tháng viết tắt tiếng Việt: "Th4", "Th12" */
    public function getMonthAttribute(): string
    {
        return 'Th' . $this->event_date->format('n');
    }
    /** Sự kiện đang active và chưa qua ngày */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->where('event_date', '>=', now()->toDateString());
    }
}
