<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public string $ho = '';
    public string $ten = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public string $student_code    = '';   
    public string $full_name       = '';   
    public string $class_name      = '';   
    public string $graduation_year = '';   
    public string $major           = '';   

    public ?array $matchedRow = null;
    public bool   $isAlumni   = false;

    protected $rules = [
        'ho'       => 'required|string|max:60',
        'ten'      => 'required|string|max:60',
        'email'    => 'required|email|max:120|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ];

    protected $messages = [
        'ho.required'        => 'Vui lòng nhập họ.',
        'ten.required'       => 'Vui lòng nhập tên.',
        'email.required'     => 'Vui lòng nhập email.',
        'email.email'        => 'Email không hợp lệ.',
        'email.unique'       => 'Email đã được sử dụng.',
        'password.required'  => 'Vui lòng nhập mật khẩu.',
        'password.min'       => 'Mật khẩu cần ít nhất 6 ký tự.',
        'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
    ];

   
    private function checkAlumniStatus(): void
    {
        $this->matchedRow = null;
        $this->isAlumni   = false;

        $hasMsv  = trim($this->student_code) !== '';
        $hasName = trim($this->full_name)     !== '';

        if (!$hasMsv && !$hasName) {
            return;
        }        $query = DB::table('ds_csv');

        if ($hasMsv) {
            $query->where('msv', trim($this->student_code));
        } else {
            $query->whereRaw('LOWER(ho_ten) = ?', [mb_strtolower(trim($this->full_name))]);
        }

        $row = $query->first();
        if (!$row) {
            return;
        }

        $matched = 0;

        if ($hasMsv && strtolower(trim($this->student_code)) === strtolower($row->msv)) {
            $matched++;
        }

        if ($hasName && mb_strtolower(trim($this->full_name)) === mb_strtolower($row->ho_ten)) {
            $matched++;
        }

        if (trim($this->class_name) !== '' && $row->lop !== null &&
            mb_strtolower(trim($this->class_name)) === mb_strtolower($row->lop)) {
            $matched++;
        }

        if (trim($this->graduation_year) !== '' && $row->nam_tot_nghiep !== null &&
            (string) $this->graduation_year === (string) $row->nam_tot_nghiep) {
            $matched++;
        }

        if (trim($this->major) !== '' && $row->nganh !== null &&
            mb_strtolower(trim($this->major)) === mb_strtolower($row->nganh)) {
            $matched++;
        }

        if ($matched >= 1) {
            $this->matchedRow = (array) $row;
        }

        if ($matched >= 2) {
            $this->isAlumni = true;
        }
    }

    public function register()
    {
        $this->validate();

        $this->checkAlumniStatus();

        $name   = trim($this->ho . ' ' . $this->ten);
        $role   = $this->isAlumni ? 'alumni'  : 'student';
        $status = $this->isAlumni ? 'active'  : 'pending';

        // Tạo user
        $user = User::create([
            'name'     => $name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
            'role'     => $role,
            'status'   => $status,
        ]);

        Profile::create([
            'user_id'        => $user->id,
            'msv'            => $this->matchedRow['msv']            ?? ($this->student_code ?: 'N/A'),
            'khoa'           => $this->matchedRow['khoa']           ?? 'Chưa xác định',
            'lop'            => $this->matchedRow['lop']            ?? ($this->class_name   ?: null),
            'nganh'          => $this->matchedRow['nganh']          ?? ($this->major        ?: null),
            'nam_tot_nghiep' => $this->matchedRow['nam_tot_nghiep'] ?? ($this->graduation_year ?: null),
        ]);

        $msg = $this->isAlumni
            ? 'Đăng ký thành công! Tài khoản cựu sinh viên đã được kích hoạt, hãy đăng nhập.'
            : 'Đăng ký thành công! Tài khoản đang chờ admin duyệt.';

        session()->flash('register_success', $msg);

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}