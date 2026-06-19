<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\MentorProfile;

class MentorForm extends Component
{
    public bool $showModal = false;
 
    public string $expertise = '';
    public string $skills = '';
    public string $bio = '';
    public string $contact_info = '';
    public int $max_mentee = 3;
 
    protected $listeners = [
        'open-mentor-register' => 'open',
    ];
 
    public function open()
    {
        $this->resetForm();
        $this->showModal = true;
    }
 
    public function close()
    {
        $this->showModal = false;
        $this->resetForm();
        $this->resetErrorBag();
    }
 
    private function resetForm()
    {
        $this->expertise = '';
        $this->skills = '';
        $this->bio = '';
        $this->contact_info = '';
        $this->max_mentee = 3;
    }
 
    public function submit()
    {
        $this->validate([
            'expertise'    => 'required|string|max:255',
            'skills'       => 'required|string|max:500',
            'bio'          => 'nullable|string|max:1000',
            'contact_info' => 'nullable|string|max:255',
            'max_mentee'   => 'required|integer|min:1|max:20',
        ], [
            'expertise.required' => 'Vui lòng nhập lĩnh vực chuyên môn',
            'skills.required'    => 'Vui lòng nhập kỹ năng có thể hướng dẫn',
            'max_mentee.required'=> 'Vui lòng nhập số lượng mentee tối đa',
            'max_mentee.min'     => 'Số lượng mentee tối thiểu là 1',
            'max_mentee.max'     => 'Số lượng mentee tối đa là 20',
        ]);
 
        MentorProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'expertise'    => $this->expertise,
                'skills'       => $this->skills,
                'bio'          => $this->bio,
                'contact_info' => $this->contact_info,
                'max_mentee'   => $this->max_mentee,
                'status'       => 'pending',
                'admin_note'   => null,
            ]
        );
 
        $this->showModal = false;
        $this->resetForm();
 
        $this->dispatch('mentor-registered');
 
        $this->dispatch('toast', type: 'success', message: 'Đã gửi đăng ký làm Mentor, vui lòng chờ quản trị viên duyệt.');
    }
 
    public function render()
    {
        $mentorProfile = MentorProfile::where('user_id', Auth::id())->first();
 
        return view('livewire.user.mentor-form', [
            'mentorProfile' => $mentorProfile,
        ]);
    }
}

