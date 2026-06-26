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

    protected $listeners = [
        'mentor-registered' => '$refresh',
    ];

    // trạng thái UI 
    public bool $edit = false;
    public bool $editingSocial = false;
    public bool $editingSkills = false;
    public int $pct = 0;

    // thông tin user
    public string $name = '';
    public string $phone = '';
    public string $que_quan = '';
    public string $tinh_thanh = '';
    public string $bio = '';

    

    // social 
    public string $github = '';
    public string $linkedin = '';
    public string $website = '';

    // skills
    public array $selectedSkills = []; // array of skill names (đang chọn, chưa lưu)
    public string $skillInput = '';

    // upload 
    public $cvFile;
    public $avatarFile;

    public function mount()
    {
        $this->loadData();
    }

    private function loadData()
    {
        $u = Auth::user()->load('profile', 'profile.skills');

        $this->name = $u->name;
        $this->phone = $u->profile->phone ?? '';
        $this->que_quan = $u->profile->que_quan ?? '';
        $this->tinh_thanh = $u->profile->tinh_thanh ?? '';
        $this->bio = $u->profile->bio ?? '';

        $this->github = $u->profile->github ?? '';
        $this->linkedin = $u->profile->linkedin ?? '';
        $this->website = $u->profile->website ?? '';

        $this->selectedSkills = $u->profile?->skills
            ? $u->profile->skills->pluck('name')->toArray()
            : [];
    }

    // lưu thông tin
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

        $this->dispatch('toast', type: 'success', message: 'Đã lưu thông tin');
    }

    public function cancelInfo()
    {
        $this->loadData();
        $this->edit = false;
    }

    // lưu social
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

        $this->dispatch('toast', type: 'success', message: 'Đã lưu liên kết');
    }

    public function cancelSocial()
    {
        $this->loadData();
        $this->editingSocial = false;
    }

    // kỹ năng 
    public function addSkill(?string $name = null)
    {
        $name = trim($name ?? $this->skillInput);

        if ($name === '') {
            return;
        }

        // tránh trùng 
        $exists = collect($this->selectedSkills)
            ->contains(fn ($s) => mb_strtolower($s) === mb_strtolower($name));

        if (!$exists) {
            $this->selectedSkills[] = $name;
        }

        $this->skillInput = '';
    }

    public function removeSkill(string $name)
    {
        $this->selectedSkills = array_values(array_filter(
            $this->selectedSkills,
            fn ($s) => $s !== $name
        ));
    }

    // gợi ý kỹ năng theo input 
    public function getSkillSuggestionsProperty()
    {
        $term = trim($this->skillInput);

        if ($term === '') {
            return collect();
        }

        return \App\Models\Skill::where('name', 'like', "%{$term}%")
            ->whereNotIn('name', $this->selectedSkills ?: [''])
            ->orderBy('name')
            ->limit(8)
            ->get();
    }

    public function saveSkills()
    {
        $profile = ProfileModel::firstOrCreate(['user_id' => Auth::id()]);

        $skillIds = collect($this->selectedSkills)
            ->filter()
            ->map(function ($name) {
                $skill = \App\Models\Skill::firstOrCreate(['name' => trim($name)]);
                return $skill->id;
            })
            ->unique()
            ->values()
            ->toArray();

        $profile->skills()->sync($skillIds);

        $this->editingSkills = false;
        $this->dispatch('toast', type: 'success', message: 'Đã cập nhật kỹ năng');

        $this->dispatch('skills-updated');
    }

    public function cancelSkills()
    {
        $this->loadData();
        $this->editingSkills = false;
        $this->skillInput = '';
    }

    // auto upload avatar when file selected
    public function updatedAvatarFile()
    {
        $this->uploadAvatar();
    }

    // upload avatar
    public function uploadAvatar()
    {
        $this->validate([
            'avatarFile' => 'image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $path = $this->avatarFile->store('avatars', 'public');

        ProfileModel::updateOrCreate(
            ['user_id' => Auth::id()],
            ['avatar' => $path]
        );

        $this->avatarFile = null;
        $this->dispatch('toast', type: 'success', message: 'Đã cập nhật ảnh đại diện');
    }

    // upload cv
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

        $this->dispatch('toast', type: 'success', message: 'Upload CV thành công');
    }

    public function deleteCv($id)
    {
        Cv::where('id',$id)
            ->where('user_id',Auth::id())
            ->delete();
    }

    public function render()
    {
        $user = Auth::user()->load('profile', 'profile.skills', 'cv');

        // % hoàn thành profile 
        $check = [
            $user->name,
            $user->email,
            $user->profile->phone ?? null,
            $user->profile->que_quan ?? null,
            $user->profile->tinh_thanh ?? null,
            $user->profile->github ?? null,
            $user->profile->linkedin ?? null,
            $user->profile?->skills->count() ?? 0,
            $user->cv->count()
        ];

        $this->pct =
            round(
                collect($check)->filter()->count()
                / count($check) * 100
            );

        $mentorProfile = \App\Models\MentorProfile::where('user_id', Auth::id())->first();

        return view('livewire.user.profile',[
            'user' => $user,
            'mentorProfile' => $mentorProfile,
        ]);
    }
}
