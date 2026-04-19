<?php

namespace App\Livewire\Admin;
use App\Models\Profile;
use App\Models\Job;
use App\Models\Event;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public int   $totalAlumni   = 0;
    public int   $pendingCount  = 0;
    public int   $jobCount      = 0;
    public int   $eventCount    = 0;
    public array $monthlyStats  = [];
    public array $statusStats   = [];
    public       $recentProfiles;
    public       $recentActivities;
 
    public function mount(): void
    {
        $this->totalAlumni  = Profile::where('status', 'active')->count();
        $this->pendingCount = Profile::where('status', 'pending')->count();
        $this->jobCount     = Job::where('is_active', true)->count();
        $this->eventCount   = Event::where('is_active', true)
                                ->where('event_date', '>=', now()->toDateString())
                                ->count();
 
        // Thống kê đăng ký theo tháng trong năm hiện tại
        $this->monthlyStats = collect(range(1, 12))->map(function ($month) {
            return Profile::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $month)
                ->count();
        })->toArray();
 
        // Thống kê trạng thái hồ sơ
        $this->statusStats = [
            'active'   => Profile::where('status', 'active')->count(),
            'pending'  => Profile::where('status', 'pending')->count(),
            'inactive' => Profile::where('status', 'inactive')->count(),
        ];
 
        // Hồ sơ chờ duyệt gần đây
        $this->recentProfiles = Profile::with('user')
            ->latest()
            ->take(5)
            ->get();
 
        // Hoạt động gần đây (dùng bảng activity_log nếu có, tạm dùng profiles)
        $this->recentActivities = Profile::with('user')
            ->latest()
            ->take(5)
            ->get();
    }
 
    // Duyệt hồ sơ nhanh từ dashboard
    public function approve(int $id): void
    {
        Profile::where('id', $id)->update(['status' => 'active']);
        $this->mount();
        session()->flash('success', 'Đã duyệt hồ sơ.');
    }
 
    public function reject(int $id): void
    {
        Profile::where('id', $id)->update(['status' => 'inactive']);
        $this->mount();
        session()->flash('success', 'Đã từ chối hồ sơ.');
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('components.layouts.admin');
    }
}
