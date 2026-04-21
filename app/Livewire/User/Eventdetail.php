<?php

namespace App\Livewire\User;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Event;   

class Eventdetail extends Component
{
    public Event $event;

    public  $relatedEvents = [];

    public bool $registered = false;

    public bool $saved = false;

    public array $countdown = [];


    public function mount($id)
    {
        $this->event = Event::findOrFail($id);


        // sự kiện liên quan
        $this->relatedEvents = Event::where('id','!=',$id)
            ->where('event_date','>=',now())
            ->orderBy('event_date')
            ->take(3)
            ->get();
        // countdown
        $diff = now()->diff($this->event->event_date);

        $this->countdown = [

            'days' => $diff->days,

            'hours' => $diff->h,

            'minutes' => $diff->i,

        ];
        if(Auth::check()){

            $this->registered = EventRegistration::where('event_id',$id)
                ->where('user_id',Auth::id())
                ->where('status','registered')
                ->exists();

        }

    }
    public function register()
    {
        if(!Auth::check()){

            return redirect()->route('login');

        }


        if($this->registered){

            EventRegistration::where('event_id',$this->event->id)
                ->where('user_id',Auth::id())
                ->update([
                    'status'=>'cancelled'
                ]);

            $this->registered = false;

            session()->flash('success','Đã huỷ đăng ký');

            return;
        }


        EventRegistration::updateOrCreate(

            [
                'event_id'=>$this->event->id,
                'user_id'=>Auth::id()
            ],

            [
                'status'=>'registered'
            ]

        );


        $this->registered = true;

        session()->flash('success','Đăng ký thành công');

    }



    public function toggleSave()
    {
        $this->saved = !$this->saved;
    }



    public function copyLink()
    {
        $this->dispatch(
            'copy-link'
        );
    }
    public function render()
    {
        return view('livewire.user.eventdetail');
    }
}
