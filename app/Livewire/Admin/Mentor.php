<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MentorProfile;
 
class Mentor extends Component
{
   use WithPagination;
 
    public string $search = '';
    public string $filterStatus = '';
    public ?int $selectedId = null;
    public string $admin_note = '';
 
    public function approve($id)
    {
        MentorProfile::findOrFail($id)->update([
            'status'     => 'approved',
            'admin_note' => $this->admin_note,
        ]);
        $this->admin_note = '';
        $this->selectedId = null;
        session()->flash('success', 'Đã duyệt mentor.');
    }
 
    public function reject($id)
    {
        MentorProfile::findOrFail($id)->update([
            'status'     => 'rejected',
            'admin_note' => $this->admin_note,
        ]);
        $this->admin_note = '';
        $this->selectedId = null;
        session()->flash('success', 'Đã từ chối.');
    }
 
    public function render()
    {
        $mentors = MentorProfile::with('user.profile')
            ->when($this->search, fn($q) =>
                $q->whereHas('user', fn($q2) =>
                    $q2->where('name', 'like', '%'.$this->search.'%')
                )
            )
            ->when($this->filterStatus, fn($q) =>
                $q->where('status', $this->filterStatus)
            )
            ->latest()
            ->paginate(15);
 
        return view('livewire.admin.mentor', compact('mentors'))->layout('components.layouts.admin');
    }
}
