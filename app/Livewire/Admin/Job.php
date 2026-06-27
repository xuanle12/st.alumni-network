<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use App\Models\Job as JobModel;
use App\Models\Company;

class Job extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';
    public string $type = '';
    public string $statusFilter = '';
    public int    $perPage = 10;

    public bool $showForm = false;
    public bool $showDetail = false;

    public ?int $detailId = null;
    public int $editId = 0;

    /* form fields */
    public string $title = '';
    public string $company = '';
    public string $location = '';
    public string $f_type = 'full-time';
    public string $field = '';
    public string $min_salary = '';
    public string $max_salary = '';
    public string $experience_required = '';
    public string $deadline = '';
    public string $description = '';
    public string $contact_email = '';

    /* reset page khi search/filter */
    public function updatedSearch() { $this->resetPage(); }
    public function updatedType() { $this->resetPage(); }
    public function updatedStatusFilter() { $this->resetPage(); }
    public function updatingPerPage(): void  { $this->resetPage(); }

    public function openCreate()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    public function openEdit($id)
    {
        $job = JobModel::findOrFail($id);

        $this->editId = $id;
        $this->title = $job->title;
        $this->company = $job->company;
        $this->location = $job->location ?? '';
        $this->f_type = $job->type;
        $this->field = $job->field ?? '';
        $this->min_salary = $job->min_salary !== null ? (string) $job->min_salary : '';
        $this->max_salary = $job->max_salary !== null ? (string) $job->max_salary : '';
        $this->experience_required = $job->experience_required !== null ? (string) $job->experience_required : '';
        $this->deadline = $job->deadline ? \Carbon\Carbon::parse($job->deadline)->format('Y-m-d') : '';
        $this->description = $job->description ?? '';
        $this->contact_email = $job->contact_email ?? '';

        $this->showForm = true;
        $this->showDetail = false;
    }

    public function approve($id)
    {
        JobModel::where('id', $id)->update([
            'status'    => 'approved',
            'is_active' => true,
        ]);

        $this->showDetail = false;
        $this->dispatch('toast', type: 'success', message: 'Đã duyệt tin tuyển dụng.');
    }

    public function reject($id)
    {
        JobModel::where('id', $id)->update([
            'status'    => 'rejected',
            'is_active' => false,
        ]);

        $this->showDetail = false;
        $this->dispatch('toast', type: 'success', message: 'Đã từ chối tin tuyển dụng.');
    }

    public function openDetail($id)
    {
        $this->detailId = $id;
        $this->showDetail = true;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|max:200',
            'company' => 'required|max:100',
            
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:0',
            'experience_required' => 'nullable|integer|min:0',
            'deadline' => 'nullable|date',
        ]);

        $data = [
            'title'               => $this->title,
            'company'             => $this->company,
            'location'            => $this->location ?: null,
            'type'                => $this->f_type,
            'field'               => $this->field ?: null,
            'min_salary'          => $this->min_salary !== '' ? $this->min_salary : null,
            'max_salary'          => $this->max_salary !== '' ? $this->max_salary : null,
            'experience_required' => $this->experience_required !== '' ? $this->experience_required : null,
            'deadline'            => $this->deadline ?: null,
            'description'         => $this->description ?: null,
            'contact_email'       => $this->contact_email ?: null,
        ];

        if ($this->editId) {
            JobModel::where('id', $this->editId)->update($data);
            $this->dispatch('toast', type: 'success', message: 'Đã cập nhật tin tuyển dụng.');
        } else {
            // Admin tạo trực tiếp → approved ngay
            $data['status']     = 'approved';
            $data['is_active']  = true;
            $data['created_by'] = auth()->id();
            JobModel::create($data);
            $this->dispatch('toast', type: 'success', message: 'Đã thêm tin tuyển dụng.');
        }

        $this->resetForm();

        $this->showForm = false;
    }

    public function toggleActive($id)
    {
        $job = JobModel::findOrFail($id);

        $job->update([
            'is_active' => !$job->is_active
        ]);
    }

    /* xoá */
    public function delete($id)
    {
        JobModel::destroy($id);

        $this->showDetail = false;

        $this->dispatch('toast', type: 'success', message: 'Đã xoá job');
    }

    private function resetForm()
    {
        $this->reset([
            'title', 'company', 'location', 'field',
            'min_salary', 'max_salary', 'experience_required',
            'deadline', 'description', 'contact_email', 'editId',
        ]);

        $this->f_type = 'full-time';
    }

    // Gợi ý công ty đang hợp tác: ô trống -> hiện hết danh sách, có gõ -> lọc theo từ khóa
    #[Computed]
    public function companySuggestions()
    {
        $term = trim($this->company);

        $query = Company::where('status', 'active')->orderBy('name');

        if ($term !== '') {
            $query->where('name', 'like', "%{$term}%");
        }

        return $query->limit($term === '' ? 20 : 8)->get();
    }

    // Chọn công ty từ danh sách gợi ý
    public function selectCompany(int $id)
    {
        $company = Company::find($id);

        if ($company) {
            $this->company = $company->name;
        }
    }

    public function render()
    {
        $query = JobModel::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('company', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->type) {
            $query->where('type', $this->type);
        }

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        $pendingCount = JobModel::pending()->count();

        return view('livewire.admin.job', [
            'jobs'         => $query->latest()->paginate($this->perPage),
            'detail'       => $this->detailId ? JobModel::find($this->detailId) : null,
            'pendingCount' => $pendingCount,
        ])->layout('components.layouts.admin');
    }
}