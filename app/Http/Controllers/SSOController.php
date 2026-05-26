<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class SSOController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('mysso')
            ->with(['custom_param' => 'your_value'])
            ->redirect();
    }

    public function callback()
    {
        try {
            $ssoUser = Socialite::driver('mysso')->user();

            return redirect('/home');
        } catch (\Exception $e) {
            return redirect('/csv')->with('error', 'Đăng nhập SSO thất bại!');
        }
    }
}