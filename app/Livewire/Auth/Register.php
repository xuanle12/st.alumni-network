<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public string $ho = '';
    public string $ten = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected $rules = [
        'ho'       => 'required|string|max:60',
        'ten'      => 'required|string|max:60',
        'email'    => 'required|email|max:120|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ];

    protected $messages = [
        'ho.required'        => 'Vui lòng nhập họ.',
        'ten.required'       => 'Vui lòng nhập tên.',
        'email.required'     => 'Vui lòng nhập email.',
        'email.email'        => 'Email không hợp lệ.',
        'email.unique'       => 'Email đã được sử dụng.',
        'password.required'  => 'Vui lòng nhập mật khẩu.',
        'password.min'       => 'Mật khẩu cần ít nhất 6 ký tự.',
        'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
    ];

    public function register()
    {
        $this->validate();

        $name = trim($this->ho.' '.$this->ten);

        $user = User::create([
            'name'     => $name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        session()->regenerate();

        return redirect()->intended(route('csv'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
