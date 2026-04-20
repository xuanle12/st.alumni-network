<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
class Post extends Component
{
    use WithFileUploads;
 
    public string $title          = '';
    public string $category       = '';
    public string $khoa           = '';
    public string $excerpt        = '';
    public string $content        = '';
    public string $status         = 'published';
    public bool   $allow_comments = true;
    public array  $tags           = [];
    public string $tagInput       = '';
    public        $coverImage     = null;
 
    protected function rules(): array
    {
        return [
            'title'       => 'required|string|max:200',
            'category'    => 'required|string',
            'content'     => 'required|string|min:10',
            'excerpt'     => 'nullable|string|max:300',
            'coverImage'  => 'nullable|image|max:2048',
            'tags'        => 'array|max:5',
        ];
    }
 
    protected $messages = [
        'title.required'    => 'Vui lòng nhập tiêu đề.',
        'category.required' => 'Vui lòng chọn danh mục.',
        'content.required'  => 'Nội dung không được để trống.',
        'content.min'       => 'Nội dung quá ngắn.',
    ];
 
    public function addTag(): void
    {
        $tag = trim($this->tagInput);
        if ($tag && count($this->tags) < 5 && !in_array($tag, $this->tags)) {
            $this->tags[] = $tag;
        }
        $this->tagInput = '';
    }
 
    public function removeTag(int $index): void
    {
        array_splice($this->tags, $index, 1);
        $this->tags = array_values($this->tags);
    }
 
    public function publish(): void
    {
        $this->status = 'published';
        $this->save();
    }
 
    public function saveDraft(): void
    {
        $this->status = 'draft';
        $this->save();
    }
 
    private function save(): void
    {
        $this->validate();
 
        $coverPath = null;
        if ($this->coverImage) {
            $coverPath = $this->coverImage->store('posts/covers', 'public');
        }
 
        Post::create([
            'user_id'        => Auth::id(),
            'title'          => $this->title,
            'slug'           => Post::generateSlug($this->title),
            'category'       => $this->category,
            'khoa'           => $this->khoa ?: null,
            'excerpt'        => $this->excerpt ?: null,
            'content'        => $this->content,
            'cover_image'    => $coverPath,
            'tags'           => $this->tags ?: null,
            'status'         => $this->status,
            'allow_comments' => $this->allow_comments,
        ]);
 
        session()->flash('success',
            $this->status === 'published' ? 'Bài viết đã được đăng!' : 'Đã lưu nháp.'
        );
 
        $this->redirect(route('forum'));
    }
    public function render()
    {
        return view('livewire.user.post');
    }
}
