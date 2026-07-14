<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Job;

class CompanyProfile extends Component
{
    use WithFileUploads;

    public ?Company $company = null;

    public bool $edit = false;

    // Form
    public string $name             = '';
    public string $field            = '';
    public string $website          = '';
    public string $size             = '';
    public string $address          = '';
    public string $description      = '';
    public string $contact_name     = '';
    public string $contact_position = '';
    public string $contact_email    = '';
    public string $contact_phone    = '';
    public $logoFile = null;

    public function mount()
    {
        // Chỉ dành cho tài khoản doanh nghiệp
        if ((Auth::user()->role ?? null) !== 'company') {
            $this->redirect(route('profile'), navigate: true);
            return;
        }

        $this->company = $this->resolveCompany();
        $this->loadForm();
    }

    /** Tìm hoặc tạo hồ sơ công ty gắn với tài khoản này (1 tài khoản = 1 công ty). */
    private function resolveCompany(): Company
    {
        $user = Auth::user();

        $company = Company::where('created_by', $user->id)->first();

        // Fallback: khớp email công ty đã có sẵn nhưng chưa gắn chủ
        if (!$company) {
            $company = Company::whereNull('created_by')
                ->where('contact_email', $user->email)
                ->first();
            if ($company) {
                $company->update(['created_by' => $user->id]);
            }
        }

        // Chưa có → tạo mới từ thông tin tài khoản
        if (!$company) {
            $company = Company::create([
                'name'          => $user->name ?: 'Công ty của tôi',
                'contact_email' => $user->email,
                'contact_name'  => $user->name,
                'status'        => 'pending',
                'created_by'    => $user->id,
            ]);
        }

        return $company;
    }

    private function loadForm(): void
    {
        $c = $this->company;
        $this->name             = $c->name ?? '';
        $this->field            = $c->field ?? '';
        $this->website          = $c->website ?? '';
        $this->size             = $c->size ?? '';
        $this->address          = $c->address ?? '';
        $this->description      = $c->description ?? '';
        $this->contact_name     = $c->contact_name ?? '';
        $this->contact_position = $c->contact_position ?? '';
        $this->contact_email    = $c->contact_email ?? '';
        $this->contact_phone    = $c->contact_phone ?? '';
    }

    public function updatedLogoFile()
    {
        $this->validate(['logoFile' => 'image|mimes:jpg,jpeg,png,webp|max:2048']);
        $path = $this->logoFile->store('companies', 'public');
        $this->company->update(['logo' => $path]);
        $this->logoFile = null;
        $this->syncToJobs();
        $this->dispatch('toast', type: 'success', message: 'Đã cập nhật logo công ty.');
    }

    public function save()
    {
        $this->validate([
            'name'          => 'required|string|max:150',
            'field'         => 'nullable|string|max:150',
            'website'       => 'nullable|url|max:255',
            'size'          => 'nullable|string|max:100',
            'address'       => 'nullable|string|max:255',
            'description'   => 'nullable|string|max:3000',
            'contact_name'  => 'nullable|string|max:150',
            'contact_position' => 'nullable|string|max:150',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:30',
        ], [
            'name.required' => 'Vui lòng nhập tên công ty.',
            'website.url'   => 'Website không hợp lệ (phải bắt đầu bằng http:// hoặc https://).',
            'contact_email.email' => 'Email liên hệ không hợp lệ.',
        ]);

        $this->company->update([
            'name'             => $this->name,
            'field'            => $this->field ?: null,
            'website'          => $this->website ?: null,
            'size'             => $this->size ?: null,
            'address'          => $this->address ?: null,
            'description'      => $this->description ?: null,
            'contact_name'     => $this->contact_name ?: null,
            'contact_position' => $this->contact_position ?: null,
            'contact_email'    => $this->contact_email ?: null,
            'contact_phone'    => $this->contact_phone ?: null,
        ]);

        $this->syncToJobs();

        $this->edit = false;
        $this->dispatch('toast', type: 'success', message: 'Đã lưu hồ sơ công ty. Thông tin ở các tin tuyển dụng đã được cập nhật.');
    }

    /** Đồng bộ thông tin công ty sang các tin tuyển dụng do tài khoản này đăng. */
    private function syncToJobs(): void
    {
        $c = $this->company->fresh();

        $upd = [
            'company'    => $c->name,
            'company_id' => $c->id,
        ];
        if ($c->contact_email) {
            $upd['contact_email'] = $c->contact_email;
        }

        Job::where('created_by', Auth::id())->update($upd);
    }

    public function cancel()
    {
        $this->loadForm();
        $this->edit = false;
    }

    public function render()
    {
        $jobCount = Job::where('created_by', Auth::id())->count();

        return view('livewire.user.company-profile', [
            'jobCount' => $jobCount,
        ])->layout('components.layouts.app');
    }
}
