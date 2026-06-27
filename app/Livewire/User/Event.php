<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Event as EventModel;
use App\Models\EventRegistration;

class Event extends Component
{
    use WithPagination;

    public string $search    = '';
    public string $activeTab = 'all';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
        $this->search    = '';
        $this->resetPage();
    }

    public function render()
    {
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
            ->paginate(4);

        $upcomingEvents = EventModel::where('status', 'active')
            ->where('event_date', '>', now()->addDays(14)->toDateString())
            ->orderBy('event_date')
            ->take(5)
            ->get();

        return view('livewire.user.event', [
            'stats'         => $stats,
            'featured'      => $featured,
            'gridEvents'    => $gridEvents,
            'upcomingEvents'=> $upcomingEvents,
        ]);
    }
}