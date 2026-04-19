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
    public string $khoa = '';

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
    public string $salary = '';
    public string $logo_emoji = '🏢';
    public string $description = '';
    public string $contact_email = '';
    public string $f_khoa = '';

    /* reset page khi search */
    public function updatedSearch() { $this->resetPage(); }
    public function updatedType() { $this->resetPage(); }
    public function updatedKhoa() { $this->resetPage(); }

    /* mở form tạo */
    public function openCreate()
    {
        $this->resetForm();
        $this->showForm = true;
    }

    /* mở form edit */
    public function openEdit($id)
    {
        $job = JobModel::findOrFail($id);

        $this->editId = $id;
        $this->title = $job->title;
        $this->company = $job->company;
        $this->location = $job->location ?? '';
        $this->f_type = $job->type;
        $this->field = $job->field ?? '';
        $this->salary = $job->salary ?? '';
        $this->logo_emoji = $job->logo_emoji ?? '🏢';
        $this->description = $job->description ?? '';
        $this->contact_email = $job->contact_email ?? '';
        $this->f_khoa = $job->khoa ?? '';

        $this->showForm = true;
        $this->showDetail = false;
    }

    /* xem chi tiết */
    public function openDetail($id)
    {
        $this->detailId = $id;
        $this->showDetail = true;
    }

    /* lưu */
    public function save()
    {
        $this->validate([
            'title' => 'required|max:200',
            'company' => 'required|max:100',
            'contact_email' => 'nullable|email'
        ]);

        $data = [

            'title' => $this->title,
            'company' => $this->company,
            'location' => $this->location ?: null,
            'type' => $this->f_type,
            'field' => $this->field ?: null,
            'salary' => $this->salary ?: null,
            'logo_emoji' => $this->logo_emoji ?: '🏢',
            'description' => $this->description ?: null,
            'contact_email' => $this->contact_email ?: null,
            'khoa' => $this->f_khoa ?: null,

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

    /* bật tắt active */
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
            'salary',
            'description',
            'contact_email',
            'f_khoa',
            'editId'
        ]);

        $this->f_type = 'full-time';
        $this->logo_emoji = '🏢';
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

        if ($this->khoa) {

            $query->where('khoa',$this->khoa);

        }

        return view('livewire.admin.job',[

            'jobs' => $query
                ->latest()
                ->paginate(15),

            'detail' => $this->detailId
                ? JobModel::find($this->detailId)
                : null,

            'khoaList' => JobModel::KHOA_LIST ?? []

        ])->layout('components.layouts.admin');

    }
}