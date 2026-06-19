<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\MentorProfile;

class Mentor extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';
    public string $filterStatus = '';
    public int    $perPage = 15;
    public ?int   $selectedId = null;
    public string $admin_note = '';

    public function updatingSearch(): void       { $this->resetPage(); }
    public function updatingFilterStatus(): void { $this->resetPage(); }
    public function updatingPerPage(): void      { $this->resetPage(); }

    public function approve($id)
    {
        MentorProfile::findOrFail($id)->update([
            'status'     => 'approved',
            'admin_note' => $this->admin_note,
        ]);
        $this->admin_note = '';
        $this->selectedId = null;
        $this->dispatch('toast', type: 'success', message: 'Đã duyệt mentor.');
    }

    public function reject($id)
    {
        MentorProfile::findOrFail($id)->update([
            'status'     => 'rejected',
            'admin_note' => $this->admin_note,
        ]);
        $this->admin_note = '';
        $this->selectedId = null;
        $this->dispatch('toast', type: 'success', message: 'Đã từ chối.');
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
            ->paginate($this->perPage);

        return view('livewire.admin.mentor', compact('mentors'))->layout('components.layouts.admin');
    }
}
