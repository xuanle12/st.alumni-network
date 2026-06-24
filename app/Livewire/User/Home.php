<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Job;
use App\Models\Event;
use App\Models\Post;
use App\Models\User;
use App\Models\Company;

class Home extends Component
{
    public array $stats = [];

    public function mount()
    {
        $this->stats = [
            'alumni'    => User::count(),
            'companies' => Company::count(),
            'jobs'      => Job::active()->count(),
            'events'    => Event::active()->count(),
        ];
    }

    public function render()
    {
        $upcomingEvents = Event::active()
            ->whereDate('event_date', '>=', today())
            ->orderBy('event_date')
            ->take(4)
            ->get();

        return view('livewire.user.home', [
            'latestJobs'     => Job::active()->latest()->take(6)->get(),
            'recentJobs'     => Job::active()->latest()->take(3)->get(),
            'upcomingEvents' => $upcomingEvents,
            'latestPosts'    => Post::with('author')->latest()->take(3)->get(),
        ])->layout('components.layouts.app');
    }
}