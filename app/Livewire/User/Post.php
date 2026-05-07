<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Post as PostModel;

class Post extends Component
{
    use WithFileUploads;

    public string $title          = '';
    public string $category       = 'normal';
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
            'title'       => 'nullable|string|max:200',
            'category'    => 'required|in:normal,job,event',
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

        $body = trim((string) $this->title) !== ''
            ? $this->title."\n\n".$this->content
            : $this->content;

        PostModel::create([
            'user_id'  => Auth::id(),
            'content'  => $body,
            'image'    => $coverPath,
            'category' => $this->category,
            'status'   => $this->status,
        ]);

        session()->flash('success',
            $this->status === 'published' ? 'Bài viết đã được đăng!' : 'Đã lưu nháp.'
        );

        $this->redirect(route('csv'), navigate: true);
    }
    public function render()
    {
        return view('livewire.user.post');
    }
}
