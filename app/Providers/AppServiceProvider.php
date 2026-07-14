<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Schema;
use Laravel\Socialite\Facades\Socialite;
use App\Providers\MySSOProvider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (app()->environment('production')) {URL::forceScheme('https');}
        $socialite = $this->app->make(\Laravel\Socialite\Contracts\Factory::class);
        $socialite->extend('sso', function ($app) use ($socialite) {
            $config = $app['config']['services.sso'];
            return $socialite->buildProvider(MySSOProvider::class, $config);
        });

        $this->applyMailSettings();
    }

    /** Áp cấu hình email do admin lưu trong DB (nếu có) đè lên .env. */
    private function applyMailSettings(): void
    {
        try {
            if (!Schema::hasTable('settings')) {
                return;
            }

            $host = Setting::get('mail.host');
            if (!$host) {
                return; // chưa cấu hình → dùng cấu hình .env mặc định
            }

            $encryption = Setting::get('mail.encryption', 'tls');

            config([
                'mail.default'                 => 'smtp',
                'mail.mailers.smtp.host'       => $host,
                'mail.mailers.smtp.port'       => (int) Setting::get('mail.port', 587),
                'mail.mailers.smtp.username'   => Setting::get('mail.username'),
                'mail.mailers.smtp.password'   => Setting::get('mail.password'),
                'mail.mailers.smtp.encryption' => $encryption === 'none' ? null : $encryption,
                'mail.from.address'            => Setting::get('mail.from_address', config('mail.from.address')),
                'mail.from.name'               => Setting::get('mail.from_name', config('mail.from.name')),
            ]);
        } catch (\Throwable $e) {
            // Không để lỗi cấu hình mail làm sập ứng dụng
        }
    }
}
