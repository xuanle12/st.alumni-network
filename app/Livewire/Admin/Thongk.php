<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Profile;
use App\Models\Event;
use App\Models\Job;
class Thongk extends Component
{
    
    public string $year  = '';
    public string $khoa  = '';
 
    public function mount(): void
    {
        $this->year = (string) now()->year;
    }
 
    // ── Stats lớn ──────────────────────────────────
    public function getTotalAlumniProperty(): int
    {
        return Profile::where('status', 'active')->count();
    }
 
    public function getTotalJobsProperty(): int
    {
        return Job::where('is_active', true)->count();
    }
 
    public function getTotalEventsProperty(): int
    {
        return Event::where('is_active', true)->count();
    }
 
    public function getJobRateProperty(): int
    {
        $total = Profile::where('status', 'active')->count();
        if ($total === 0) return 0;
        $hasJob = Profile::where('status', 'active')
            ->whereNotNull('tinh_thanh')->count();
        return (int) round($hasJob / $total * 100);
    }
 
    // ── Biểu đồ cột theo tháng ─────────────────────
    public function getMonthlyStatsProperty(): array
    {
        return collect(range(1, 12))->map(fn($m) =>
            Profile::whereYear('created_at', $this->year)
                ->whereMonth('created_at', $m)
                ->when($this->khoa, fn($q) => $q->where('khoa', $this->khoa))
                ->count()
        )->toArray();
    }
 
    // ── Donut trạng thái ───────────────────────────
    public function getStatusStatsProperty(): array
    {
        return [
            'active'   => Profile::where('status', 'active')->count(),
            'pending'  => Profile::where('status', 'pending')->count(),
            'inactive' => Profile::where('status', 'inactive')->count(),
        ];
    }
 
    // ── CSV theo khoa ──────────────────────────────
    public function getByKhoaProperty(): array
    {
        return Profile::selectRaw('khoa, count(*) as total')
            ->whereNotNull('khoa')
            ->where('status', 'active')
            ->groupBy('khoa')
            ->orderByDesc('total')
            ->get()
            ->map(fn($r) => ['khoa' => $r->khoa, 'total' => $r->total])
            ->toArray();
    }
 
    // ── Khu vực làm việc ───────────────────────────
    public function getByLocationProperty(): array
    {
        return Profile::selectRaw('tinh_thanh, count(*) as total')
            ->whereNotNull('tinh_thanh')
            ->where('status', 'active')
            ->groupBy('tinh_thanh')
            ->orderByDesc('total')
            ->take(6)
            ->get()
            ->map(fn($r) => ['label' => $r->tinh_thanh, 'total' => $r->total])
            ->toArray();
    }
 
    // ── Top doanh nghiệp ───────────────────────────
    public function getTopCompaniesProperty(): array
    {
        return Job::selectRaw('company, location, count(*) as total, max(field) as field')
            ->where('is_active', true)
            ->groupBy('company', 'location')
            ->orderByDesc('total')
            ->take(5)
            ->get()
            ->map(fn($r) => [
                'company'  => $r->company,
                'location' => $r->location ?? '—',
                'field'    => $r->field    ?? '—',
                'total'    => $r->total,
            ])
            ->toArray();
    }
 
    public function render()
    {
        return view('livewire.admin.thongk', [
            'khoaList' => Job::KHOA_LIST,
        ])->layout('components.layouts.admin');
    }
}
