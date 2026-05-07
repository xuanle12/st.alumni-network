<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Event as EventModel;
use App\Models\EventRegistration;

class Event extends Component
{
    public string $search = '';
    public string $activeTab = 'all';

    public function updatedSearch(): void {}

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
        $this->search = '';
    }

    /* đăng ký sự kiện */
    public function register(int $eventId)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $exists = EventRegistration::where('event_id', $eventId)
        ->where('user_id', Auth::id())
        ->where('status', 'registered')
        ->exists();

    if ($exists) {
        session()->flash('info', 'Bạn đã đăng ký rồi');
        return;
    }

    EventRegistration::create([
        'event_id' => $eventId,
        'user_id' => Auth::id(),
        'status' => 'registered'
    ]);

    session()->flash('success', 'Đăng ký thành công');
}

    /* huỷ đăng ký */
    public function unregister(int $eventId): void
    {
        EventRegistration::where('event_id', $eventId)
            ->where('user_id', Auth::id())
            ->update([
                'status' => 'cancelled'
            ]);

        session()->flash('success', 'Đã huỷ đăng ký');
    }

    public function render()
    {
        $userId = Auth::id();

        /* thống kê */
        $stats = [
            'year_total' => EventModel::whereYear('event_date', now()->year)->count(),

            'upcoming' => EventModel::where('event_date', '>=', now())
                ->where('is_active', true)
                ->count(),

            'total_regs' => EventRegistration::where('status','registered')->count()
        ];

        /* event nổi bật */
        $featured = EventModel::where('is_active', true)
            ->whereDate('event_date','>=', now())
            ->orderBy('event_date')
            ->first();

        /* grid */
        $gridEvents = EventModel::where('is_active', true)

            ->when($this->search, fn($q) =>
                $q->where(function ($w) {
                    $w->where('title','like','%'.$this->search.'%')
                      ->orWhere('location','like','%'.$this->search.'%');
                })
            )

            ->when($this->activeTab == 'upcoming', fn($q) =>
                $q->whereDate('event_date','>=', now())
            )

            ->when($this->activeTab == 'past', fn($q) =>
                $q->whereDate('event_date','<', now())
            )

            ->orderBy('event_date')
            ->take(4)
            ->get();

        /* upcoming sidebar */
        $upcomingEvents = EventModel::whereDate(
                'event_date','>', now()->addDays(14)
            )
            ->where('is_active', true)
            ->orderBy('event_date')
            ->take(5)
            ->get();

        /* event đã đăng ký */
        $registeredIds = $userId
            ? EventRegistration::where('user_id', $userId)
                ->where('status','registered')
                ->pluck('event_id')
                ->toArray()
            : [];

        return view('livewire.user.event', [

            'stats' => $stats,
            'featured' => $featured,
            'gridEvents' => $gridEvents,
            'upcomingEvents' => $upcomingEvents,
            'registeredIds' => $registeredIds

        ]);
    }
}