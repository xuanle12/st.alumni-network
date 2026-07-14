<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Models\Setting;
use App\Support\MailTemplate;

class MailConfig extends Component
{
    public string $host         = '';
    public string $port         = '587';
    public string $username     = '';
    public string $password     = '';
    public string $encryption   = 'tls';
    public string $from_address = '';
    public string $from_name    = '';

    public string $test_email = '';

    /** Nội dung các thư: [key => ['subject'=>, 'body'=>]] */
    public array $tpl = [];

    public function mount(): void
    {
        // Nạp nội dung email (DB → fallback mặc định)
        foreach (MailTemplate::defaults() as $key => $def) {
            $this->tpl[$key] = [
                'subject' => (string) (Setting::get("mail_tpl.{$key}.subject") ?? $def['subject']),
                'body'    => (string) (Setting::get("mail_tpl.{$key}.body") ?? $def['body']),
            ];
        }

        // Nạp từ DB, fallback về cấu hình .env hiện tại (ép về chuỗi, tránh null)
        $this->host         = (string) (Setting::get('mail.host', config('mail.mailers.smtp.host')) ?? '');
        $this->port         = (string) (Setting::get('mail.port', config('mail.mailers.smtp.port')) ?? '587');
        $this->username     = (string) (Setting::get('mail.username', config('mail.mailers.smtp.username')) ?? '');
        $this->password     = (string) (Setting::get('mail.password', config('mail.mailers.smtp.password')) ?? '');
        $this->encryption   = (string) (Setting::get('mail.encryption', config('mail.mailers.smtp.encryption')) ?: 'tls');
        $this->from_address = (string) (Setting::get('mail.from_address', config('mail.from.address')) ?? '');
        $this->from_name    = (string) (Setting::get('mail.from_name', config('mail.from.name')) ?? '');

        $this->test_email = (string) (auth()->user()->email ?? '');
    }

    protected function rules(): array
    {
        return [
            'host'         => 'required|string|max:255',
            'port'         => 'required|integer|min:1|max:65535',
            'username'     => 'nullable|string|max:255',
            'password'     => 'nullable|string|max:255',
            'encryption'   => 'required|in:tls,ssl,none',
            'from_address' => 'required|email|max:255',
            'from_name'    => 'required|string|max:255',
        ];
    }

    protected $messages = [
        'host.required'         => 'Vui lòng nhập máy chủ SMTP.',
        'port.required'         => 'Vui lòng nhập cổng.',
        'from_address.required' => 'Vui lòng nhập email gửi.',
        'from_address.email'    => 'Email gửi không hợp lệ.',
        'from_name.required'    => 'Vui lòng nhập tên hiển thị.',
    ];

    public function save(): void
    {
        $this->validate();

        Setting::set('mail.host',         trim($this->host));
        Setting::set('mail.port',         trim($this->port));
        Setting::set('mail.username',     trim($this->username));
        Setting::set('mail.password',     $this->password);
        Setting::set('mail.encryption',   $this->encryption);
        Setting::set('mail.from_address', trim($this->from_address));
        Setting::set('mail.from_name',    trim($this->from_name));

        $this->dispatch('toast', type: 'success', message: 'Đã lưu cấu hình email.');
    }

    public function sendTest(): void
    {
        $this->validate($this->rules());
        $this->validate(['test_email' => 'required|email'], [
            'test_email.required' => 'Nhập email để gửi thử.',
            'test_email.email'    => 'Email nhận thử không hợp lệ.',
        ]);

        // Áp cấu hình từ form vào runtime để gửi thử ngay
        config([
            'mail.default'                 => 'smtp',
            'mail.mailers.smtp.host'       => $this->host,
            'mail.mailers.smtp.port'       => (int) $this->port,
            'mail.mailers.smtp.username'   => $this->username ?: null,
            'mail.mailers.smtp.password'   => $this->password ?: null,
            'mail.mailers.smtp.encryption' => $this->encryption === 'none' ? null : $this->encryption,
            'mail.from.address'            => $this->from_address,
            'mail.from.name'               => $this->from_name,
        ]);

        try {
            Mail::raw(
                'Đây là email kiểm tra cấu hình SMTP từ hệ thống Mạng lưới Cựu sinh viên FITA-VNUA. '
                . 'Nếu bạn nhận được email này, cấu hình đã hoạt động.',
                function ($m) {
                    $m->to($this->test_email)->subject('Kiểm tra cấu hình email');
                }
            );

            $this->dispatch('toast', type: 'success', message: 'Đã gửi email kiểm tra tới ' . $this->test_email . '.');
        } catch (\Throwable $e) {
            $this->dispatch('toast', type: 'error', message: 'Gửi thất bại: ' . $e->getMessage());
        }
    }

    public function saveTemplates(): void
    {
        foreach ($this->tpl as $key => $t) {
            Setting::set("mail_tpl.{$key}.subject", trim($t['subject'] ?? ''));
            Setting::set("mail_tpl.{$key}.body", $t['body'] ?? '');
        }
        $this->dispatch('toast', type: 'success', message: 'Đã lưu nội dung email.');
    }

    public function resetTemplate(string $key): void
    {
        $def = MailTemplate::defaults()[$key] ?? null;
        if ($def) {
            $this->tpl[$key]['subject'] = $def['subject'];
            $this->tpl[$key]['body']    = $def['body'];
        }
    }

    public function render()
    {
        return view('livewire.admin.mail-config', [
            'tplMeta' => MailTemplate::defaults(),
        ])->layout('components.layouts.admin');
    }
}
