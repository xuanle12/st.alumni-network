<?php

namespace App\Mail;

use App\Models\Job;
use App\Models\DonUngTuyen;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class MailThongBaoUngVienMoi extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public DonUngTuyen $application,
        public Job $job,
    )
    {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Có ứng viên mới ứng tuyển vị trí ' . $this->job->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.thong-bao-ung-vien-moi',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        if ($this->application->cv_path && Storage::disk('public')->exists($this->application->cv_path)) {
            return [
                Attachment::fromStorageDisk('public', $this->application->cv_path)
                    ->as('CV_' . $this->application->name . '.' . pathinfo($this->application->cv_path, PATHINFO_EXTENSION)),
            ];
        }

        return [];
    }
}
