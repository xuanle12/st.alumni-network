<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Event as EventModel;
use App\Models\Post;

class Event extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';
    public string $badgeFilter = '';
    public string $statusFilter = '';
    public int    $perPage = 10;

    public bool $showForm = false;
    public bool $showDetail = false;

    public ?int $detailId = null;
    public int $editId = 0;

    /* form fields */
    public string $title         = '';
    public string $organizer     = '';
    public string $location      = '';
    public string $contact_email = '';
    public string $event_date    = '';
    public string $start_time    = '';
    public string $end_time      = '';
    public string $badge         = 'free';
    public string $description   = '';

    /* reset page khi search/filter */
    public function updatedSearch() { $this->resetPage(); }
    public function updatedBadgeFilter() { $this->resetPage(); }
    public function updatedStatusFilter() { $this->resetPage(); }
    public function updatingPerPage(): void { $this->resetPage(); }

    public function openCreate()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function openEdit($id)
    {
        $event = EventModel::findOrFail($id);

        $this->editId        = $id;
        $this->title         = $event->title;
        $this->organizer     = $event->organizer ?? '';
        $this->location      = $event->location ?? '';
        $this->contact_email = $event->contact_email ?? '';
        $this->event_date    = $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('Y-m-d') : '';
        $this->start_time    = $event->start_time ? substr($event->start_time, 0, 5) : '';
        $this->end_time      = $event->end_time ? substr($event->end_time, 0, 5) : '';
        $this->badge         = $event->badge;
        $this->description   = $event->description ?? '';

        $this->showForm   = true;
        $this->showDetail = false;
    }

    public function openDetail($id)
    {
        $this->detailId   = $id;
        $this->showDetail = true;
    }

    public function save()
    {
        $this->validate([
            'title'         => 'required|max:200',
            'organizer'     => 'required|max:150',
            'contact_email' => 'nullable|email',
            'location'      => 'nullable|max:150',
            'event_date'    => 'required|date',
            'start_time'    => 'nullable',
            'end_time'      => 'nullable',
            'badge'         => 'required|in:free,register,paid',
            'description'   => 'nullable|max:5000',
        ], [
            'title.required'      => 'Vui lòng nhập tên sự kiện.',
            'organizer.required'  => 'Vui lòng nhập đơn vị tổ chức.',
            'event_date.required' => 'Vui lòng chọn ngày diễn ra.',
        ]);

        $data = [
            'title'         => $this->title,
            'organizer'     => $this->organizer,
            'location'      => $this->location ?: null,
            'contact_email' => $this->contact_email ?: null,
            'event_date'    => $this->event_date,
            'start_time'    => $this->start_time ?: null,
            'end_time'      => $this->end_time ?: null,
            'badge'         => $this->badge,
            'description'   => $this->description ?: null,
        ];

        if ($this->editId) {
            $event = EventModel::findOrFail($this->editId);
            $event->update($data);
            $this->syncPost($event);
            $this->dispatch('toast', type: 'success', message: 'Đã cập nhật sự kiện.');
        } else {
            // Admin tạo trực tiếp → active ngay
            $data['status']     = 'active';
            $data['created_by'] = auth()->id();
            $event = EventModel::create($data);
            $this->syncPost($event);
            $this->dispatch('toast', type: 'success', message: 'Đã thêm sự kiện.');
        }

        $this->resetForm();
        $this->showForm = false;
    }

    /* Đổi trạng thái sự kiện + đồng bộ bài đăng trên newsfeed */
    public function setStatus($id, string $status)
    {
        if (!in_array($status, ['draft', 'active', 'closed'], true)) {
            return;
        }

        $event = EventModel::findOrFail($id);
        $event->update(['status' => $status]);
        $this->syncPost($event);

        $label = match($status) {
            'active' => 'hiển thị',
            'closed' => 'đóng',
            default  => 'ẩn',
        };

        $this->showDetail = false;
        $this->dispatch('toast', type: 'success', message: "Đã {$label} sự kiện.");
    }

    /* Bật/tắt hiển thị: active <-> draft */
    public function toggleActive($id)
    {
        $event = EventModel::findOrFail($id);
        $this->setStatus($id, $event->status === 'active' ? 'draft' : 'active');
    }

    public function delete($id)
    {
        $event = EventModel::find($id);

        if ($event) {
            // Xóa cả bài đăng liên quan trên newsfeed
            if ($event->post_id) {
                Post::where('id', $event->post_id)->delete();
            }
            $event->delete();
        }

        $this->showDetail = false;
        $this->dispatch('toast', type: 'success', message: 'Đã xóa sự kiện.');
    }

    /* Tạo/cập nhật bài đăng liên kết để hiện/ẩn trên newsfeed (/csv) */
    private function syncPost(EventModel $event): void
    {
        $postStatus = $event->status === 'active' ? 'published' : 'draft';
        $content    = $event->title . ' — ' . $event->organizer
                    . ($event->description ? "\n\n" . $event->description : '');

        if ($event->post_id) {
            Post::where('id', $event->post_id)->update([
                'content' => $content,
                'status'  => $postStatus,
            ]);
        } else {
            $post = Post::create([
                'user_id'  => $event->created_by ?? auth()->id(),
                'content'  => $content,
                'category' => 'event',
                'status'   => $postStatus,
            ]);
            $event->update(['post_id' => $post->id]);
        }
    }

    private function resetForm()
    {
        $this->reset([
            'title', 'organizer', 'location', 'contact_email',
            'event_date', 'start_time', 'end_time', 'description', 'editId',
        ]);

        $this->badge = 'free';
    }

    public function render()
    {
        $query = EventModel::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('organizer', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->badgeFilter) {
            $query->where('badge', $this->badgeFilter);
        }

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        return view('livewire.admin.event', [
            'events'      => $query->latest()->paginate($this->perPage),
            'detail'      => $this->detailId ? EventModel::withCount('registrations')->find($this->detailId) : null,
            'activeCount' => EventModel::where('status', 'active')->count(),
            'draftCount'  => EventModel::where('status', 'draft')->count(),
        ])->layout('components.layouts.admin');
    }
}
