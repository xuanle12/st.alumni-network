<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Profile;
use App\Models\Setting;
use App\Services\AlumniSyncService;

class Csv extends Component
{
    use WithPagination;

    public string $search       = '';
    public string $filterKhoa   = '';
    public string $filterNam    = '';
    public string $filterStatus = '';
    public int    $perPage      = 10;

    public bool  $showModal = false;
    public ?int  $editId    = null;
    public string $f_msv    = '';
    public string $f_ho_ten = '';
    public string $f_lop    = '';
    public string $f_khoa   = '';
    public string $f_nganh  = '';
    public string $f_nam    = '';
    public string $f_cong_ty    = '';
    public string $f_dien_thoai = '';
    public string $f_dia_chi    = '';
    public string $f_muc_luong  = '';

    public bool $showView = false;
    public ?int $viewId   = null;

    public bool   $showDelete = false;
    public ?int   $deleteId   = null;
    public string $deleteName = '';

    // Cấu hình API (nhập trên giao diện, lưu vào bảng settings)
    public bool   $showSettings   = false;
    public string $api_url        = '';
    public string $api_token      = '';
    public string $api_data_key   = 'data';
    public bool   $api_verify_ssl = true;

    public function updatingSearch()      { $this->resetPage(); }
    public function updatingFilterKhoa()  { $this->resetPage(); }
    public function updatingFilterNam()   { $this->resetPage(); }
    public function updatingFilterStatus(){ $this->resetPage(); }
    public function updatingPerPage(): void { $this->resetPage(); }

    public function openAdd(): void
    {
        $this->reset(['editId', 'f_msv', 'f_ho_ten', 'f_lop', 'f_khoa', 'f_nganh', 'f_nam',
            'f_cong_ty', 'f_dien_thoai', 'f_dia_chi', 'f_muc_luong']);
        $this->showModal = true;
    }

    /** Mở form cấu hình API, nạp giá trị hiện tại (DB, fallback .env). */
    public function openSettings(): void
    {
        $this->api_url        = Setting::get('alumni.url', config('services.alumni.url') ?? '');
        $this->api_token      = Setting::get('alumni.token', config('services.alumni.token') ?? '');
        $this->api_data_key   = Setting::get('alumni.data_key', config('services.alumni.data_key') ?? 'data');
        $this->api_verify_ssl = filter_var(
            Setting::get('alumni.verify_ssl', config('services.alumni.verify_ssl') ?? true),
            FILTER_VALIDATE_BOOLEAN
        );
        $this->resetValidation();
        $this->showSettings = true;
    }

    public function closeSettings(): void
    {
        $this->showSettings = false;
    }

    /** Lưu cấu hình API vào DB (không cần sửa .env). */
    public function saveSettings(): void
    {
        $this->validate([
            'api_url'      => 'nullable|url|max:500',
            'api_token'    => 'nullable|string|max:1000',
            'api_data_key' => 'nullable|string|max:100',
        ], [
            'api_url.url' => 'URL API không hợp lệ (phải bắt đầu bằng http:// hoặc https://).',
        ]);

        Setting::set('alumni.url',        trim($this->api_url));
        Setting::set('alumni.token',      trim($this->api_token));
        Setting::set('alumni.data_key',   trim($this->api_data_key));
        Setting::set('alumni.verify_ssl', $this->api_verify_ssl ? '1' : '0');

        $this->showSettings = false;
        $this->dispatch('toast', type: 'success', message: 'Đã lưu cấu hình API.');
    }

    /** Đồng bộ danh sách cựu sinh viên từ API bên ngoài về bảng ds_csv. */
    public function syncFromApi(AlumniSyncService $service): void
    {
        try {
            $r = $service->sync();
        } catch (\Throwable $e) {
            $this->dispatch('toast', type: 'error', message: 'Đồng bộ thất bại: ' . $e->getMessage());
            return;
        }

        $this->resetPage();

        $this->dispatch('toast', type: 'success', message: sprintf(
            'Đã đồng bộ: thêm %d, cập nhật %d, bỏ qua %d (tổng %d).',
            $r['inserted'], $r['updated'], $r['skipped'], $r['fetched']
        ));
    }

    public function openEdit(int $id): void
    {
        $row = DB::table('ds_csv')->find($id);
        if (!$row) return;

        $this->editId   = $id;
        $this->f_msv    = $row->msv;
        $this->f_ho_ten = $row->ho_ten;
        $this->f_lop    = $row->lop    ?? '';
        $this->f_khoa   = $row->khoa   ?? '';
        $this->f_nganh  = $row->nganh  ?? '';
        $this->f_nam    = $row->nam_tot_nghiep ?? '';
        $this->f_cong_ty    = $row->cong_ty    ?? '';
        $this->f_dien_thoai = $row->dien_thoai ?? '';
        $this->f_dia_chi    = $row->dia_chi    ?? '';
        $this->f_muc_luong  = $row->muc_luong  ?? '';
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->editId    = null;
        $this->resetValidation();
    }

    public function save(): void
    {
        $rules = [
            'f_msv'    => 'required|string|max:20|unique:ds_csv,msv' . ($this->editId ? ',' . $this->editId : ''),
            'f_ho_ten' => 'required|string|max:255',
            'f_lop'    => 'nullable|string|max:30',
            'f_khoa'   => 'nullable|string|max:255',
            'f_nganh'  => 'nullable|string|max:255',
            'f_nam'    => 'nullable|integer|min:1990|max:' . date('Y'),
        ];

        $this->validate($rules, [
            'f_msv.required'    => 'Vui lòng nhập mã sinh viên.',
            'f_msv.unique'      => 'Mã sinh viên đã tồn tại.',
            'f_ho_ten.required' => 'Vui lòng nhập họ tên.',
        ]);

        $data = [
            'msv'            => $this->f_msv,
            'ho_ten'         => $this->f_ho_ten,
            'lop'            => $this->f_lop    ?: null,
            'khoa'           => $this->f_khoa   ?: null,
            'nganh'          => $this->f_nganh  ?: null,
            'nam_tot_nghiep' => $this->f_nam    ?: null,
            'cong_ty'        => $this->f_cong_ty    ?: null,
            'dien_thoai'     => $this->f_dien_thoai ?: null,
            'dia_chi'        => $this->f_dia_chi    ?: null,
            'muc_luong'      => $this->f_muc_luong  ?: null,
            'updated_at'     => now(),
        ];

        if ($this->editId) {
            DB::table('ds_csv')->where('id', $this->editId)->update($data);
            $this->dispatch('toast', type: 'success', message: 'Đã cập nhật thành công!');
        } else {
            DB::table('ds_csv')->insert(array_merge($data, ['created_at' => now()]));
            $this->dispatch('toast', type: 'success', message: 'Đã thêm thành công!');
        }

        $this->closeModal();
    }

    public function openView(int $userId): void
    {
        $this->viewId   = $userId;
        $this->showView = true;
    }

    public function closeView(): void
    {
        $this->showView = false;
        $this->viewId   = null;
    }

    public function quickApprove(int $userId): void
    {
        Profile::where('user_id', $userId)->update(['status' => 'active']);
        $this->dispatch('toast', type: 'success', message: 'Đã duyệt hồ sơ.');
    }

    public function confirmDelete(int $id): void
    {
        $row = DB::table('ds_csv')->find($id);
        if (!$row) return;

        $this->deleteId   = $id;
        $this->deleteName = $row->ho_ten;
        $this->showDelete = true;
    }

    public function closeDelete(): void
    {
        $this->showDelete = false;
        $this->deleteId   = null;
        $this->deleteName = '';
    }

    public function destroy(): void
    {
        DB::table('ds_csv')->where('id', $this->deleteId)->delete();
        $this->dispatch('toast', type: 'success', message: 'Đã xoá thành công!');
        $this->closeDelete();
    }

    public function render()
    {
        // Lấy danh sách msv đã có tài khoản
        $msvCoTaiKhoan = User::whereHas('profile', fn($q) => $q->whereNotNull('msv'))
            ->with('profile')
            ->get()
            ->keyBy(fn($u) => $u->profile?->msv);

        $rows = DB::table('ds_csv')
            ->when($this->search, fn($q) =>
                $q->where('msv', 'like', '%' . $this->search . '%')
                  ->orWhere('ho_ten', 'like', '%' . $this->search . '%')
                  ->orWhere('lop', 'like', '%' . $this->search . '%')
            )
            ->when($this->filterKhoa, fn($q) => $q->where('khoa', $this->filterKhoa))
            ->when($this->filterNam,  fn($q) => $q->where('nam_tot_nghiep', $this->filterNam))
            ->when($this->filterStatus === 'co_tk',   fn($q) => $q->whereIn('msv',    $msvCoTaiKhoan->keys()))
            ->when($this->filterStatus === 'chua_tk', fn($q) => $q->whereNotIn('msv', $msvCoTaiKhoan->keys()))
            ->orderByDesc('id')
            ->paginate($this->perPage);

        $namList = DB::table('ds_csv')
            ->select('nam_tot_nghiep')
            ->distinct()
            ->orderBy('nam_tot_nghiep', 'desc')
            ->pluck('nam_tot_nghiep');

        $stats = [
            'total'   => DB::table('ds_csv')->count(),
            'co_tk'   => $msvCoTaiKhoan->count(),
            'chua_tk' => DB::table('ds_csv')->count() - $msvCoTaiKhoan->count(),
            'pending' => Profile::where('status', 'pending')->whereNotNull('msv')->count(),
        ];

        $viewUser = $this->viewId
            ? User::with(['profile', 'cvs'])->find($this->viewId)
            : null;

        return view('livewire.admin.csv', compact('rows', 'stats', 'namList', 'msvCoTaiKhoan', 'viewUser'))
            ->layout('components.layouts.admin');
    }
}
