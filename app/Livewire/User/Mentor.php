<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MentorProfile;

class Mentor extends Component
{
    use WithPagination;
 
    public string $search = '';
    public string $filterExpertise = '';
 
    public function updatingSearch()        { $this->resetPage(); }
    public function updatingFilterExpertise() { $this->resetPage(); }
 
    public function render()
    {
        $mentors = MentorProfile::with('user.profile')
            ->where('status', 'approved')
            ->when($this->search, fn($q) =>
                $q->where('expertise', 'like', '%'.$this->search.'%')
                  ->orWhere('skills', 'like', '%'.$this->search.'%')
                  ->orWhereHas('user', fn($q2) =>
                      $q2->where('name', 'like', '%'.$this->search.'%')
                  )
            )
            ->when($this->filterExpertise, fn($q) =>
                $q->where('expertise', 'like', '%'.$this->filterExpertise.'%')
            )
            ->latest()
            ->paginate(12);
 
        return view('livewire.user.mentor', compact('mentors'));
    }
}
