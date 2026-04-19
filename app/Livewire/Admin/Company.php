<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Company as CompanyModel;
use App\Models\Job as JobModel;

class Company extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public string $search = '';
    public string $filterStatus = '';
    public string $filterField = '';

    public bool $showModal = false;
    public bool $showView = false;
    public bool $showDelete = false;

    public ?int $editId = null;
    public ?int $viewId = null;
    public ?int $deleteId = null;

    /* form */
    public string $f_name = '';
    public string $f_field = '';
    public string $f_web = '';
    public string $f_size = '';
    public string $f_addr = '';
    public string $f_desc = '';
    public string $f_cname = '';
    public string $f_cpos = '';
    public string $f_email = '';
    public string $f_phone = '';
    public string $f_status = 'pending';
    public string $f_note = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterStatus()
    {
        $this->resetPage();
    }

    public function updatedFilterField()
    {
        $this->resetPage();
    }

    /* mở form */
    public function openAdd()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function openEdit($id)
    {
        $c = CompanyModel::findOrFail($id);

        $this->editId = $id;

        $this->f_name = $c->name;
        $this->f_field = $c->field ?? '';
        $this->f_web = $c->website ?? '';
        $this->f_size = $c->size ?? '';
        $this->f_addr = $c->address ?? '';
        $this->f_desc = $c->description ?? '';
        $this->f_cname = $c->contact_name ?? '';
        $this->f_cpos = $c->contact_position ?? '';
        $this->f_email = $c->contact_email ?? '';
        $this->f_phone = $c->contact_phone ?? '';
        $this->f_status = $c->status;
        $this->f_note = $c->admin_note ?? '';

        $this->showModal = true;
    }

    /* lưu */
    public function save()
    {
        $this->validate([

            'f_name' => 'required|max:150',
            'f_email' => 'nullable|email',
            'f_web' => 'nullable|url',
            'f_status' => 'required|in:active,pending,inactive'

        ]);

        $data = [

            'name' => $this->f_name,
            'field' => $this->f_field ?: null,
            'website' => $this->f_web ?: null,
            'size' => $this->f_size ?: null,
            'address' => $this->f_addr ?: null,
            'description' => $this->f_desc ?: null,
            'contact_name' => $this->f_cname ?: null,
            'contact_position' => $this->f_cpos ?: null,
            'contact_email' => $this->f_email ?: null,
            'contact_phone' => $this->f_phone ?: null,
            'status' => $this->f_status,
            'admin_note' => $this->f_note ?: null

        ];

        if ($this->editId) {

            CompanyModel::where('id',$this->editId)->update($data);

            session()->flash('success','Đã cập nhật company');

        } else {

            CompanyModel::create($data);

            session()->flash('success','Đã thêm company');
        }

        $this->closeModal();
    }

    public function closeModal()
    {
        $this->resetForm();
        $this->showModal = false;
        $this->editId = null;
    }

    /* xem chi tiết */
    public function openView($id)
    {
        $this->viewId = $id;
        $this->showView = true;
    }

    public function closeView()
    {
        $this->showView = false;
        $this->viewId = null;
    }

    /* duyệt nhanh */
    public function quickApprove($id)
    {
        CompanyModel::where('id',$id)
            ->update([
                'status' => 'active'
            ]);
    }

    /* xoá */
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDelete = true;
    }

    public function destroy()
    {
        if ($this->deleteId) {

            CompanyModel::destroy($this->deleteId);

            session()->flash('success','Đã xoá company');

        }

        $this->showDelete = false;
    }

    private function resetForm()
    {
        $this->reset([

            'f_name',
            'f_field',
            'f_web',
            'f_size',
            'f_addr',
            'f_desc',
            'f_cname',
            'f_cpos',
            'f_email',
            'f_phone',
            'f_note'

        ]);

        $this->f_status = 'pending';
    }

    public function render()
    {

        $query = CompanyModel::query();

        if ($this->search) {

            $query->where(function($q){

                $q->where('name','like','%'.$this->search.'%')
                  ->orWhere('contact_email','like','%'.$this->search.'%')
                  ->orWhere('field','like','%'.$this->search.'%');

            });

        }

        if ($this->filterStatus) {

            $query->where('status',$this->filterStatus);

        }

        if ($this->filterField) {

            $query->where('field','like','%'.$this->filterField.'%');

        }

        $companies = $query
            ->withCount('job')
            ->latest()
            ->paginate(15);

        $stats = [

            'total' => CompanyModel::count(),

            'active' => CompanyModel::where('status','active')->count(),

            'pending' => CompanyModel::where('status','pending')->count(),

            'jobs' => JobModel::where('is_active',true)->count()

        ];

        $viewCompany = $this->viewId
            ? CompanyModel::withCount('job')
                ->with('job')
                ->find($this->viewId)
            : null;

        $deleteName = $this->deleteId
            ? CompanyModel::find($this->deleteId)?->name
            : '';

        return view('livewire.admin.company',[

            'companies' => $companies,

            'stats' => $stats,

            'viewCompany' => $viewCompany,

            'deleteName' => $deleteName

        ])->layout('components.layouts.admin');

    }
}