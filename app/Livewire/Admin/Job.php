<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Job as JobModel;

class Job extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';
    public string $type = '';

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

    /* reset page khi search */
    public function updatedSearch() { $this->resetPage(); }
    public function updatedType() { $this->resetPage(); }

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
            'contact_email' => 'nullable|email',
            'min_salary' => 'nullable|numeric|min:0',
            'max_salary' => 'nullable|numeric|min:0',
            'experience_required' => 'nullable|integer|min:0',
            'deadline' => 'nullable|date',
        ]);

        $data = [

            'title' => $this->title,
            'company' => $this->company,
            'location' => $this->location ?: null,
            'type' => $this->f_type,
            'field' => $this->field ?: null,
            'min_salary' => $this->min_salary !== '' ? $this->min_salary : null,
            'max_salary' => $this->max_salary !== '' ? $this->max_salary : null,
            'experience_required' => $this->experience_required !== '' ? $this->experience_required : null,
            'deadline' => $this->deadline ?: null,
            'description' => $this->description ?: null,
            'contact_email' => $this->contact_email ?: null,

        ];

        if ($this->editId) {

            JobModel::where('id',$this->editId)->update($data);

            session()->flash('success','Đã cập nhật job');

        } else {

            JobModel::create($data);

            session()->flash('success','Đã tạo job');
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

        session()->flash('success','Đã xoá job');
    }

    /* reset form */
    private function resetForm()
    {
        $this->reset([
            'title',
            'company',
            'location',
            'field',
            'min_salary',
            'max_salary',
            'experience_required',
            'deadline',
            'description',
            'contact_email',
            'editId'
        ]);

        $this->f_type = 'full-time';
    }

    public function render()
    {

        $query = JobModel::query();

        if ($this->search) {

            $query->where(function($q){

                $q->where('title','like','%'.$this->search.'%')
                  ->orWhere('company','like','%'.$this->search.'%');

            });

        }

        if ($this->type) {

            $query->where('type',$this->type);

        }

        return view('livewire.admin.job',[

            'jobs' => $query
                ->latest()
                ->paginate(15),

            'detail' => $this->detailId
                ? JobModel::find($this->detailId)
                : null,

        ])->layout('components.layouts.admin');

    }
}