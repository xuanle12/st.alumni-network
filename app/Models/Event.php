<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'organizer', 'location', 'contact_email',
        'event_date', 'start_time', 'end_time', 'badge',
        'status', 'description', 'likes_count', 'created_by', 'post_id',
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

    /** Nhãn trạng thái tiếng Việt */
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'active' => 'Đang diễn ra',
            'closed' => 'Đã đóng',
            default  => 'Nháp',
        };
    }

    /** Màu badge cho trạng thái (dùng với x-badge) */
    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'active' => 'green',
            'closed' => 'red',
            default  => 'yellow',
        };
    }

    /** Nhãn loại vé */
    public function getBadgeLabelAttribute(): string
    {
        return $this->format_label;
    }

    // ── Scopes bổ sung ─────────────────────────────────────

    public function scopeStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    // ── Relations ──────────────────────────────────────────

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }
}