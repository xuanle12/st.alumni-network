<?php

namespace App\Livewire\Admin;
use App\Models\Profile;
use App\Models\Job;
use App\Models\Event;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public int   $totalAlumni    = 0;
    public int   $pendingCount   = 0;
    public int   $jobCount       = 0;
    public int   $pendingJobCount = 0;
    public int   $eventCount     = 0;
    public array $monthlyStats  = [];
    public array $statusStats   = [];
    public       $recentProfiles;
    public       $recentActivities;
 
    public function mount(): void
    {
        $this->totalAlumni     = Profile::where('status', 'active')->count();
        $this->pendingCount    = Profile::where('status', 'pending')->count();
        $this->jobCount        = Job::where('status', 'approved')->where('is_active', true)->count();
        $this->pendingJobCount = Job::where('status', 'pending')->count();
        $this->eventCount   = Event::where('status', 'active')
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
 
        // Hoạt động gần đây 
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
        $this->dispatch('toast', type: 'success', message: 'Đã duyệt hồ sơ.');
    }
 
    public function reject(int $id): void
    {
        Profile::where('id', $id)->update(['status' => 'inactive']);
        $this->mount();
        $this->dispatch('toast', type: 'success', message: 'Đã từ chối hồ sơ.');
    }

    /** Xuất toàn bộ thống kê ra file CSV (mở được bằng Excel). */
    public function export()
    {
        $byLocation = Profile::selectRaw('tinh_thanh, count(*) as total')
            ->whereNotNull('tinh_thanh')->where('status', 'active')
            ->groupBy('tinh_thanh')->orderByDesc('total')->take(20)->get();

        $byField = Job::selectRaw('field, count(*) as total')
            ->whereNotNull('field')->where('is_active', true)
            ->groupBy('field')->orderByDesc('total')->take(20)->get();

        $topCompanies = Job::selectRaw('company, count(*) as total, max(field) as field')
            ->where('is_active', true)
            ->groupBy('company')->orderByDesc('total')->take(20)->get();

        $rows = [];
        $rows[] = ['THỐNG KÊ HỆ THỐNG — FITA VNUA', 'Xuất lúc: ' . now()->format('d/m/Y H:i')];
        $rows[] = [];
        $rows[] = ['TỔNG QUAN'];
        $rows[] = ['Cựu sinh viên (đang hoạt động)', $this->totalAlumni];
        $rows[] = ['Hồ sơ chờ duyệt', $this->pendingCount];
        $rows[] = ['Tin tuyển dụng đang hiển thị', $this->jobCount];
        $rows[] = ['Tin tuyển dụng chờ duyệt', $this->pendingJobCount];
        $rows[] = ['Sự kiện sắp tới (30 ngày)', $this->eventCount];
        $rows[] = [];
        $rows[] = ['ĐĂNG KÝ HỒ SƠ THEO THÁNG (' . now()->year . ')'];
        $rows[] = ['Tháng', 'Số hồ sơ'];
        foreach ($this->monthlyStats as $i => $v) {
            $rows[] = ['Tháng ' . ($i + 1), $v];
        }
        $rows[] = [];
        $rows[] = ['TRẠNG THÁI HỒ SƠ'];
        $rows[] = ['Hoạt động', $this->statusStats['active'] ?? 0];
        $rows[] = ['Chờ duyệt', $this->statusStats['pending'] ?? 0];
        $rows[] = ['Không hoạt động', $this->statusStats['inactive'] ?? 0];
        $rows[] = [];
        $rows[] = ['KHU VỰC LÀM VIỆC'];
        $rows[] = ['Khu vực', 'Số người'];
        foreach ($byLocation as $r) {
            $rows[] = [$r->tinh_thanh, $r->total];
        }
        $rows[] = [];
        $rows[] = ['LĨNH VỰC TUYỂN DỤNG'];
        $rows[] = ['Lĩnh vực', 'Số tin'];
        foreach ($byField as $r) {
            $rows[] = [$r->field, $r->total];
        }
        $rows[] = [];
        $rows[] = ['TOP DOANH NGHIỆP TUYỂN DỤNG'];
        $rows[] = ['Doanh nghiệp', 'Lĩnh vực', 'Số tin'];
        foreach ($topCompanies as $r) {
            $rows[] = [$r->company, $r->field ?? '—', $r->total];
        }

        $filename = 'thong-ke-' . now()->format('Ymd-His') . '.csv';

        return response()->streamDownload(function () use ($rows) {
            echo "\xEF\xBB\xBF"; // BOM UTF-8 để Excel đọc đúng tiếng Việt
            $out = fopen('php://output', 'w');
            foreach ($rows as $r) {
                fputcsv($out, $r, ',', '"', '\\');
            }
            fclose($out);
        }, $filename, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('components.layouts.admin');
    }
}

