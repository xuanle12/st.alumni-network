<?php 
namespace App\Providers;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class MySSOProvider extends AbstractProvider implements ProviderInterface
{
    // URL dẫn đến trang đăng nhập của SSO
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase(env('SSO_URL', 'https://st-dse.vnua.edu.vn:6891'), $state);
    }

    // URL để lấy Access Token từ Code
    protected function getTokenUrl()
    {
        return 'https://sso.your-system.com/token';
    }

    // Lấy thông tin User thô từ SSO Server
    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get('https://sso.your-system.com/api/user', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    // Map dữ liệu thô sang đối tượng User của Socialite
    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id'       => $user['id'],
            'nickname' => $user['username'],
            'name'     => $user['full_name'],
            'email'    => $user['email'],
            'avatar'   => $user['avatar_url'],
        ]);
    }
}