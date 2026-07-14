<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'user_notifications';

    protected $fillable = [
        'user_id', 'actor_id', 'type', 'title', 'message', 'link', 'read_at',
    ];

    protected $casts = [
        'read_at' => 'datetime',
    ];

    public function actor()
    {
        return $this->belongsTo(User::class, 'actor_id');
    }

    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    /**
     * Tạo thông báo cho một người dùng.
     * Bỏ qua nếu người nhận cũng chính là người gây ra (không tự thông báo).
     */
    public static function send(
        ?int $userId,
        string $type,
        string $title,
        ?string $message = null,
        ?string $link = null,
        ?int $actorId = null
    ): void {
        if (!$userId) {
            return;
        }

        $actorId = $actorId ?? auth()->id();

        if ($actorId && $actorId === $userId) {
            return;
        }

        static::create([
            'user_id'  => $userId,
            'actor_id' => $actorId,
            'type'     => $type,
            'title'    => $title,
            'message'  => $message,
            'link'     => $link,
        ]);
    }

    /**
     * Gửi thông báo tới tất cả quản trị viên (trừ chính người gây ra).
     */
    public static function sendToAdmins(
        string $type,
        string $title,
        ?string $message = null,
        ?string $link = null,
        ?int $actorId = null
    ): void {
        $actorId = $actorId ?? auth()->id();

        User::where('role', 'admin')
            ->pluck('id')
            ->each(function ($adminId) use ($type, $title, $message, $link, $actorId) {
                static::send($adminId, $type, $title, $message, $link, $actorId);
            });
    }
}
