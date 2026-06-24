<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Event;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;

class EventForm extends Component
{
    // Bước hiện tại: 'form' | 'verify' | 'success'
    public string $step = 'form';

    // Form fields
    public string $title         = '';
    public string $organizer     = '';
    public string $contact_email = '';
    public string $location      = '';
    public string $event_date    = '';
    public string $start_time    = '';
    public string $end_time      = '';
    public string $badge         = 'free';
    public string $description   = '';

    // OTP
    public string $otp_input = '';
    public bool   $otp_sent  = false;
    public string $otp_error = '';
    public int    $resend_countdown = 0;

    public function sendOtp()
    {
        $this->otp_error = '';

        $this->validate([
            'title'         => 'required|max:200',
            'organizer'     => 'required|max:150',
            'contact_email' => 'required|email',
            'location'      => 'nullable|max:150',
            'event_date'    => 'required|date|after_or_equal:today',
            'start_time'    => 'nullable',
            'end_time'      => 'nullable',
            'badge'         => 'required|in:free,register,paid',
            'description'   => 'nullable|max:5000',
        ], [
            'title.required'         => 'Vui lòng nhập tên sự kiện.',
            'organizer.required'     => 'Vui lòng nhập đơn vị tổ chức.',
            'contact_email.required' => 'Vui lòng nhập email liên hệ.',
            'contact_email.email'    => 'Email không hợp lệ.',
            'event_date.required'    => 'Vui lòng chọn ngày diễn ra.',
            'event_date.after_or_equal' => 'Ngày diễn ra không được ở quá khứ.',
        ]);

        $otp = (string) random_int(100000, 999999);

        // Lưu OTP vào session kèm thời gian hết hạn
        session([
            'event_otp'       => $otp,
            'event_otp_exp'   => now()->addMinutes(10)->timestamp,
            'event_otp_email' => $this->contact_email,
        ]);

        Mail::to($this->contact_email)->send(new OtpMail(
            otp: $otp,
            itemTitle: $this->title,
            itemName: $this->organizer,
            type: 'event',
        ));

        $this->otp_sent         = true;
        $this->step             = 'verify';
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

        $stored    = session('event_otp');
        $expiresAt = session('event_otp_exp');

        if (!$stored || !$expiresAt) {
            $this->otp_error = 'Phiên OTP không hợp lệ. Vui lòng gửi lại.';
            return;
        }

        if (now()->timestamp > $expiresAt) {
            $this->otp_error = 'Mã OTP đã hết hạn. Vui lòng gửi lại.';
            session()->forget(['event_otp', 'event_otp_exp', 'event_otp_email']);
            return;
        }

        if (trim($this->otp_input) !== $stored) {
            $this->otp_error = 'Mã OTP không đúng. Vui lòng kiểm tra lại.';
            return;
        }

        // OTP hợp lệ → tạo sự kiện (hiển thị ngay vì chưa có màn admin duyệt sự kiện)
        Event::create([
            'title'         => $this->title,
            'organizer'     => $this->organizer,
            'location'      => $this->location ?: null,
            'contact_email' => $this->contact_email,
            'event_date'    => $this->event_date,
            'start_time'    => $this->start_time ?: null,
            'end_time'      => $this->end_time ?: null,
            'badge'         => $this->badge,
            'description'   => $this->description ?: null,
            'status'        => 'active',
            'created_by'    => auth()->id(),
        ]);

        session()->forget(['event_otp', 'event_otp_exp', 'event_otp_email']);

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
        return view('livewire.user.event-form')
            ->layout('components.layouts.app');
    }
}
