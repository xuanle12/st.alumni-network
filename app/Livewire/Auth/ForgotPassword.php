<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPassword extends Component
{
    public string $email = '';
    public bool $sent = false;

    protected $rules = [
        'email' => 'required|email|string',
    ];

    protected $messages = [
        'email.required' => 'Vui lòng nhập email.',
        'email.email'    => 'Email không hợp lệ.',
    ];

    public function sendResetLink()
    {
        $this->validate();

        Password::sendResetLink(['email' => $this->email]);

        // Luôn hiển thị thông báo thành công, không tiết lộ email có tồn tại hay không
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
