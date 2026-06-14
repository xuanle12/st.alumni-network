<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Event as EventModel;
use App\Models\EventRegistration;

class Event extends Component
{
    public string $search    = '';
    public string $activeTab = 'all';

    public function updatedSearch(): void {}

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
        $this->search    = '';
    }

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
            'user_id'  => Auth::id(),
            'status'   => 'registered',
        ]);

        session()->flash('success', 'Đăng ký thành công');
    }

    public function unregister(int $eventId): void
    {
        EventRegistration::where('event_id', $eventId)
            ->where('user_id', Auth::id())
            ->update(['status' => 'cancelled']);

        session()->flash('success', 'Đã huỷ đăng ký');
    }

    public function render()
    {
        $userId = Auth::id();

        $stats = [
            'year_total' => EventModel::whereYear('event_date', now()->year)->count(),
            'upcoming'   => EventModel::where('status', 'active')
                                ->where('event_date', '>=', now()->toDateString())
                                ->count(),
            'total_regs' => EventRegistration::where('status', 'registered')->count(),
        ];

        $featured = EventModel::where('status', 'active')
            ->where('event_date', '>=', now()->toDateString())
            ->orderBy('event_date')
            ->first();

        $gridEvents = EventModel::where('status', 'active')
            ->when($this->search, fn($q) =>
                $q->where(function ($w) {
                    $w->where('title',    'like', '%'.$this->search.'%')
                      ->orWhere('location','like', '%'.$this->search.'%');
                })
            )
            ->when($this->activeTab === 'upcoming', fn($q) =>
                $q->where('event_date', '>=', now()->toDateString())
            )
            ->when($this->activeTab === 'past', fn($q) =>
                $q->where('event_date', '<', now()->toDateString())
            )
            ->when($this->activeTab === 'free', fn($q) =>
                $q->where('badge', 'free')
            )
            ->orderBy('event_date')
            ->take(4)
            ->get();

        $upcomingEvents = EventModel::where('status', 'active')
            ->where('event_date', '>', now()->addDays(14)->toDateString())
            ->orderBy('event_date')
            ->take(5)
            ->get();

        $registeredIds = $userId
            ? EventRegistration::where('user_id', $userId)
                ->where('status', 'registered')
                ->pluck('event_id')
                ->toArray()
            : [];

        return view('livewire.user.event', [
            'stats'         => $stats,
            'featured'      => $featured,
            'gridEvents'    => $gridEvents,
            'upcomingEvents'=> $upcomingEvents,
            'registeredIds' => $registeredIds,
        ]);
    }
}