<div>
<style>
.uw{padding:1.5rem 1.75rem;display:flex;flex-direction:column;gap:1.25rem;min-height:100vh;background:#f8fafc;font-family:'Be Vietnam Pro',system-ui,sans-serif}
.u-topbar{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap}
.u-title{font-size:20px;font-weight:700;color:#0f172a;letter-spacing:-.2px}
.u-sub{font-size:12px;color:#64748b;margin-top:2px}
.u-btn-add{display:inline-flex;align-items:center;gap:7px;padding:9px 18px;background:#16a34a;color:#fff;border:none;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;box-shadow:0 2px 8px rgba(22,163,74,.3);transition:all .15s}
.u-btn-add:hover{background:#15803d;transform:translateY(-1px)}
.u-stats{display:grid;grid-template-columns:repeat(4,1fr);gap:12px}
.u-stat{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:1rem 1.25rem;display:flex;align-items:center;justify-content:space-between;gap:12px;transition:box-shadow .15s}
.u-stat:hover{box-shadow:0 4px 16px rgba(0,0,0,.07)}
.u-stat-lbl{font-size:12px;color:#64748b;font-weight:500;margin-bottom:4px}
.u-stat-val{font-size:26px;font-weight:700;line-height:1}
.u-stat-ic{width:42px;height:42px;border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:17px;flex-shrink:0}
.sic-green{background:#f0fdf4;color:#16a34a}.sic-purple{background:#faf5ff;color:#7c3aed}.sic-amber{background:#fffbeb;color:#d97706}.sic-blue{background:#eff6ff;color:#2563eb}
.sval-default{color:#0f172a}.sval-green{color:#16a34a}.sval-amber{color:#d97706}.sval-blue{color:#2563eb}
.u-row{display:flex;align-items:center;gap:10px}
.u-ava{width:34px;height:34px;border-radius:9px;color:#fff;font-size:13px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.u-name{font-size:13px;font-weight:600;color:#0f172a}
.u-email-cell{font-size:12.5px;color:#64748b}
.mo-bg{position:fixed;inset:0;background:rgba(15,23,42,.45);display:flex;align-items:center;justify-content:center;z-index:1000;padding:1rem;backdrop-filter:blur(2px)}
.mo{background:#fff;border-radius:14px;width:100%;max-width:500px;max-height:90vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,.18)}
.mo-sm{max-width:380px}
.mo-hd{padding:1.1rem 1.4rem;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:#fff;z-index:1}
.mo-title{font-size:16px;font-weight:700;color:#0f172a}
.mo-sub{font-size:11px;color:#94a3b8;margin-top:2px}
.mo-close{width:26px;height:26px;border-radius:7px;border:1px solid #e2e8f0;background:transparent;cursor:pointer;color:#94a3b8;font-size:14px;display:flex;align-items:center;justify-content:center;transition:all .12s}
.mo-close:hover{background:#fef2f2;border-color:#fca5a5;color:#dc2626}
.mo-body{padding:1.25rem 1.4rem;display:flex;flex-direction:column;gap:12px}
.mo-sec-lbl{font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#94a3b8;padding-bottom:5px;border-bottom:1px solid #f1f5f9}
.fg2{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.fi{display:flex;flex-direction:column;gap:4px}
.fi label{font-size:11.5px;font-weight:600;color:#475569}
.fi input,.fi select{padding:9px 11px;border:1.5px solid #e2e8f0;border-radius:9px;font-size:13px;color:#0f172a;font-family:inherit;background:#fff;transition:border .15s}
.fi input:focus,.fi select:focus{outline:none;border-color:#16a34a;box-shadow:0 0 0 3px rgba(22,163,74,.08)}
.fi .err{font-size:11px;color:#dc2626;margin-top:2px}
.mo-ft{padding:.9rem 1.4rem;border-top:1px solid #f1f5f9;display:flex;justify-content:flex-end;gap:8px;position:sticky;bottom:0;background:#fff}
.role-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.role-card{border:1.5px solid #e2e8f0;border-radius:10px;padding:10px 12px;cursor:pointer;transition:all .15s;display:flex;align-items:center;gap:10px}
.role-card:hover{border-color:#16a34a;background:#f0faf5}
.role-card.selected{border-color:#16a34a;background:#f0fdf4;box-shadow:0 0 0 3px rgba(22,163,74,.1)}
.role-ic{width:30px;height:30px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0}
.role-name{font-size:12.5px;font-weight:600;color:#0f172a}
.role-desc{font-size:10.5px;color:#94a3b8;margin-top:1px}
.cf-body{padding:2rem 1.5rem;text-align:center}
.cf-ic{font-size:34px;margin-bottom:10px}
.cf-title{font-size:15px;font-weight:700;color:#0f172a;margin-bottom:5px}
.cf-sub{font-size:12.5px;color:#64748b;line-height:1.7;margin-bottom:1.5rem}
.cf-btns{display:flex;gap:10px;justify-content:center}
.btn{display:inline-flex;align-items:center;gap:5px;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;border:1.5px solid transparent;cursor:pointer;font-family:inherit;transition:all .12s}
.btn-ghost{background:transparent;border-color:#e2e8f0;color:#475569}.btn-ghost:hover{background:#f8fafc}
.btn-prim{background:#16a34a;color:#fff;border-color:#16a34a}.btn-prim:hover{background:#15803d}
.btn-del{background:#fef2f2;color:#b91c1c;border-color:#fecaca}.btn-del:hover{background:#fee2e2;border-color:#fca5a5}
@media(max-width:900px){.u-stats{grid-template-columns:repeat(2,1fr)}}
@media(max-width:640px){.uw{padding:1rem}.u-stats{grid-template-columns:repeat(2,1fr);gap:8px}.fg2{grid-template-columns:1fr}.mo{border-radius:12px 12px 0 0;max-width:100%;align-self:flex-end}.mo-bg{align-items:flex-end;padding:0}}
</style>

<div class="uw">

  {{-- Header --}}
  <div class="u-topbar">
    <div>
      <div class="u-title">Quản lý người dùng</div>
      <div class="u-sub">Danh sách tài khoản &amp; phân quyền hệ thống</div>
    </div>
    <button class="u-btn-add" wire:click="openAdd">
      <i class="fa-solid fa-plus"></i> Thêm người dùng
    </button>
  </div>

  {{-- Stats cards --}}
  <div class="u-stats">
    <div class="u-stat">
      <div>
        <div class="u-stat-lbl">Tổng người dùng</div>
        <div class="u-stat-val sval-default">{{ $stats['total'] }}</div>
      </div>
      <div class="u-stat-ic sic-green"><i class="fa-solid fa-users"></i></div>
    </div>
    <div class="u-stat">
      <div>
        <div class="u-stat-lbl">Cựu sinh viên</div>
        <div class="u-stat-val sval-blue">{{ $stats['alumni'] }}</div>
      </div>
      <div class="u-stat-ic sic-blue"><i class="fa-solid fa-graduation-cap"></i></div>
    </div>
    <div class="u-stat">
      <div>
        <div class="u-stat-lbl">Chờ duyệt</div>
        <div class="u-stat-val sval-amber">{{ $stats['pending'] }}</div>
      </div>
      <div class="u-stat-ic sic-amber"><i class="fa-solid fa-clock"></i></div>
    </div>
    <div class="u-stat">
      <div>
        <div class="u-stat-lbl">Doanh nghiệp</div>
        <div class="u-stat-val sval-green">{{ $stats['company'] }}</div>
      </div>
      <div class="u-stat-ic sic-purple"><i class="fa-solid fa-building"></i></div>
    </div>
  </div>

  {{-- Toolbar --}}
  <x-toolbar>
    <x-slot:search>
      <x-toolbar.search placeholder="Tìm tên, email..." />
    </x-slot:search>
    <x-toolbar.select model="filterRole">
      <option value="">Tất cả vai trò</option>
      <option value="admin">Quản trị viên</option>
      <option value="alumni">Cựu sinh viên</option>
      <option value="student">Sinh viên</option>
      <option value="lecturer">Giảng viên</option>
      <option value="company">Doanh nghiệp</option>
    </x-toolbar.select>
    <x-toolbar.select model="filterStatus">
      <option value="">Tất cả trạng thái</option>
      <option value="active">Đang hoạt động</option>
      <option value="pending">Chờ duyệt</option>
      <option value="locked">Bị khóa</option>
    </x-toolbar.select>
  </x-toolbar>

  {{-- Table --}}
  <x-table minWidth="640px">
    <x-slot:heading>
      <th style="width:5%">STT</th>
      <th style="width:25%">Người dùng</th>
      <th style="width:22%">Email</th>
      <th style="width:13%">Vai trò</th>
      <th style="width:13%">Trạng thái</th>
      <th style="width:11%">Ngày tạo</th>
      <th style="width:11%"></th>
    </x-slot:heading>

    @forelse($users as $i => $u)
    @php
      $role   = $u->role   ?? 'student';
      $status = $u->status ?? 'pending';
      $ava_colors = ['#16a34a','#7c3aed','#065f46','#c2410c','#1d4ed8','#9d174d'];
      $color = $ava_colors[$u->id % count($ava_colors)];
      $roleLabel   = match($role)   { 'admin'=>'Quản trị', 'alumni'=>'Cựu SV', 'student'=>'Sinh viên', 'lecturer'=>'Giảng viên', 'company'=>'Doanh nghiệp', default=>'Khác' };
      $statusLabel = match($status) { 'active'=>'Hoạt động', 'pending'=>'Chờ duyệt', 'locked'=>'Bị khóa', default=>'Khác' };
      $roleColor   = match($role)   { 'admin'=>'green', 'alumni'=>'green', 'student'=>'purple', 'lecturer'=>'orange', 'company'=>'blue', default=>'blue' };
      $statusColor = match($status) { 'active'=>'green', 'pending'=>'yellow', 'locked'=>'red', default=>'yellow' };
    @endphp
    <tr>
      <td style="font-size:12px;color:#94a3b8;font-weight:500">{{ $users->firstItem() + $i }}</td>
      <td>
        <div class="u-row">
          <div class="u-ava" style="background:{{ $color }}">
            {{ strtoupper(mb_substr($u->name, 0, 2)) }}
          </div>
          <div class="u-name">{{ $u->name }}</div>
        </div>
      </td>
      <td class="u-email-cell">{{ $u->email }}</td>
      <td><x-badge :color="$roleColor">{{ $roleLabel }}</x-badge></td>
      <td><x-badge :color="$statusColor">{{ $statusLabel }}</x-badge></td>
      <td style="font-size:12px;color:#94a3b8">{{ $u->created_at->format('d/m/Y') }}</td>
      <td>
        <x-table.action-btn>
          <div class="adm-dd-item blue" wire:click="openRole({{ $u->id }})">
            <i class="fa-solid fa-user-shield adm-dd-ic"></i> Phân quyền
          </div>
          <div class="adm-dd-sep"></div>
          <div class="adm-dd-item" wire:click="openEdit({{ $u->id }})">
            <i class="fa-solid fa-pen-to-square adm-dd-ic"></i> Chỉnh sửa
          </div>
          <div class="adm-dd-sep"></div>
          <div class="adm-dd-item red" wire:click="confirmDelete({{ $u->id }})">
            <i class="fa-solid fa-trash adm-dd-ic"></i> Xóa
          </div>
        </x-table.action-btn>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="7" class="adm-tbl-empty">
        <i class="fa-solid fa-users-slash" style="font-size:20px;display:block;margin-bottom:8px;opacity:.4"></i>
        Không tìm thấy người dùng nào.
      </td>
    </tr>
    @endforelse

    <x-slot:paginationInfo>
      @if($users->total())
        Hiển thị {{ $users->firstItem() }}–{{ $users->lastItem() }} / {{ $users->total() }} người dùng
      @else
        Không có dữ liệu
      @endif
    </x-slot:paginationInfo>
    <x-slot:pagination>{{ $users->links() }}</x-slot:pagination>
  </x-table>

</div>

{{-- Modal: Add / Edit --}}
@if($showModal)
<div class="mo-bg" wire:click.self="closeModal">
  <div class="mo">
    <div class="mo-hd">
      <div>
        <div class="mo-title">{{ $editId ? 'Chỉnh sửa người dùng' : 'Thêm người dùng mới' }}</div>
        <div class="mo-sub">{{ $editId ? 'Cập nhật thông tin tài khoản' : 'Điền đầy đủ thông tin bên dưới' }}</div>
      </div>
      <button class="mo-close" wire:click="closeModal">✕</button>
    </div>
    <div class="mo-body">
      <div class="mo-sec-lbl">Thông tin cơ bản</div>
      <div class="fg2">
        <div class="fi">
          <label>Họ và tên *</label>
          <input wire:model="f_name" type="text" placeholder="Nguyễn Văn A">
          @error('f_name')<div class="err">{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Email *</label>
          <input wire:model="f_email" type="email" placeholder="email@gmail.com">
          @error('f_email')<div class="err">{{ $message }}</div>@enderror
        </div>
      </div>
      <div class="fi">
        <label>{{ $editId ? 'Mật khẩu mới (để trống nếu không đổi)' : 'Mật khẩu *' }}</label>
        <input wire:model="f_password" type="password" placeholder="••••••••">
        @error('f_password')<div class="err">{{ $message }}</div>@enderror
      </div>
      <div class="mo-sec-lbl">Vai trò &amp; Trạng thái</div>
      <div class="fg2">
        <div class="fi">
          <label>Vai trò</label>
          <select wire:model="f_role">
            <option value="alumni">Cựu sinh viên</option>
            <option value="student">Sinh viên</option>
            <option value="lecturer">Giảng viên</option>
            <option value="admin">Quản trị viên</option>
            <option value="company">Doanh nghiệp</option>
          </select>
        </div>
        <div class="fi">
          <label>Trạng thái</label>
          <select wire:model="f_status">
            <option value="active">Đang hoạt động</option>
            <option value="pending">Chờ duyệt</option>
            <option value="locked">Bị khóa</option>
          </select>
        </div>
      </div>
    </div>
    <div class="mo-ft">
      <button class="btn btn-ghost" wire:click="closeModal">Hủy</button>
      <button class="btn btn-prim" wire:click="save" wire:loading.attr="disabled">
        <span wire:loading wire:target="save"><i class="fa-solid fa-spinner fa-spin"></i> Đang lưu...</span>
        <span wire:loading.remove wire:target="save">
          <i class="fa-solid fa-floppy-disk"></i> {{ $editId ? 'Cập nhật' : 'Thêm mới' }}
        </span>
      </button>
    </div>
  </div>
</div>
@endif

{{-- Modal: Role --}}
@if($showRole)
<div class="mo-bg" wire:click.self="closeRole">
  <div class="mo mo-sm">
    <div class="mo-hd">
      <div>
        <div class="mo-title">Phân quyền</div>
        <div class="mo-sub">{{ $roleUserName }}</div>
      </div>
      <button class="mo-close" wire:click="closeRole">✕</button>
    </div>
    <div class="mo-body">
      <div class="role-grid">
        @foreach([
          ['alumni',   'fa-graduation-cap',  '#eff6ff', 'Cựu sinh viên', 'Đã ra trường'],
          ['student',  'fa-user-graduate',   '#faf5ff', 'Sinh viên',     'Đang theo học'],
          ['lecturer', 'fa-chalkboard-user', '#fff7ed', 'Giảng viên',    'Cán bộ giảng dạy'],
          ['admin',    'fa-shield-halved',   '#f0fdf4', 'Quản trị viên', 'Toàn quyền hệ thống'],
          ['company',  'fa-building',        '#ecfdf5', 'Doanh nghiệp',  'Tài khoản doanh nghiệp'],
        ] as [$val, $ic, $bg, $name, $desc])
        <div class="role-card {{ $roleValue === $val ? 'selected' : '' }}"
             wire:click="$set('roleValue','{{ $val }}')">
          <div class="role-ic" style="background:{{ $bg }}">
            <i class="fa-solid {{ $ic }}"></i>
          </div>
          <div>
            <div class="role-name">{{ $name }}</div>
            <div class="role-desc">{{ $desc }}</div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="mo-ft">
      <button class="btn btn-ghost" wire:click="closeRole">Hủy</button>
      <button class="btn btn-prim" wire:click="saveRole" wire:loading.attr="disabled">
        <i class="fa-solid fa-shield-halved"></i> Lưu phân quyền
      </button>
    </div>
  </div>
</div>
@endif

{{-- Modal: Delete confirm --}}
@if($showDelete)
<div class="mo-bg" wire:click.self="closeDelete">
  <div class="mo mo-sm">
    <div class="cf-body">
      <div class="cf-ic">🗑️</div>
      <div class="cf-title">Xóa người dùng?</div>
      <div class="cf-sub">
        Bạn sắp xóa tài khoản <strong>{{ $deleteName }}</strong>.<br>
        Hành động này không thể hoàn tác.
      </div>
      <div class="cf-btns">
        <button class="btn btn-ghost" wire:click="closeDelete">Hủy</button>
        <button class="btn btn-del" wire:click="destroy" wire:loading.attr="disabled">
          <span wire:loading wire:target="destroy"><i class="fa-solid fa-spinner fa-spin"></i> Đang xóa...</span>
          <span wire:loading.remove wire:target="destroy"><i class="fa-solid fa-trash"></i> Xóa</span>
        </button>
      </div>
    </div>
  </div>
</div>
@endif

</div>