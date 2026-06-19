<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Job;

class JobForm extends Component
{
    public string $title = '';
    public string $company = '';
    public string $location = '';
    public string $f_type = 'full-time';
    public string $field = '';
    public string $min_salary = '';
    public string $max_salary = '';
    public string $experience_required = '';
    public string $deadline = '';
    public string $description = '';
    public string $contact_email = '';

    public bool $submitted = false;

    public function submit()
    {
        $this->validate([
            'title'               => 'required|max:200',
            'company'             => 'required|max:150',
            'contact_email'       => 'required|email',
            'location'            => 'nullable|max:100',
            'field'               => 'nullable|max:100',
            'min_salary'          => 'nullable|numeric|min:0',
            'max_salary'          => 'nullable|numeric|min:0',
            'experience_required' => 'nullable|integer|min:0',
            'deadline'            => 'nullable|date|after:today',
            'description'         => 'nullable|max:5000',
        ], [
            'title.required'         => 'Vui lòng nhập tiêu đề tin tuyển dụng.',
            'company.required'       => 'Vui lòng nhập tên công ty.',
            'contact_email.required' => 'Vui lòng nhập email liên hệ.',
            'contact_email.email'    => 'Email không hợp lệ.',
            'deadline.after'         => 'Hạn nộp phải sau ngày hôm nay.',
        ]);

        Job::create([
            'title'               => $this->title,
            'company'             => $this->company,
            'location'            => $this->location ?: null,
            'type'                => $this->f_type,
            'field'               => $this->field ?: null,
            'min_salary'          => $this->min_salary !== '' ? $this->min_salary : null,
            'max_salary'          => $this->max_salary !== '' ? $this->max_salary : null,
            'experience_required' => $this->experience_required !== '' ? $this->experience_required : null,
            'deadline'            => $this->deadline ?: null,
            'description'         => $this->description ?: null,
            'contact_email'       => $this->contact_email,
            'status'              => 'pending',
            'is_active'           => false,
            'created_by'          => auth()->id(),
        ]);

        $this->submitted = true;
    }

    public function render()
    {
        return view('livewire.user.job-form')
            ->layout('components.layouts.app');
    }
}
