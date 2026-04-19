<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    protected $rules = [
        'email' => 'required|email|string',
        'password' => 'required|string|min:6',
    ];

    public function loginWithEmail()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials, $this->remember)) {

            session()->regenerate();

            return redirect()->intended('/csv');
        }

        $this->addError('email', 'Email hoặc mật khẩu không đúng');

        $this->password = '';
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
