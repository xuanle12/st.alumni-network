<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile as ProfileModel;
use App\Models\Cv;

class Profile extends Component
{
    use WithFileUploads;

    /* trạng thái UI */
    public bool $edit = false;
    public bool $editingSocial = false;
    public int $pct = 0;

    /* thông tin user */
    public string $name = '';
    public string $phone = '';
    public string $que_quan = '';
    public string $tinh_thanh = '';
    public string $bio = '';

    /* social */
    public string $github = '';
    public string $linkedin = '';
    public string $website = '';

    /* upload */
    public $cvFile;

    public function mount()
    {
        $this->loadData();
    }

    private function loadData()
    {
        $u = Auth::user()->load('profile');

        $this->name = $u->name;
        $this->phone = $u->profile->phone ?? '';
        $this->que_quan = $u->profile->que_quan ?? '';
        $this->tinh_thanh = $u->profile->tinh_thanh ?? '';
        $this->bio = $u->profile->bio ?? '';

        $this->github = $u->profile->github ?? '';
        $this->linkedin = $u->profile->linkedin ?? '';
        $this->website = $u->profile->website ?? '';
    }

    /* lưu thông tin */
    public function saveInfo()
    {
        $this->validate([
            'name' => 'required|max:100',
            'phone' => 'nullable|max:15'
        ]);

        Auth::user()->update([
            'name' => $this->name
        ]);

        ProfileModel::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'phone' => $this->phone,
                'que_quan' => $this->que_quan,
                'tinh_thanh' => $this->tinh_thanh,
                'bio' => $this->bio
            ]
        );

        $this->edit = false;

        session()->flash('success','Đã lưu thông tin');
    }

    public function cancelInfo()
    {
        $this->loadData();
        $this->edit = false;
    }

    /* lưu social */
    public function saveSocial()
    {
        ProfileModel::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'github' => $this->github,
                'linkedin' => $this->linkedin,
                'website' => $this->website
            ]
        );

        $this->editingSocial = false;

        session()->flash('success','Đã lưu liên kết');
    }

    public function cancelSocial()
    {
        $this->loadData();
        $this->editingSocial = false;
    }

    /* upload cv */
    public function uploadCv()
    {
        $this->validate([
            'cvFile' => 'file|mimes:pdf,doc,docx|max:5120'
        ]);

        $file = $this->cvFile;

        $path = $file->store('cv','public');

        Cv::create([
            'user_id' => Auth::id(),
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'file_size' => $file->getSize(),
            'is_primary' => false
        ]);

        $this->cvFile = null;

        session()->flash('success','Upload CV thành công');
    }

    public function deleteCv($id)
    {
        Cv::where('id',$id)
            ->where('user_id',Auth::id())
            ->delete();
    }

    public function render()
    {
        $user = Auth::user()->load('profile','cv');

        /* % hoàn thành profile */
        $check = [
            $user->name,
            $user->email,
            $user->profile->phone ?? null,
            $user->profile->que_quan ?? null,
            $user->profile->tinh_thanh ?? null,
            $user->profile->github ?? null,
            $user->profile->linkedin ?? null,
            $user->cv->count()
        ];

        $this->pct =
            round(
                collect($check)->filter()->count()
                / count($check) * 100
            );

        return view('livewire.user.profile',[
            'user' => $user
        ]);
    }
}