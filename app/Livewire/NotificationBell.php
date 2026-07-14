<?php

namespace App\Livewire;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationBell extends Component
{
    public bool $open = false;

    public function toggle(): void
    {
        $this->open = !$this->open;
    }

    public function markAllRead(): void
    {
        Notification::where('user_id', Auth::id())
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
    }

    /** Đánh dấu đã đọc rồi chuyển tới liên kết của thông báo. */
    public function openNotification(int $id)
    {
        $n = Notification::where('user_id', Auth::id())->find($id);

        if (!$n) {
            return null;
        }

        if (!$n->read_at) {
            $n->update(['read_at' => now()]);
        }

        $this->open = false;

        if ($n->link) {
            return $this->redirect($n->link, navigate: true);
        }

        return null;
    }

    public function render()
    {
        $userId = Auth::id();

        return view('livewire.notification-bell', [
            'notifications' => Notification::with('actor.profile')
                ->where('user_id', $userId)
                ->latest()
                ->limit(15)
                ->get(),
            'unreadCount' => Notification::where('user_id', $userId)
                ->whereNull('read_at')
                ->count(),
        ]);
    }
}
