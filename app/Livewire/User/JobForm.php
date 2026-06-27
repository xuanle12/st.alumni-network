<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Job;
use App\Models\Company;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Mail;

class JobForm extends Component
{
    // Bước hiện tại: 'form' | 'verify' | 'success'
    public string $step = 'form';

    // Form fields
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

    // Kỹ năng yêu cầu
    public array $selectedSkills = [];
    public string $skillInput = '';

    // OTP
    public string $otp_input = '';
    public bool   $otp_sent  = false;
    public string $otp_error = '';
    public int    $resend_countdown = 0;

    public function sendOtp()
    {
        $this->otp_error = '';

        $this->validate([
            'title'               => 'required|max:200',
            'company'             => 'required|max:150',
            'contact_email'       => 'required|email',
            'location'            => 'nullable|max:100',
            'field'               => 'nullable|max:100',
            'min_salary'          => 'nullable|numeric|min:0',
            'max_salary'          => 'nullable|numeric|min:0',
            'experience_required' => 'nullable|integer|min:0',
            'deadline'            => 'nullable|date|after:today',
            'description'         => 'nullable|max:5000',
        ], [
            'title.required'         => 'Vui lòng nhập tiêu đề tin tuyển dụng.',
            'company.required'       => 'Vui lòng nhập tên công ty.',
            'contact_email.required' => 'Vui lòng nhập email liên hệ.',
            'contact_email.email'    => 'Email không hợp lệ.',
            'deadline.after'         => 'Hạn nộp phải sau ngày hôm nay.',
        ]);

        $otp = (string) random_int(100000, 999999);

        // Lưu OTP vào session kèm thời gian hết hạn
        session([
            'job_otp'     => $otp,
            'job_otp_exp' => now()->addMinutes(10)->timestamp,
            'job_otp_email' => $this->contact_email,
        ]);

        Mail::to($this->contact_email)->send(new OtpMail(
            otp: $otp,
            itemTitle: $this->title,
            itemName: $this->company,
            type: 'job',
        ));

        $this->otp_sent        = true;
        $this->step            = 'verify';
        $this->resend_countdown = 60;
    }

    public function resendOtp()
    {
        $this->otp_input = '';
        $this->otp_error = '';
        $this->step      = 'form';
        $this->sendOtp();
    }

    public function verifyOtp()
    {
        $this->otp_error = '';

        $stored    = session('job_otp');
        $expiresAt = session('job_otp_exp');

        if (!$stored || !$expiresAt) {
            $this->otp_error = 'Phiên OTP không hợp lệ. Vui lòng gửi lại.';
            return;
        }

        if (now()->timestamp > $expiresAt) {
            $this->otp_error = 'Mã OTP đã hết hạn. Vui lòng gửi lại.';
            session()->forget(['job_otp', 'job_otp_exp', 'job_otp_email']);
            return;
        }

        if (trim($this->otp_input) !== $stored) {
            $this->otp_error = 'Mã OTP không đúng. Vui lòng kiểm tra lại.';
            return;
        }

        // OTP hợp lệ → tạo job
        $job = Job::create([
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
            'contact_email'       => $this->contact_email,
            'status'              => 'pending',
            'is_active'           => false,
            'created_by'          => auth()->id(),
        ]);

        // Gắn kỹ năng yêu cầu vào tin tuyển dụng
        if (!empty($this->selectedSkills)) {
            $skillIds = collect($this->selectedSkills)
                ->filter()
                ->map(function ($name) {
                    $skill = \App\Models\Skill::firstOrCreate(['name' => trim($name)]);
                    return $skill->id;
                })
                ->unique()
                ->values()
                ->toArray();

            $job->skills()->sync($skillIds);
        }

        session()->forget(['job_otp', 'job_otp_exp', 'job_otp_email']);

        $this->step = 'success';
    }

    public function backToForm()
    {
        $this->step      = 'form';
        $this->otp_input = '';
        $this->otp_error = '';
    }

    // Thêm kỹ năng yêu cầu (từ gợi ý hoặc nhập tự do)
    public function addSkill(?string $name = null)
    {
        $name = trim($name ?? $this->skillInput);

        if ($name === '') {
            return;
        }

        // tránh trùng (không phân biệt hoa thường)
        $exists = collect($this->selectedSkills)
            ->contains(fn ($s) => mb_strtolower($s) === mb_strtolower($name));

        if (!$exists) {
            $this->selectedSkills[] = $name;
        }

        $this->skillInput = '';
    }

    public function removeSkill(string $name)
    {
        $this->selectedSkills = array_values(array_filter(
            $this->selectedSkills,
            fn ($s) => $s !== $name
        ));
    }

    // Gợi ý kỹ năng theo input, lấy từ danh mục Skill đã có sẵn
    #[Computed]
    public function skillSuggestions()
    {
        $term = trim($this->skillInput);

        if ($term === '') {
            return collect();
        }

        return \App\Models\Skill::where('name', 'like', "%{$term}%")
            ->whereNotIn('name', $this->selectedSkills ?: [''])
            ->orderBy('name')
            ->limit(8)
            ->get();
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
        return view('livewire.user.job-form')
            ->layout('components.layouts.app');
    }
}