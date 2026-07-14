<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\JobMatchingService;

class Jobs extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $field = '';

    #[Url]
    public string $sort = 'latest';

    #[Url]
    public array $types = [];

    #[Url]
    public array $fields = [];

    #[Url]
    public array $locations = [];

    #[Url]
    public string $locationSearch = '';

    #[Url]
    public int $salaryMin = 0;

    #[Url]
    public array $expLevels = [];

    public $suggestedJobs = [];
    public bool $hasSkills = false;

    public function updatingSearch() 
    { 
        $this->resetPage(); 
    }
    public function updatingTypes() 
    { 
        $this->resetPage(); 
    }
    public function updatingFields() 
    { 
        $this->resetPage(); 
    }
    public function updatingLocations()
    {
        $this->resetPage();
    }
    public function updatingLocationSearch() { $this->resetPage(); }
    public function updatingSalaryMin()      { $this->resetPage(); }
    public function updatingExpLevels()      { $this->resetPage(); }

    public function resetFilters()
    {
        $this->reset(['search','field','sort','types','fields','locations','locationSearch','salaryMin','expLevels']);
        $this->resetPage();
    }
    public function mount()
    {
    $profile = auth()->user()?->profile;
    if (!$profile) return;

    $this->hasSkills = $profile->skills()->count() > 0;

    if ($this->hasSkills) 
        {
            $service = new JobMatchingService();
            $this->suggestedJobs = $service->recommend($profile, 5)
                ->map(fn($j) => [
                    'id'          => $j->id,
                    'title'       => $j->title,
                    'company'     => $j->company,
                    'location'    => $j->location,
                    'match_score' => round($j->match_score),
                    'skills'      => $j->skills->pluck('name')->toArray(),
                ])->values()->toArray();
        }
    }

    public function render()
{
    $locationOptions = Job::selectRaw('location as location, location as location_key')
    ->whereNotNull('location')
    ->groupBy('location')
    ->get();


    $departments = Job::select('field')
    ->selectRaw('COUNT(*) as jobs_count')
    ->whereNotNull('field')
    ->groupBy('field')
    ->get()
    ->map(fn ($item) => (object)[
        'slug' => \Str::slug($item->field),
        'name' => $item->field,
        'jobs_count' => $item->jobs_count,
    ]);


    $query = Job::query()->active()->with('skills')->withCount('applications');
    $this->onlyIt($query);

    // tìm kiếm
    if ($this->search) {
        $query->where(function ($q) {
            $q->where('title', 'like', "%{$this->search}%")
              ->orWhere('company', 'like', "%{$this->search}%");
        });
    }

    // lọc ngành
    if ($this->field) {
        $query->where('field', $this->field);
    }

    // lọc loại job
    if ($this->types) {
        $query->whereIn('type', $this->types);
    }

    // lọc location (checkbox)
    if ($this->locations) {
        $query->whereIn('location', $this->locations);
    }

    // tìm theo địa điểm (ô nhập ở hero)
    if ($this->locationSearch) {
        $query->where('location', 'like', "%{$this->locationSearch}%");
    }

    // lọc mức lương tối thiểu (triệu)
    if ($this->salaryMin > 0) {
        $query->where(function ($q) {
            $q->where('max_salary', '>=', $this->salaryMin)
              ->orWhere('min_salary', '>=', $this->salaryMin);
        });
    }

    // lọc theo cấp kinh nghiệm
    if ($this->expLevels) {
        $query->where(function ($q) {
            foreach ($this->expLevels as $lvl) {
                $q->orWhere(function ($qq) use ($lvl) {
                    if ($lvl === 'entry') {
                        $qq->whereNull('experience_required')->orWhere('experience_required', '<=', 1);
                    } elseif ($lvl === 'intermediate') {
                        $qq->whereBetween('experience_required', [2, 4]);
                    } elseif ($lvl === 'expert') {
                        $qq->where('experience_required', '>=', 5);
                    }
                });
            }
        });
    }

    // sắp xếp
    if ($this->sort == 'salary') {
        $query->orderByDesc('max_salary');
    } else {
        $query->latest();
    }


    $jobs = $query->paginate(9);

    // Đếm số tin theo cấp kinh nghiệm (cho sidebar) — chỉ tính tin CNTT
    $expCounts = [
        'entry'        => $this->onlyIt(Job::active())->where(fn($q) => $q->whereNull('experience_required')->orWhere('experience_required', '<=', 1))->count(),
        'intermediate' => $this->onlyIt(Job::active())->whereBetween('experience_required', [2, 4])->count(),
        'expert'       => $this->onlyIt(Job::active())->where('experience_required', '>=', 5)->count(),
    ];

    // Format các trường để view dùng đúng (salary, experience, skills)
    $jobs->getCollection()->transform(function ($job) {
        $job->salary = $this->formatSalary($job->min_salary, $job->max_salary);
        $job->experience = $job->experience_required > 0
            ? $job->experience_required . '+ năm KN'
            : null;
        $job->skill_names = $job->skills->pluck('name');
        return $job;
    });

    return view('livewire.user.jobs', [
        'jobs' => $jobs,
        'jobTypes' => [
        'full-time' => 'Toàn thời gian',
        'part-time' => 'Bán thời gian',
        'internship' => 'Thực tập',
        'remote' => 'Remote',],
        'departments' => $departments,
        'locationOptions' => $locationOptions,
        'expCounts' => $expCounts,
    ]);
}

/**
 * Format min/max salary thành chuỗi hiển thị, ví dụ "12 - 18 triệu" hoặc "Thỏa thuận"
 */
protected function formatSalary($min, $max): ?string
{
    if (!$min && !$max) {
        return 'Thỏa thuận';
    }

    if ($min && $max) {
        return number_format($min) . ' - ' . number_format($max) . ' triệu';
    }

    return number_format($min ?: $max) . ' triệu';
}

/**
 * Chỉ giữ tin ngành CNTT — loại các ngành khác (nông nghiệp, tài chính, ngân hàng...).
 * Vì đây là mạng lưới cựu sinh viên khoa CNTT.
 */
private function onlyIt($query)
{
    $exclude = [
        'nông nghiệp', 'nông', 'agri', 'vineco', 'dabaco', 'thực phẩm', 'chăn nuôi',
        'tài chính', 'ngân hàng', 'bank', 'finance', 'chứng khoán', 'bảo hiểm', 'kế toán', 'kiểm toán', 'invest',
        'xây dựng', 'bất động sản', 'y tế', 'dược', 'giáo dục', 'du lịch',
        'nhà hàng', 'khách sạn', 'vận tải', 'logistics', 'cơ khí', 'môi trường', 'luật', 'bán lẻ',
    ];

    // Loại tin nếu NGÀNH hoặc TÊN CÔNG TY thuộc lĩnh vực ngoài CNTT
    return $query->where(function ($q) use ($exclude) {
        foreach ($exclude as $kw) {
            $q->whereRaw("LOWER(COALESCE(field, '')) NOT LIKE ?", ['%' . $kw . '%'])
              ->whereRaw("LOWER(COALESCE(company, '')) NOT LIKE ?", ['%' . $kw . '%']);
        }
    });
}
}