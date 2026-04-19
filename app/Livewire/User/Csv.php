<?php

namespace App\Livewire\User;
use App\Models\Event;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class Csv extends Component
{
    public string $filter = 'all';

    public $currentUser;
    public $posts = [];
    public $events = [];
    public $contacts = [];

    public function mount()
    {
        $this->currentUser = User::with('profile')->first();

        $this->loadData();
    }



    public function setFilter(string $filter)
    {
        $this->filter = $filter;
        $this->loadData();
    }

    private function loadData()
    {
        $query = Post::with(['author.profile','job'])->latest();

        $this->posts = match ($this->filter) {
            'recruit' => $query->recruitment()->get(),
            'alumni'  => $query->fromAlumni()->get(),
            'friends' => $query->fromFriends($this->currentUser)->get(),
            default   => $query->get(),
        };

        
        $this->events = Event::latest()->limit(5)->get();

        $this->contacts = \App\Models\User::with('profile')
            ->where('id','!=',$this->currentUser->id)
            ->limit(5)
            ->get();
        }


    public function render()
    {
        return view('livewire.user.csv');
    }
}
