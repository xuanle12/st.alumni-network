<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Profile;
class Csv extends Component
{
    use WithPagination;
 
    // ── tìm kiếm / lọc ──
    public string $search      = '';
    public string $filterStatus = '';
    public string $filterKhoa  = '';
 
    // ── modal thêm/sửa ──
    public bool    $showModal  = false;
    public ?int    $editId     = null;   // null = thêm mới
 
    // ── fields form ──
    public string $f_name  = '';
    public string $f_email = '';
    public string $f_msv   = '';
    public string $f_lop   = '';
    public string $f_year  = '';
    public string $f_job   = '';
    public string $f_cmp   = '';
    public string $f_khoa  = '';
    public string $f_status = 'pending';
 
    // ── modal xem ──
    public bool $showView   = false;
    public ?int $viewId     = null;
 
    // ── confirm xoá ──
    public bool $showDelete = false;
    public ?int $deleteId   = null;
 
    public function updatedSearch():       void { $this->resetPage(); }
    public function updatedFilterStatus(): void { $this->resetPage(); }
    public function updatedFilterKhoa():   void { $this->resetPage(); }
 
    /* ────────────────────────────────
       MỞ MODAL THÊM MỚI
    ──────────────────────────────── */
    public function openAdd(): void
    {
        $this->resetForm();
        $this->editId    = null;
        $this->showModal = true;
    }
 
    /* ────────────────────────────────
       MỞ MODAL SỬA
    ──────────────────────────────── */
    public function openEdit(int $userId): void
    {
        $user = User::with('profile')->findOrFail($userId);
        $p    = $user->profile;
 
        $this->editId   = $userId;
        $this->f_name   = $user->name;
        $this->f_email  = $user->email;
        $this->f_msv    = $p?->msv           ?? '';
        $this->f_lop    = $p?->lop           ?? '';
        $this->f_year   = (string)($p?->nam_tot_nghiep ?? '');
        $this->f_job    = $p?->current_position ?? '';
        $this->f_cmp    = $p?->current_company  ?? '';
        $this->f_khoa   = $p?->khoa          ?? '';
        $this->f_status = $p?->status        ?? 'pending';
 
        $this->showModal = true;
    }
 
    /* ────────────────────────────────
       LƯU (thêm mới hoặc cập nhật)
       Tạm thời: CHỈ ĐỌC DB, chưa ghi
    ──────────────────────────────── */
    public function save(): void
    {
        $this->validate([
            'f_name'  => 'required|string|max:100',
            'f_email' => 'required|email|max:100',
            'f_msv'   => 'required|string|max:20',
            'f_lop'   => 'nullable|string|max:30',
            'f_year'  => 'nullable|digits:4',
            'f_job'   => 'nullable|string|max:100',
            'f_cmp'   => 'nullable|string|max:100',
            'f_khoa'  => 'nullable|string|max:50',
            'f_status'=> 'required|in:active,pending,inactive',
        ], [
            'f_name.required'  => 'Vui lòng nhập họ tên.',
            'f_email.required' => 'Vui lòng nhập email.',
            'f_email.email'    => 'Email không hợp lệ.',
            'f_msv.required'   => 'Vui lòng nhập mã sinh viên.',
            'f_year.digits'    => 'Năm tốt nghiệp phải là 4 chữ số.',
        ]);
 
       
        if ($this->editId) {
            // CẬP NHẬT
            $user = User::findOrFail($this->editId);
            $user->update(['name' => $this->f_name, 'email' => $this->f_email]);
            Profile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'msv'              => $this->f_msv,
                    'lop'              => $this->f_lop ?: null,
                    'nam_tot_nghiep'   => $this->f_year ?: null,
                    'current_position' => $this->f_job ?: null,
                    'current_company'  => $this->f_cmp ?: null,
                    'khoa'             => $this->f_khoa ?: null,
                    'status'           => $this->f_status,
                ]
            );
            session()->flash('success', 'Đã cập nhật thông tin.');
        } else {
            // THÊM MỚI
            $user = User::create([
                'name'     => $this->f_name,
                'email'    => $this->f_email,
                'password' => bcrypt('password'),
                'role'     => 'alumni',
            ]);
            Profile::create([
                'user_id'          => $user->id,
                'msv'              => $this->f_msv,
                'lop'              => $this->f_lop ?: null,
                'nam_tot_nghiep'   => $this->f_year ?: null,
                'current_position' => $this->f_job ?: null,
                'current_company'  => $this->f_cmp ?: null,
                'khoa'             => $this->f_khoa ?: null,
                'status'           => $this->f_status,
            ]);
            session()->flash('success', 'Đã thêm cựu sinh viên.');
        }
        
 
        // Tạm thời chỉ đóng modal 
        session()->flash('success', $this->editId ? 'Đã cập nhật .' : 'Đã thêm.');
        $this->closeModal();
    }
 
    public function closeModal(): void
    {
        $this->showModal = false;
        $this->editId    = null;
        $this->resetForm();
        $this->resetValidation();
    }
 
    public function openView(int $userId): void
    {
        $this->viewId    = $userId;
        $this->showView  = true;
    }
 
    public function closeView(): void
    {
        $this->showView = false;
        $this->viewId   = null;
    }
 
    /* ────────────────────────────────
       DUYỆT NHANH
    ──────────────────────────────── */
    public function quickApprove(int $userId): void
    {
        Profile::where('user_id', $userId)->update(['status' => 'active']);
        session()->flash('success', 'Đã duyệt hồ sơ.');
    }
 
    
    public function confirmDelete(int $userId): void
    {
        $this->deleteId  = $userId;
        $this->showDelete = true;
    }
 
    public function closeDelete(): void
    {
        $this->showDelete = false;
        $this->deleteId  = null;
    }
 
    public function destroy(): void
    {
        if ($this->deleteId) {
            User::findOrFail($this->deleteId)->delete();
            session()->flash('success', 'Đã xoá cựu sinh viên.');
        }
        $this->closeDelete();
    }
 
    /* ────────────────────────────────
       HELPERS
    ──────────────────────────────── */
    private function resetForm(): void
    {
        $this->f_name = $this->f_email = $this->f_msv = '';
        $this->f_lop  = $this->f_year  = $this->f_job = '';
        $this->f_cmp  = $this->f_khoa  = '';
        $this->f_status = 'pending';
    }
 
   
    public function render()
    {
        // Query cựu sinh viên (role = alumni hoặc lọc theo profile)
        $query = User::with('profile')
            ->where('is_admin', false)
            ->whereHas('profile', fn($q) => $q->whereNotNull('msv'))
            ->when($this->search, fn($q) =>
                $q->where(fn($q2) =>
                    $q2->where('name',  'like', '%'.$this->search.'%')
                       ->orWhere('email','like', '%'.$this->search.'%')
                       ->orWhereHas('profile', fn($p) =>
                           $p->where('msv', 'like', '%'.$this->search.'%')
                             ->orWhere('khoa','like','%'.$this->search.'%')
                             ->orWhere('current_company','like','%'.$this->search.'%')
                       )
                )
            )
            ->when($this->filterStatus, fn($q) =>
                $q->whereHas('profile', fn($p) => $p->where('status', $this->filterStatus))
            )
            ->when($this->filterKhoa, fn($q) =>
                $q->whereHas('profile', fn($p) => $p->where('khoa', 'like', '%'.$this->filterKhoa.'%'))
            )
            ->latest();
 
        $users = $query->paginate(15);
 
        $stats = [
            'total'   => User::where('is_admin', false)->whereHas('profile', fn($q) => $q->whereNotNull('msv'))->count(),
            'active'  => Profile::where('status', 'active')->whereNotNull('msv')->count(),
            'pending' => Profile::where('status', 'pending')->whereNotNull('msv')->count(),
            'hasJob'  => Profile::whereNotNull('current_company')->count(),
        ];
 
        $viewUser = $this->viewId
            ? User::with(['profile', 'cvs'])->find($this->viewId)
            : null;
 
        $deleteName = $this->deleteId
            ? User::find($this->deleteId)?->name
            : '';
 
        return view('livewire.admin.Csv', compact('users', 'stats', 'viewUser', 'deleteName')
        )->layout('components.layouts.admin');
    }
}

