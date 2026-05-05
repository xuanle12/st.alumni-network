<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class Jobsdetail extends Component
{
    public Job $job;
    public $related = [];

    public bool $saved = false;
    public bool $applied = false;

    public function mount($id)
    {
        $this->job = Job::findOrFail($id);

        $this->related = Job::where('id', '!=', $id)
            ->where(function ($q) {
                $q->where('khoa', $this->job->khoa)
                  ->orWhere('field', $this->job->field);
            })
            ->take(3)
            ->get();
    }

    public function apply()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->applied = true;

        session()->flash('success', 'Đã gửi hồ sơ!');
    }

    public function toggleSave()
    {
        $this->saved = !$this->saved;
    }

    public function render()
    {
        return view('livewire.user.jobsdetail', [
            'job' => $this->job,
            'related' => $this->related,
        ]);
    }
}