<?php

namespace App\Livewire\Admin;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;

    public string  $search       = '';
    public string  $filterRole   = '';
    public string  $filterStatus = '';
    public int     $perPage      = 10;

    public bool    $showModal  = false;
    public ?int    $editId     = null;
    public string  $f_name     = '';
    public string  $f_email    = '';
    public string  $f_password = '';
    public string  $f_role     = 'alumni';
    public string  $f_status   = 'active';

    public bool    $showRole     = false;
    public ?int    $roleUserId   = null;
    public string  $roleUserName = '';
    public string  $roleValue    = 'alumni';

    public bool    $showDelete = false;
    public ?int    $deleteId   = null;
    public string  $deleteName = '';

    protected function rules(): array
    {
        return [
            'f_name'     => 'required|string|max:100',
            'f_email'    => 'required|email|unique:users,email,'.($this->editId ?? 'NULL'),
            'f_password' => $this->editId ? 'nullable|min:6' : 'required|min:6',
            'f_role'     => 'required|in:alumni,student,lecturer,admin,company',
            'f_status'   => 'required|in:active,pending,locked',
        ];
    }

    protected $messages = [
        'f_name.required'     => 'Vui lòng nhập họ tên.',
        'f_email.required'    => 'Vui lòng nhập email.',
        'f_email.unique'      => 'Email này đã được sử dụng.',
        'f_password.required' => 'Vui lòng nhập mật khẩu.',
        'f_password.min'      => 'Mật khẩu ít nhất 6 ký tự.',
    ];

    public function updatingSearch(): void       { $this->resetPage(); }
    public function updatingFilterRole(): void   { $this->resetPage(); }
    public function updatingFilterStatus(): void { $this->resetPage(); }

    public function openAdd(): void
    {
        $this->reset(['editId','f_name','f_email','f_password']);
        $this->f_role   = 'alumni';
        $this->f_status = 'active';
        $this->showModal = true;
    }

    public function openEdit(int $id): void
    {
        $u = UserModel::findOrFail($id);
        $this->editId     = $u->id;
        $this->f_name     = $u->name;
        $this->f_email    = $u->email;
        $this->f_password = '';
        // role & status nằm trên bảng users (sau fix_users_table migration)
        $this->f_role     = $u->role   ?? 'student';
        $this->f_status   = $u->status ?? 'pending';
        $this->showModal  = true;
    }

    public function save(): void
    {
        $this->validate();

        if ($this->editId) {
            $u = UserModel::findOrFail($this->editId);
            $u->update([
                'name'   => $this->f_name,
                'email'  => $this->f_email,
                'role'   => $this->f_role,
                'status' => $this->f_status,
            ]);
            if ($this->f_password) {
                $u->update(['password' => Hash::make($this->f_password)]);
            }
            session()->flash('success', 'Cập nhật người dùng thành công!');
        } else {
            UserModel::create([
                'name'     => $this->f_name,
                'email'    => $this->f_email,
                'password' => Hash::make($this->f_password),
                'role'     => $this->f_role,
                'status'   => $this->f_status,
            ]);
            session()->flash('success', 'Thêm người dùng thành công!');
        }

        $this->showModal = false;
        $this->resetPage();
    }

    public function closeModal(): void { $this->showModal = false; }

    public function openRole(int $id): void
    {
        $u = UserModel::findOrFail($id);
        $this->roleUserId   = $id;
        $this->roleUserName = $u->name;
        $this->roleValue    = $u->role ?? 'student';
        $this->showRole     = true;
    }

    public function saveRole(): void
    {
        $u = UserModel::findOrFail($this->roleUserId);
        $u->update(['role' => $this->roleValue]);
        $this->showRole = false;
        session()->flash('success', 'Đã cập nhật quyền cho '.$u->name.'!');
    }

    public function closeRole(): void { $this->showRole = false; }

    public function confirmDelete(int $id): void
    {
        $u = UserModel::findOrFail($id);
        $this->deleteId   = $id;
        $this->deleteName = $u->name;
        $this->showDelete = true;
    }

    public function destroy(): void
    {
        UserModel::findOrFail($this->deleteId)->delete();
        $this->showDelete = false;
        session()->flash('success', 'Đã xóa người dùng '.$this->deleteName.'!');
        $this->resetPage();
    }

    public function closeDelete(): void { $this->showDelete = false; }

    public function render()
    {
        $users = UserModel::with('profile')
            ->when($this->search, fn($q) =>
                $q->where('name', 'like', '%'.$this->search.'%')
                  ->orWhere('email', 'like', '%'.$this->search.'%')
            )
            ->when($this->filterRole, fn($q) =>
                $q->where('role', $this->filterRole)
            )
            ->when($this->filterStatus, fn($q) =>
                $q->where('status', $this->filterStatus)
            )
            ->latest()
            ->paginate($this->perPage);

        $stats = [
            'total'   => UserModel::count(),
            'alumni'  => UserModel::where('role', 'alumni')->count(),
            'pending' => UserModel::where('status', 'pending')->count(),
            'company' => UserModel::where('role', 'company')->count(),
        ];

        return view('livewire.admin.user', compact('users', 'stats'))
            ->layout('components.layouts.admin');
    }
}