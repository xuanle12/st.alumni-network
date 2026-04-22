<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function updatingSearch() { $this->resetPage(); }
    public function updatingTypes() { $this->resetPage(); }
    public function updatingFields() { $this->resetPage(); }
    public function updatingLocations() { $this->resetPage(); }

    public function resetFilters()
    {
        $this->reset(['search','field','sort','types','fields','locations']);
        $this->resetPage();
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


    $query = Job::query();

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

    // lọc location
    if ($this->locations) {
        $query->whereIn('location', $this->locations);
    }

    // sắp xếp
    if ($this->sort == 'salary') {
        $query->orderByDesc('salary');
    } else {
        $query->latest();
    }
    

    $jobs = $query->paginate(10);

    return view('livewire.user.jobs', [
        'jobs' => $jobs,
        'jobTypes' => [
        'full-time' => 'Toàn thời gian',
        'part-time' => 'Bán thời gian',
        'internship' => 'Thực tập',
        'remote' => 'Remote',],
        'departments' => $departments,
        'locationOptions' => $locationOptions,
    ]);
}
}