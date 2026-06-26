<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Component;

class ResetPassword extends Component
{
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected $rules = [
        'email'    => 'required|email|string',
        'password' => 'required|string|min:6|confirmed',
    ];

    protected $messages = [
        'email.required'     => 'Vui lòng nhập email.',
        'email.email'        => 'Email không hợp lệ.',
        'password.required'  => 'Vui lòng nhập mật khẩu mới.',
        'password.min'       => 'Mật khẩu cần ít nhất 6 ký tự.',
        'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
    ];

    public function mount(string $token)
    {
        $this->token = $token;
        $this->email = request()->query('email', '');
    }

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            [
                'token'                 => $this->token,
                'email'                 => $this->email,
                'password'              => $this->password,
                'password_confirmation' => $this->password_confirmation,
            ],
            function ($user) {
                $user->forceFill([
                    'password'       => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('success', 'Đặt lại mật khẩu thành công! Vui lòng đăng nhập.');
            return redirect()->route('login');
        }

        $this->addError('email', match ($status) {
            Password::INVALID_TOKEN => 'Liên kết đặt lại mật khẩu không hợp lệ hoặc đã hết hạn.',
            Password::INVALID_USER  => 'Không tìm thấy tài khoản với email này.',
            default                 => 'Có lỗi xảy ra, vui lòng thử lại.',
        });
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
