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
            'jobs'      => Job::count(),
            'events'    => Event::count(),
        ];
    }

    public function render()
    {
        return view('livewire.user.home', [
            'latestJobs'     => Job::latest()->take(6)->get(),
            'recentJobs'     => Job::latest()->take(3)->get(),
            'upcomingEvents' => Event::latest()->take(4)->get(),
            'latestPosts'    => Post::with('author')->latest()->take(3)->get(),
        ])->layout('components.layouts.app');
    }
}