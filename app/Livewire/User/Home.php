<?php

namespace App\Livewire\User;

use Livewire\Component;

class Home extends Component
{
    public $stats = [];
public $latestJobs = [];
public $spotlightAlumni = [];
public $upcomingEvents = [];
    public function mount()
{
    $this->stats = [
        'alumni' => 1200,
        'companies' => 35,
        'jobs' => 12,
        'events' => 5
    ];

    $this->latestJobs = [];
    $this->spotlightAlumni = [];
    $this->upcomingEvents = [];
}
    public function render()
    {
        return view('livewire.user.home')->layout('components.layouts.app');
    }
}
