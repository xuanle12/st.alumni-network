<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public readonly string $otp,
        public readonly string $itemTitle,
        public readonly string $itemName,
        public readonly string $type = 'job', // 'job' | 'event'
    ) {}

    public function envelope(): Envelope
    {
        $label = $this->type === 'event' ? 'đăng sự kiện' : 'đăng tin tuyển dụng';

        return new Envelope(
            subject: "[ST Alumni] Mã xác thực {$label}",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.otp',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
