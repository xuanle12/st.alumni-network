<?php

namespace App\Livewire\Admin;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Post;    

class Posts extends Component
{
    use WithPagination;

    public string $search = '';
    public string $filterStatus = '';
    public string $filterCat = '';
    public int    $perPage = 10;

    // modal thêm / sửa
    public bool $showModal = false;
    public ?int $editId = null;
    public string $f_content = '';
    public string $f_category = '';
    public string $f_status = 'draft';

    // modal xem
    public bool $showView = false;
    public ?int $viewId = null;

    // modal xoá
    public bool $showDelete = false;
    public ?int $deleteId = null;

    // modal duyệt
    public bool $showApprove = false;
    public ?int $approveId = null;

    public function updatedSearch() { $this->resetPage(); }
    public function updatedFilterStatus() { $this->resetPage(); }
    public function updatingPerPage(): void { $this->resetPage(); }
    public function updatedFilterCat() { $this->resetPage(); }

    public function openAdd()
    {
        $this->resetForm();
        $this->editId = null;
        $this->showModal = true;
    }

    public function openEdit(int $id)
    {
        $p = Post::findOrFail($id);

        $this->editId     = $id;
        $this->f_content  = $p->content  ?? '';
        $this->f_category = $p->category ?? '';
        $this->f_status   = $p->status   ?? 'draft';

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'f_content'  => 'required|string|min:5',
            'f_category' => 'required|string',
            'f_status'   => 'required|in:published,draft,pending',
        ]);

        $data = [
            'content'  => $this->f_content,
            'category' => $this->f_category,
            'status'   => $this->f_status,
        ];

        if ($this->editId) {
            Post::findOrFail($this->editId)->update($data);
            $this->dispatch('toast', type: 'success', message: 'Đã cập nhật bài viết.');
        } else {
            $data['user_id'] = Auth::id();
            Post::create($data);
            $this->dispatch('toast', type: 'success', message: 'Đã thêm bài viết.');
        }

        $this->closeModal();
    }

    public function toDraft(int $id): void
    {
        Post::findOrFail($id)->update(['status' => 'draft']);
        $this->dispatch('toast', type: 'success', message: 'Đã chuyển về bản nháp.');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->editId = null;
        $this->resetForm();
        $this->resetValidation();
    }

    public function openView(int $id)
    {
        $this->viewId   = $id;
        $this->showView = true;
    }

    public function closeView()
    {
        $this->showView = false;
        $this->viewId   = null;
    }

    public function openApprove(int $id)
    {
        $this->approveId    = $id;
        $this->showApprove  = true;
    }

    public function closeApprove()
    {
        $this->showApprove = false;
        $this->approveId   = null;
    }

    public function approve()
    {
        Post::findOrFail($this->approveId)->update(['status' => 'published']);
        $this->dispatch('toast', type: 'success', message: 'Đã duyệt bài viết.');
        $this->closeApprove();
    }

    public function confirmDelete(int $id)
    {
        $this->deleteId    = $id;
        $this->showDelete  = true;
    }

    public function closeDelete()
    {
        $this->showDelete = false;
        $this->deleteId   = null;
    }

    public function destroy()
    {
        if ($this->deleteId) {
            Post::findOrFail($this->deleteId)->delete();
            $this->dispatch('toast', type: 'success', message: 'Đã xoá bài viết.');
        }
        $this->closeDelete();
    }

    private function resetForm()
    {
        $this->f_content  = '';
        $this->f_category = '';
        $this->f_status   = 'draft';
    }

    public function render()
    {
        $posts = Post::with('author')
            ->when($this->search, fn($q) =>
                $q->where('content', 'like', '%' . $this->search . '%')
            )
            ->when($this->filterStatus, fn($q) =>
                $q->where('status', $this->filterStatus)
            )
            ->when($this->filterCat, fn($q) =>
                $q->where('category', $this->filterCat)
            )
            ->latest()
            ->paginate($this->perPage);

        $stats = [
            'total'     => Post::count(),
            'published' => Post::where('status', 'published')->count(),
            'pending'   => Post::where('status', 'pending')->count(),
            'draft'     => Post::where('status', 'draft')->count(),
        ];

        $viewPost    = $this->viewId    ? Post::with('author')->find($this->viewId)    : null;
        $approvePost = $this->approveId ? Post::with('author')->find($this->approveId) : null;
        $deleteName  = $this->deleteId
            ? Str::limit(Post::find($this->deleteId)?->content ?? '', 50)
            : '';

        return view('livewire.admin.posts', compact(
            'posts',
            'stats',
            'viewPost',
            'approvePost',
            'deleteName'
        ))->layout('components.layouts.admin');
    }
}