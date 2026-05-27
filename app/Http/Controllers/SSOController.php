<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SSOController extends Controller
{
    public function redirect()
    {
        $query = http_build_query([
            'client_id' => env('SSO_CLIENT_ID'),
            'redirect_uri' => env('SSO_REDIRECT_URL'),
            'response_type' => 'code',
        ]);

        return redirect(env('SSO_URL') . '?' . $query);
    }

    public function callback(Request $request)
    {
        // lấy access token
        $response = Http::asForm()->post(
            env('SSO_IP') . '/oauth/token',
            [
                'grant_type' => 'authorization_code',
                'client_id' => env('SSO_CLIENT_ID'),
                'client_secret' => env('SSO_CLIENT_SECRET'),
                'redirect_uri' => env('SSO_REDIRECT_URL'),
                'code' => $request->code,
            ]
        );

        $tokenData = $response->json();

        $accessToken = $tokenData['access_token'];

        // lấy user info
        $userResponse = Http::withToken($accessToken)
            ->get(env('SSO_USERINFO_URL'));

        $ssoUser = $userResponse->json();

        // dd($ssoUser);

        // tạo user local

        $user = User::updateOrCreate(
            [
                'email' => $ssoUser['email']
            ],

            [
                'name' => $ssoUser['user_name'] ?? 'SSO User',
                'password' => Hash::make(Str::random(32)),
            ],
            [
                'sso_id' => $ssoUser['id']
            ],
            [
                'password' => bcrypt('default_password'),
            ]
        );

        Auth::login($user);

        return redirect('/csv');

    }
}