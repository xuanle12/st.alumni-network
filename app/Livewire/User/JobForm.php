<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Job;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;

class JobForm extends Component
{
    // Bước hiện tại: 'form' | 'verify' | 'success'
    public string $step = 'form';

    // Form fields
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

    // OTP
    public string $otp_input = '';
    public bool   $otp_sent  = false;
    public string $otp_error = '';
    public int    $resend_countdown = 0;

    public function sendOtp()
    {
        $this->otp_error = '';

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

        $otp = (string) random_int(100000, 999999);

        // Lưu OTP vào session kèm thời gian hết hạn
        session([
            'job_otp'     => $otp,
            'job_otp_exp' => now()->addMinutes(10)->timestamp,
            'job_otp_email' => $this->contact_email,
        ]);

        Mail::to($this->contact_email)->send(new OtpMail(
            otp: $otp,
            itemTitle: $this->title,
            itemName: $this->company,
            type: 'job',
        ));

        $this->otp_sent        = true;
        $this->step            = 'verify';
        $this->resend_countdown = 60;
    }

    public function resendOtp()
    {
        $this->otp_input = '';
        $this->otp_error = '';
        $this->step      = 'form';
        $this->sendOtp();
    }

    public function verifyOtp()
    {
        $this->otp_error = '';

        $stored    = session('job_otp');
        $expiresAt = session('job_otp_exp');

        if (!$stored || !$expiresAt) {
            $this->otp_error = 'Phiên OTP không hợp lệ. Vui lòng gửi lại.';
            return;
        }

        if (now()->timestamp > $expiresAt) {
            $this->otp_error = 'Mã OTP đã hết hạn. Vui lòng gửi lại.';
            session()->forget(['job_otp', 'job_otp_exp', 'job_otp_email']);
            return;
        }

        if (trim($this->otp_input) !== $stored) {
            $this->otp_error = 'Mã OTP không đúng. Vui lòng kiểm tra lại.';
            return;
        }

        // OTP hợp lệ → tạo job
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

        session()->forget(['job_otp', 'job_otp_exp', 'job_otp_email']);

        $this->step = 'success';
    }

    public function backToForm()
    {
        $this->step      = 'form';
        $this->otp_input = '';
        $this->otp_error = '';
    }

    public function render()
    {
        return view('livewire.user.job-form')
            ->layout('components.layouts.app');
    }
}
