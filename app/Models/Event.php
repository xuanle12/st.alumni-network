<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'location', 'event_date',
        'start_time', 'end_time', 'badge',
        'status', 'description', 'likes_count',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_active'  => 'boolean',
    ];

    // ── Scopes ─────────────────────────────────────────────

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // ── Accessors ──────────────────────────────────────────

    /** "15" */
    public function getDayAttribute(): string
    {
        return $this->event_date->format('d');
    }

    /** "Th4", "Th12" */
    public function getMonthLabelAttribute(): string
    {
        return 'Th' . $this->event_date->format('n');
    }

    /** "08:00 – 10:00" */
    public function getTimeRangeAttribute(): string
    {
        $start = $this->start_time ? substr($this->start_time, 0, 5) : '';
        $end   = $this->end_time   ? substr($this->end_time,   0, 5) : '';
        return $start && $end ? "{$start} – {$end}" : $start;
    }

    /** Miễn phí / Đăng ký / Có phí — dùng thay format_label */
    public function getFormatLabelAttribute(): string
    {
        return match($this->badge) {
            'free'     => 'Miễn phí',
            'register' => 'Đăng ký',
            'paid'     => 'Có phí',
            default    => '',
        };
    }

    /** true nếu badge = free */
    public function getIsFreeAttribute(): bool
    {
        return $this->badge === 'free';
    }

    /** open / closed dựa theo status */
    public function getRegistrationStatusAttribute(): string
    {
        return $this->status === 'active' ? 'open' : 'closed';
    }

    // ── Relations ──────────────────────────────────────────

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}