<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

use App\Models\Event;
use App\Models\Post;
use App\Models\User;

class Csv extends Component
{
    use WithFileUploads;

    public string $filter = 'all';

    public $currentUser;
    public $posts = [];
    public $events = [];
    public $contacts = [];

    /* modal post */
    public bool $showModal = false;

    public string $title = '';
    public string $content = '';
    public string $category = 'normal';

    public array $tags = [];
    public string $tagInput = '';

    public $coverImage = null;


    public function mount()
    {
        $this->currentUser = Auth::user()->load('profile');

        $this->loadData();
    }


    /* filter feed */
    public function setFilter(string $filter)
    {
        $this->filter = $filter;

        $this->loadData();
    }


    /* load data */
    private function loadData()
    {

        $query = Post::with([
            'author.profile',
            'job'
        ])->latest();

        $this->posts = match ($this->filter) {

            'recruit' =>
                $query->recruitment()->get(),

            'alumni' =>
                $query->fromAlumni()->get(),

            'friends' =>
                $query->fromFriends($this->currentUser)->get(),

            default =>
                $query->get(),

        };


        $this->events = Event::latest()

            ->limit(5)

            ->get();


        $this->contacts = User::with('profile')

            ->where('id','!=',$this->currentUser->id)

            ->limit(5)

            ->get();

    }


    /* mở modal */
    public function openModal()
    {
        $this->showModal = true;
    }


    public function closeModal()
    {
        $this->reset([

            'showModal',
            'title',
            'content',
            'category',
            'tags',
            'tagInput',
            'coverImage'

        ]);
    }


    /* thêm tag */
    public function addTag()
    {

        $tag = trim($this->tagInput);

        if(

            $tag
            &&
            !in_array($tag,$this->tags)
            &&
            count($this->tags) < 5

        ){

            $this->tags[] = $tag;

        }

        $this->tagInput = '';

    }


    public function removeTag($i)
    {

        unset($this->tags[$i]);

        $this->tags = array_values($this->tags);

    }


    /* đăng bài */
    public function publish()
    {

        $this->validate([

            'content' => 'required|min:3'

        ]);


        $path = null;

        if($this->coverImage){

            $path = $this->coverImage

                ->store('posts','public');

        }


        $body = trim($this->title) !== ''
            ? $this->title."\n\n".$this->content
            : $this->content;

        Post::create([
            'user_id' => Auth::id(),
            'content' => $body,
            'category' => in_array($this->category, ['normal','job','event'], true) ? $this->category : 'normal',
            'image' => $path,
        ]);


        $this->closeModal();


        $this->loadData();

    }



    public function render()
    {

        return view('livewire.user.csv');

    }
}