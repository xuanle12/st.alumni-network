<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Event;
use App\Models\Post;

class EventForm extends Component
{
    // Bước hiện tại: 'form' | 'success'
    public string $step = 'form';

    // Form fields
    public string $title         = '';
    public string $organizer     = '';
    public string $contact_email = '';
    public string $location      = '';
    public string $event_date    = '';
    public string $start_time    = '';
    public string $end_time      = '';
    public string $badge         = 'free';
    public string $description   = '';

    public function submit()
    {
        $this->validate([
            'title'         => 'required|max:200',
            'organizer'     => 'required|max:150',
            'contact_email' => 'required|email',
            'location'      => 'nullable|max:150',
            'event_date'    => 'required|date|after_or_equal:today',
            'start_time'    => 'nullable',
            'end_time'      => 'nullable',
            'badge'         => 'required|in:free,register,paid',
            'description'   => 'nullable|max:5000',
        ], [
            'title.required'         => 'Vui lòng nhập tên sự kiện.',
            'organizer.required'     => 'Vui lòng nhập đơn vị tổ chức.',
            'contact_email.required' => 'Vui lòng nhập email liên hệ.',
            'contact_email.email'    => 'Email không hợp lệ.',
            'event_date.required'    => 'Vui lòng chọn ngày diễn ra.',
            'event_date.after_or_equal' => 'Ngày diễn ra không được ở quá khứ.',
        ]);

        $event = Event::create([
            'title'         => $this->title,
            'organizer'     => $this->organizer,
            'location'      => $this->location ?: null,
            'contact_email' => $this->contact_email,
            'event_date'    => $this->event_date,
            'start_time'    => $this->start_time ?: null,
            'end_time'      => $this->end_time ?: null,
            'badge'         => $this->badge,
            'description'   => $this->description ?: null,
            'status'        => 'active',
            'created_by'    => auth()->id(),
        ]);

        // Hiện sự kiện lên newsfeed (/csv)
        $post = Post::create([
            'user_id'  => auth()->id(),
            'content'  => $this->title . ' — ' . $this->organizer
                        . ($this->description ? "\n\n" . $this->description : ''),
            'category' => 'event',
            'status'   => 'published',
        ]);

        $event->update(['post_id' => $post->id]);

        \App\Models\Notification::sendToAdmins(
            'event_new',
            'Có sự kiện mới được đăng: "' . $this->title . '"',
            $this->organizer,
            route('admin.event'),
            auth()->id()
        );

        $this->step = 'success';
    }

    public function render()
    {
        return view('livewire.user.event-form')
            ->layout('components.layouts.app');
    }
}
