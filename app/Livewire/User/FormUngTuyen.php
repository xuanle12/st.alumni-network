<?php

namespace App\Livewire\User;

use App\Mail\MailXacNhanUngTuyen;
use App\Mail\MailThongBaoUngVienMoi;
use App\Models\Job;
use App\Models\DonUngTuyen;
use App\Models\User;
use App\Models\Company;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormUngTuyen extends Component
{
    use WithFileUploads;
 
    public ?int $jobId = null;
    public ?Job $job = null;
    public bool $show = false;
 
    // Form fields
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $location = ''; // không hỏi user nữa, giữ rỗng để lưu DB (cột location NOT NULL)
    public string $cover_letter = '';
    public $cv_file = null;
    public bool $allow_ai = false;
 
    protected function rules(): array
    {
        return [
            'cv_file'      => 'required|file|mimes:doc,docx,pdf|max:5120',
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'required|regex:/^[0-9]{9,11}$/',
            'cover_letter' => 'nullable|string|max:3000',
        ];
    }
 
    protected $messages = [
        'name.required'     => 'Vui lòng nhập họ và tên.',
        'email.required'    => 'Vui lòng nhập email.',
        'email.email'       => 'Email không hợp lệ.',
        'phone.required'    => 'Vui lòng nhập số điện thoại.',
        'phone.regex'       => 'Số điện thoại không hợp lệ.',
        'cv_file.required'  => 'Vui lòng tải lên CV để ứng tuyển.',
        'cv_file.mimes'     => 'CV chỉ hỗ trợ định dạng .doc, .docx, .pdf.',
        'cv_file.max'       => 'CV không được vượt quá 5MB.',
    ];
 
    #[On('open-apply-modal')]
    public function openModal(int $jobId): void
    {
        $this->jobId = $jobId;
        $this->job   = Job::findOrFail($jobId);
 
        // Pre-fill nếu đã đăng nhập
        if (Auth::check()) {
            $user        = Auth::user();
            $this->name  = $user->name ?? '';
            $this->email = $user->email ?? '';
            $this->phone = $user->profile?->phone ?? '';
        }
 
        $this->show = true;
    }
 
    public function closeModal(): void
    {
        $this->reset(['show', 'jobId', 'job', 'name', 'email', 'phone',
                       'location', 'cover_letter', 'cv_file', 'allow_ai']);
        $this->resetErrorBag();
    }
 
    public function submit(): void
    {
        $this->validate();
 
        // Kiểm tra đã ứng tuyển chưa
        if (Auth::check()) {
            $alreadyApplied = DonUngTuyen::where('job_id', $this->jobId)
                ->where('user_id', Auth::id())
                ->exists();
 
            if ($alreadyApplied) {
                $this->addError('general', 'Bạn đã ứng tuyển vị trí này rồi.');
                return;
            }
        }
 
        // Upload CV
        $cvPath = null;
        if ($this->cv_file) {
            $cvPath = $this->cv_file->store('cvs', 'public');
        }
 
        $application = DonUngTuyen::create([
            'job_id'       => $this->jobId,
            'user_id'      => Auth::id(),
            'name'         => $this->name,
            'email'        => $this->email,
            'phone'        => $this->phone,
            'location'     => $this->location,
            'cover_letter' => $this->cover_letter,
            'cv_path'      => $cvPath,
            'allow_ai'     => $this->allow_ai,
            'status'       => 'pending',
        ]);
 
        // Gửi email xác nhận cho ứng viên
        Mail::to($this->email)
            ->queue(new MailXacNhanUngTuyen($application, $this->job));

        // Gửi email thông báo cho NTD (nếu company có email)
        if ($this->job->contact_email) {
            Mail::to($this->job->contact_email)
                ->queue(new MailThongBaoUngVienMoi($application, $this->job));
        }

        // ── Thông báo trong hệ thống (chuông) ──

        // 1) Ứng viên: xác nhận gửi CV thành công (nếu đã đăng nhập)
        if (Auth::check()) {
            Notification::create([
                'user_id'  => Auth::id(),
                'actor_id' => null,
                'type'     => 'apply',
                'title'    => 'Gửi CV ứng tuyển thành công',
                'message'  => 'Bạn đã ứng tuyển vị trí "' . $this->job->title . '". Vui lòng theo dõi email để nhận phản hồi từ nhà tuyển dụng.',
                'link'     => route('job.show', $this->jobId),
            ]);
        }

        // 2) Tài khoản doanh nghiệp của tin: có CV mới, nhắc kiểm tra email công ty
        $companyUser  = $this->resolveCompanyUser($this->job);
        if ($companyUser) {
            $companyEmail = $this->job->contact_email ?: $companyUser->email;
            Notification::send(
                $companyUser->id,
                'apply',
                'Có ứng viên nộp CV mới',
                $this->name . ' vừa ứng tuyển vị trí "' . $this->job->title . '". Vui lòng kiểm tra hộp thư'
                    . ($companyEmail ? ' (' . $companyEmail . ')' : ' của công ty') . ' để xem CV.',
                route('job.show', $this->jobId),
                Auth::id()
            );
        }

        $this->closeModal();
        $this->dispatch('application-submitted');
        session()->flash('success', 'Nộp hồ sơ thành công! Vui lòng kiểm tra email để xác nhận.');
    }

    /** Dò tài khoản doanh nghiệp (role=company) gắn với tin tuyển dụng. */
    private function resolveCompanyUser(Job $job): ?User
    {
        // 1) Người tạo tin chính là tài khoản doanh nghiệp
        if ($job->created_by) {
            $creator = User::find($job->created_by);
            if ($creator && $creator->role === 'company') {
                return $creator;
            }
        }

        // 2) Truy ra bản ghi Company (theo company_id hoặc theo tên)
        $company = null;
        if (!empty($job->company_id)) {
            $company = Company::find($job->company_id);
        }
        if (!$company && $job->company) {
            $company = Company::where('name', $job->company)->first();
        }

        // 2a) Company do một tài khoản doanh nghiệp tạo
        if ($company && $company->created_by) {
            $owner = User::find($company->created_by);
            if ($owner && $owner->role === 'company') {
                return $owner;
            }
        }

        // 3) Khớp email công ty với tài khoản role=company
        $emails = array_filter([
            $company->contact_email ?? null,
            $job->contact_email ?: null,
        ]);
        if (!empty($emails)) {
            return User::where('role', 'company')->whereIn('email', $emails)->first();
        }

        return null;
    }
    public function render()
    {
        return view('livewire.user.form-ung-tuyen');
    }
}