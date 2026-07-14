<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Illuminate\Validation\Rule;
use App\Models\MentorProfile;
use App\Models\User;

class Mentor extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';
    public string $filterStatus = '';
    public int    $perPage = 10;
    public ?int   $selectedId = null;
    public string $admin_note = '';

    // Form thêm / sửa
    public bool   $showForm    = false;
    public ?int   $editId      = null;
    public ?int   $f_user_id   = null;
    public string $f_userName  = '';
    public string $userSearch  = '';
    public string $f_expertise = '';
    public string $f_skills    = '';
    public string $f_bio       = '';
    public string $f_contact   = '';
    public int    $f_max       = 3;
    public string $f_status    = 'pending';

    // Xoá
    public bool   $showDelete = false;
    public ?int   $deleteId   = null;
    public string $deleteName = '';

    protected $messages = [
        'f_user_id.required'  => 'Vui lòng chọn cựu sinh viên.',
        'f_user_id.exists'    => 'Người được chọn phải là cựu sinh viên đã có tài khoản.',
        'f_expertise.required'=> 'Vui lòng nhập lĩnh vực chuyên môn.',
        'f_skills.required'   => 'Vui lòng nhập kỹ năng.',
        'f_max.min'           => 'Số mentee tối thiểu là 1.',
    ];

    public function updatingSearch(): void       { $this->resetPage(); }
    public function updatingFilterStatus(): void { $this->resetPage(); }
    public function updatingPerPage(): void      { $this->resetPage(); }

    // ── Gợi ý người dùng chưa có hồ sơ mentor (khi thêm mới) ──
    #[Computed]
    public function userSuggestions()
    {
        $term     = trim($this->userSearch);
        $existing = MentorProfile::pluck('user_id');

        // Chỉ cựu sinh viên (đã có tài khoản) và chưa có hồ sơ mentor
        $query = User::where('role', 'alumni')
            ->whereNotIn('id', $existing)
            ->orderBy('name');

        if ($term !== '') {
            $query->where(fn($q) =>
                $q->where('name', 'like', "%{$term}%")
                  ->orWhere('email', 'like', "%{$term}%")
            );
        }

        return $query->limit($term === '' ? 20 : 8)->get();
    }

    public function selectUser(int $id): void
    {
        $u = User::find($id);
        if ($u) {
            $this->f_user_id  = $u->id;
            $this->f_userName = $u->name;
            $this->userSearch = '';
        }
    }

    public function openCreate(): void
    {
        $this->resetForm();
        $this->editId   = null;
        $this->showForm = true;
    }

    public function openEdit(int $id): void
    {
        $m = MentorProfile::with('user')->findOrFail($id);

        $this->editId      = $m->id;
        $this->f_user_id   = $m->user_id;
        $this->f_userName  = $m->user?->name ?? '';
        $this->f_expertise = $m->expertise ?? '';
        $this->f_skills    = $m->skills ?? '';
        $this->f_bio       = $m->bio ?? '';
        $this->f_contact   = $m->contact_info ?? '';
        $this->f_max       = $m->max_mentee ?? 3;
        $this->f_status    = $m->status ?? 'pending';

        $this->showForm = true;
    }

    public function save(): void
    {
        $rules = [
            'f_expertise' => 'required|string|max:1000',
            'f_skills'    => 'required|string|max:1000',
            'f_bio'       => 'nullable|string|max:2000',
            'f_contact'   => 'nullable|string|max:255',
            'f_max'       => 'required|integer|min:1|max:50',
            'f_status'    => 'required|in:pending,approved,rejected',
        ];
        if (!$this->editId) {
            $rules['f_user_id'] = ['required', Rule::exists('users', 'id')->where('role', 'alumni')];
        }

        $this->validate($rules);

        $data = [
            'expertise'    => $this->f_expertise,
            'skills'       => $this->f_skills,
            'bio'          => $this->f_bio     ?: null,
            'contact_info' => $this->f_contact ?: null,
            'max_mentee'   => $this->f_max,
            'status'       => $this->f_status,
        ];

        if ($this->editId) {
            $mentor    = MentorProfile::findOrFail($this->editId);
            $oldStatus = $mentor->status;
            $mentor->update($data);

            // Admin đổi trạng thái qua form Chỉnh sửa → thông báo cho người dùng
            if ($this->f_status !== $oldStatus) {
                $this->notifyStatusChange($mentor->user_id, $this->f_status);
            }

            $this->dispatch('toast', type: 'success', message: 'Đã cập nhật mentor.');
        } else {
            $data['user_id'] = $this->f_user_id;
            MentorProfile::create($data);

            // Tạo mới với trạng thái đã duyệt/từ chối → thông báo cho người dùng
            if ($this->f_status !== 'pending') {
                $this->notifyStatusChange($this->f_user_id, $this->f_status);
            }

            $this->dispatch('toast', type: 'success', message: 'Đã thêm mentor.');
        }

        $this->closeForm();
    }

    public function closeForm(): void
    {
        $this->showForm = false;
        $this->editId   = null;
        $this->resetForm();
        $this->resetValidation();
    }

    private function resetForm(): void
    {
        $this->reset([
            'f_user_id', 'f_userName', 'userSearch',
            'f_expertise', 'f_skills', 'f_bio', 'f_contact',
        ]);
        $this->f_max    = 3;
        $this->f_status = 'pending';
    }

    public function confirmDelete(int $id): void
    {
        $m = MentorProfile::with('user')->findOrFail($id);
        $this->deleteId   = $id;
        $this->deleteName = $m->user?->name ?? ('#' . $id);
        $this->showDelete = true;
    }

    public function destroy(): void
    {
        if ($this->deleteId) {
            $mentor = MentorProfile::find($this->deleteId);
            $userId = $mentor?->user_id;

            MentorProfile::destroy($this->deleteId);

            if ($userId) {
                \App\Models\Notification::send(
                    $userId,
                    'mentor',
                    'Hồ sơ mentor của bạn đã bị gỡ bỏ',
                    'Quản trị viên đã gỡ hồ sơ mentor của bạn. Bạn có thể đăng ký lại nếu muốn.',
                    route('mentor')
                );
            }

            $this->dispatch('toast', type: 'success', message: 'Đã xoá mentor.');
        }
        $this->closeDelete();
    }

    /** Gửi thông báo cho người dùng khi admin đổi trạng thái hồ sơ mentor. */
    private function notifyStatusChange(int $userId, string $status): void
    {
        $title = match ($status) {
            'approved' => 'Hồ sơ mentor của bạn đã được duyệt',
            'rejected' => 'Hồ sơ mentor của bạn đã bị từ chối',
            default    => 'Hồ sơ mentor của bạn đang chờ duyệt lại',
        };

        \App\Models\Notification::send(
            $userId,
            'mentor',
            $title,
            null,
            route('mentor')
        );
    }

    public function closeDelete(): void
    {
        $this->showDelete = false;
        $this->deleteId   = null;
        $this->deleteName = '';
    }

    public function approve($id)
    {
        $mentor = MentorProfile::findOrFail($id);
        $mentor->update([
            'status'     => 'approved',
            'admin_note' => $this->admin_note,
        ]);
        \App\Models\Notification::send(
            $mentor->user_id,
            'mentor',
            'Hồ sơ mentor của bạn đã được duyệt',
            $this->admin_note ?: null,
            route('mentor')
        );
        $this->admin_note = '';
        $this->selectedId = null;
        $this->dispatch('toast', type: 'success', message: 'Đã duyệt mentor.');
    }

    public function reject($id)
    {
        $mentor = MentorProfile::findOrFail($id);
        $mentor->update([
            'status'     => 'rejected',
            'admin_note' => $this->admin_note,
        ]);
        \App\Models\Notification::send(
            $mentor->user_id,
            'mentor',
            'Hồ sơ mentor của bạn đã bị từ chối',
            $this->admin_note ?: null,
            route('mentor')
        );
        $this->admin_note = '';
        $this->selectedId = null;
        $this->dispatch('toast', type: 'success', message: 'Đã từ chối.');
    }

    public function render()
    {
        $mentors = MentorProfile::with('user.profile')
            ->when($this->search, fn($q) =>
                $q->whereHas('user', fn($q2) =>
                    $q2->where('name', 'like', '%'.$this->search.'%')
                )
            )
            ->when($this->filterStatus, fn($q) =>
                $q->where('status', $this->filterStatus)
            )
            ->latest()
            ->paginate($this->perPage);

        $statusCounts = [
            'pending'  => MentorProfile::where('status', 'pending')->count(),
            'approved' => MentorProfile::where('status', 'approved')->count(),
            'rejected' => MentorProfile::where('status', 'rejected')->count(),
        ];

        return view('livewire.admin.mentor', compact('mentors', 'statusCounts'))->layout('components.layouts.admin');
    }
}
