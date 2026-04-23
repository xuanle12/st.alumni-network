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

    // modal thêm / sửa
    public bool $showModal = false;
    public ?int $editId = null;
    public string $f_title = '';
    public string $f_excerpt = '';
    public string $f_content = '';
    public string $f_category = '';
    public string $f_status = 'draft';
    public bool $f_featured = false;

    // modal xem
    public bool $showView = false;
    public ?int $viewId = null;

    // modal xoá
    public bool $showDelete = false;
    public ?int $deleteId = null;

    // modal duyệt
    public bool $showApprove = false;
    public ?int $approveId = null;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterStatus()
    {
        $this->resetPage();
    }

    public function updatedFilterCat()
    {
        $this->resetPage();
    }

    public function openAdd()
    {
        $this->resetForm();
        $this->editId = null;
        $this->showModal = true;
    }

    public function openEdit(int $id)
    {
        $p = Post::findOrFail($id);

        $this->editId = $id;
        $this->f_title = $p->title;
        $this->f_excerpt = $p->excerpt ?? '';
        $this->f_content = $p->content ?? '';
        $this->f_category = $p->category ?? '';
        $this->f_status = $p->status;
        $this->f_featured = (bool) $p->is_featured;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate([
            'f_title' => 'required|string|max:255',
            'f_content' => 'required|string|min:10',
            'f_category' => 'required|string',
            'f_status' => 'required|in:published,draft,pending,hidden',
        ]);

        $data = [
            'title' => $this->f_title,
            'excerpt' => $this->f_excerpt ?: null,
            'content' => $this->f_content,
            'category' => $this->f_category,
            'status' => $this->f_status,
            'is_featured' => $this->f_featured,
        ];

        if ($this->editId) {
            $post = Post::findOrFail($this->editId);

            if ($this->f_status === 'published' && $post->status !== 'published') {
                $data['published_at'] = now();
            }

            $post->update($data);

            session()->flash('success', 'Đã cập nhật bài viết.');
        } else {
            $data['slug'] = Post::generateSlug($this->f_title);
            $data['author_id'] = Auth::id();

            if ($this->f_status === 'published') {
                $data['published_at'] = now();
            }

            Post::create($data);

            session()->flash('success', 'Đã thêm bài viết.');
        }

        $this->closeModal();
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
        $this->viewId = $id;
        $this->showView = true;
    }

    public function closeView()
    {
        $this->showView = false;
        $this->viewId = null;
    }

    public function openApprove(int $id)
    {
        $this->approveId = $id;
        $this->showApprove = true;
    }

    public function closeApprove()
    {
        $this->showApprove = false;
        $this->approveId = null;
    }

    public function approve()
    {
        Post::findOrFail($this->approveId)->update([
            'status' => 'published',
            'published_at' => now(),
        ]);

        session()->flash('success', 'Đã duyệt bài viết.');

        $this->closeApprove();
    }

    public function confirmDelete(int $id)
    {
        $this->deleteId = $id;
        $this->showDelete = true;
    }

    public function closeDelete()
    {
        $this->showDelete = false;
        $this->deleteId = null;
    }

    public function destroy()
    {
        if ($this->deleteId) {
            Post::findOrFail($this->deleteId)->delete();
            session()->flash('success', 'Đã xoá bài viết.');
        }

        $this->closeDelete();
    }

    private function resetForm()
    {
        $this->f_title = '';
        $this->f_excerpt = '';
        $this->f_content = '';
        $this->f_category = '';
        $this->f_status = 'draft';
        $this->f_featured = false;
    }

    public function render()
    {
        $posts = Post::with('author')
            ->when($this->search, fn($q) =>
                $q->where('title', 'like', '%' . $this->search . '%')
            )
            ->when($this->filterStatus, fn($q) =>
                $q->where('status', $this->filterStatus)
            )
            ->when($this->filterCat, fn($q) =>
                $q->where('category', $this->filterCat)
            )
            ->latest()
            ->paginate(15);

        $stats = [
            'total' => Post::count(),
            'published' => Post::where('status', 'published')->count(),
            'pending' => Post::where('status', 'pending')->count(),
            'draft' => Post::where('status', 'draft')->count(),
        ];

        $viewPost = $this->viewId ? Post::with('author')->find($this->viewId) : null;
        $approvePost = $this->approveId ? Post::with('author')->find($this->approveId) : null;
        $deleteName = $this->deleteId
            ? Str::limit(Post::find($this->deleteId)?->title ?? '', 50)
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
