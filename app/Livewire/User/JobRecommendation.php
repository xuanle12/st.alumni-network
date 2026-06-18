<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Services\JobMatchingService;
use Livewire\Attributes\On;

class JobRecommendation extends Component
{
        #[On('skills-updated')]
    public function refreshJobs()
    {
            $this->render();
    }
    public function render()
    {
        $profile = auth()->user()?->profile;

        $jobs = collect();

        if ($profile) {
            $service = new JobMatchingService();
            $jobs = $service->recommend($profile, 10);
        }

        return view('livewire.user.job-recommendation', compact('jobs'));
    }
}