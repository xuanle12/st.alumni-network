<div>
  <style>
.aw{padding:1.75rem 2rem;display:flex;flex-direction:column;gap:1.25rem;min-height:100vh;background:#f8fafc;font-family:'Be Vietnam Pro',system-ui,sans-serif;}.flash{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:9px;font-size:13px;display:flex;align-items:center;gap:8px;}
.topbar{display:flex;align-items:center;justify-content:space-between;}
.tt{font-size:18px;font-weight:700;color:#0f172a;letter-spacing:-.3px;}
.ts{font-size:12px;color:#64748b;margin-top:3px;}
.topbar-btns{display:flex;gap:8px;}
.btn-add{padding:9px 18px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;background:#1a56db;color:#fff;border:none;display:inline-flex;align-items:center;gap:7px;box-shadow:0 4px 14px rgba(26,86,219,.25);transition:all .15s;}
.btn-add:hover{background:#1e69f5;transform:translateY(-1px);}
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;}
.stat{background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:1.1rem 1.25rem;display:flex;align-items:center;gap:14px;transition:box-shadow .15s;}
.stat:hover{box-shadow:0 4px 16px rgba(26,86,219,.1);}
.stat-ic{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
.ic-b{background:#eff6ff;color:#1a56db;}
.ic-g{background:#f0fdf4;color:#16a34a;}
.ic-a{background:#faf5ff;color:#7c3aed;}
.ic-o{background:#fffbeb;color:#d97706;}
.stat-val{font-size:24px;font-weight:700;line-height:1;}
.stat-lbl{font-size:11px;color:#64748b;margin-top:3px;}
.sv-b{color:#1a56db;}.sv-g{color:#16a34a;}.sv-a{color:#7c3aed;}.sv-o{color:#d97706;}
.toolbar{display:flex;gap:10px;align-items:center;}
.sw{flex:1;position:relative;}
.sw input{width:100%;padding:10px 12px 10px 36px;background:#fff;border:1.5px solid #e2e8f0;border-radius:10px;font-size:13px;color:#0f172a;font-family:inherit;transition:border .15s;}
.sw input:focus{outline:none;border-color:#1a56db;box-shadow:0 0 0 3px rgba(26,86,219,.1);}
.sw input::placeholder{color:#94a3b8;}
.sw-ic{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:14px;}
.sel{padding:10px 12px;background:#fff;border:1.5px solid #e2e8f0;border-radius:10px;font-size:13px;color:#475569;font-family:inherit;transition:border .15s;cursor:pointer;}
.sel:focus{outline:none;border-color:#1a56db;}
.per-sel{display:flex;align-items:center;gap:8px;font-size:12px;color:#64748b;margin-left:auto;}
.per-sel select{padding:7px 10px;background:#fff;border:1.5px solid #e2e8f0;border-radius:8px;font-size:13px;color:#475569;font-family:inherit;cursor:pointer;}
.tcard{background:#fff;border:1px solid #e2e8f0;border-radius:14px;overflow:hidden;box-shadow:0 2px 12px rgba(26,86,219,.06);}
.tbl{width:100%;border-collapse:collapse;table-layout:fixed;}
.tbl th{padding:11px 16px;font-size:10px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:#94a3b8;text-align:left;background:#f8fafc;border-bottom:1.5px solid #e2e8f0;}
.tbl td{padding:13px 16px;border-bottom:1px solid #f1f5f9;vertical-align:middle;}
.tbl tr:last-child td{border-bottom:none;}
.tbl tbody tr{transition:background .1s;}
.tbl tbody tr:hover td{background:#fafbff;}
.urow{display:flex;align-items:center;gap:10px;}
.uava{width:36px;height:36px;border-radius:10px;color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.un{font-size:13px;font-weight:600;color:#0f172a;}
.ue{font-size:11px;color:#94a3b8;margin-top:1px;}
.bd{display:inline-flex;align-items:center;gap:5px;font-size:11px;font-weight:600;padding:4px 10px;border-radius:20px;}
.bd::before{content:'';width:6px;height:6px;border-radius:50%;flex-shrink:0;}
.bd-admin{background:#eff6ff;color:#1a56db;border:1px solid #bfdbfe;}.bd-admin::before{background:#1a56db;}
.bd-alumni{background:#f0fdf4;color:#15803d;border:1px solid #bbf7d0;}.bd-alumni::before{background:#16a34a;}
.bd-student{background:#faf5ff;color:#7c3aed;border:1px solid #ddd6fe;}.bd-student::before{background:#7c3aed;}
.bd-lecturer{background:#fff7ed;color:#c2410c;border:1px solid #fed7aa;}.bd-lecturer::before{background:#ea580c;}
.bd-active{background:#f0fdf4;color:#15803d;border:1px solid #bbf7d0;}.bd-active::before{background:#16a34a;}
.bd-pending{background:#fffbeb;color:#b45309;border:1px solid #fde68a;}.bd-pending::before{background:#d97706;}
.bd-inactive{background:#fef2f2;color:#b91c1c;border:1px solid #fecaca;}.bd-inactive::before{background:#dc2626;}

/* ── 3 CHẤM DROPDOWN ── */
.dot-wrap{position:relative;display:inline-block;}
.dot-btn{width:32px;height:32px;border-radius:8px;border:1.5px solid #e2e8f0;background:#fff;cursor:pointer;color:#94a3b8;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:3px;transition:all .15s;}
.dot-btn:hover{background:#eff6ff;border-color:#1a56db;color:#1a56db;}
.dot-btn span{display:block;width:3px;height:3px;background:currentColor;border-radius:50%;}
.dropdown{display:none;position:absolute;top:38px;right:0;background:#fff;border:1.5px solid #e2e8f0;border-radius:12px;min-width:180px;z-index:999;overflow:hidden;box-shadow:0 8px 32px rgba(0,0,0,.12);}
.dropdown.open{display:block;}

.dropdown.drop-up{top:auto;bottom:38px;}

.dd-item{padding:10px 14px;font-size:13px;cursor:pointer;display:flex;align-items:center;gap:10px;color:#334155;transition:background .1s;}
.dd-item:hover{background:#f8fafc;}
.dd-item.blue{color:#1a56db;}.dd-item.blue:hover{background:#eff6ff;}
.dd-item.green{color:#15803d;}.dd-item.green:hover{background:#f0fdf4;}
.dd-item.red{color:#b91c1c;}.dd-item.red:hover{background:#fef2f2;}
.dd-sep{height:1px;background:#f1f5f9;margin:3px 0;}
.dd-ic{width:16px;text-align:center;font-size:13px;}

.pgn{display:flex;justify-content:space-between;align-items:center;padding:12px 16px;border-top:1px solid #f1f5f9;background:#fafafa;}
.pgn-info{font-size:12px;color:#94a3b8;}
.mo-bg{position:fixed;inset:0;background:rgba(15,23,42,.5);display:flex;align-items:center;justify-content:center;z-index:999;padding:1rem;}
.mo{background:#fff;border-radius:16px;width:100%;max-width:540px;max-height:90vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,.2);}
.mo-sm{max-width:380px;}
.mo-hd{padding:1.25rem 1.5rem;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:#fff;z-index:1;}
.mo-title{font-size:16px;font-weight:700;color:#0f172a;}
.mo-close{width:28px;height:28px;border-radius:8px;border:1px solid #e2e8f0;background:transparent;cursor:pointer;color:#94a3b8;font-size:16px;display:flex;align-items:center;justify-content:center;transition:all .12s;}
.mo-close:hover{background:#fef2f2;border-color:#fca5a5;color:#dc2626;}
.mo-body{padding:1.5rem;display:flex;flex-direction:column;gap:14px;}
.mo-sec{font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:#94a3b8;padding-bottom:6px;border-bottom:1px solid #f1f5f9;}
.fg2{display:grid;grid-template-columns:1fr 1fr;gap:12px;}
.fi{display:flex;flex-direction:column;gap:5px;}
.fi label{font-size:12px;font-weight:600;color:#475569;}
.fi input,.fi select{padding:9px 11px;border:1.5px solid #e2e8f0;border-radius:9px;font-size:13px;color:#0f172a;font-family:inherit;background:#fff;transition:border .15s;}
.fi input:focus,.fi select:focus{outline:none;border-color:#1a56db;box-shadow:0 0 0 3px rgba(26,86,219,.08);}
.fi .err{font-size:11px;color:#dc2626;margin-top:2px;}
.mo-ft{padding:1rem 1.5rem;border-top:1px solid #f1f5f9;display:flex;justify-content:flex-end;gap:8px;position:sticky;bottom:0;background:#fff;}
.role-grid{display:grid;grid-template-columns:1fr 1fr;gap:8px;}
.role-card{border:1.5px solid #e2e8f0;border-radius:10px;padding:10px 12px;cursor:pointer;transition:all .15s;display:flex;align-items:center;gap:10px;}
.role-card:hover{border-color:#1a56db;background:#f8faff;}
.role-card.selected{border-color:#1a56db;background:#eff6ff;}
.role-ic{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:15px;flex-shrink:0;}
.role-name{font-size:13px;font-weight:600;color:#0f172a;}
.role-desc{font-size:11px;color:#94a3b8;margin-top:1px;}
.cf-body{padding:2rem 1.5rem;text-align:center;}
.cf-ic{font-size:36px;margin-bottom:12px;}
.cf-title{font-size:16px;font-weight:700;color:#0f172a;margin-bottom:6px;}
.cf-sub{font-size:13px;color:#64748b;line-height:1.7;margin-bottom:1.5rem;}
.cf-btns{display:flex;gap:10px;justify-content:center;}
.btn{display:inline-flex;align-items:center;gap:5px;padding:8px 16px;border-radius:8px;font-size:13px;font-weight:600;border:1px solid transparent;cursor:pointer;font-family:inherit;transition:all .15s;}
.btn-ghost{background:transparent;border-color:#e2e8f0;color:#475569;}
.btn-ghost:hover{background:#f8fafc;}
.btn-prim{background:#1a56db;color:#fff;border-color:#1a56db;}
.btn-prim:hover{background:#1e69f5;}
.btn-del{background:#fef2f2;color:#b91c1c;border-color:#fecaca;}
.btn-del:hover{background:#fee2e2;}
.btn-role{background:#f0fdf4;color:#15803d;border-color:#bbf7d0;}
.btn-role:hover{background:#dcfce7;}
.empty{text-align:center;padding:3rem;color:#cbd5e1;font-size:13px;}
@media(max-width:1024px){
  .aw{padding:1.25rem}
  .stats{grid-template-columns:repeat(2,1fr);gap:10px}
}
@media(max-width:768px){
  .aw{padding:1rem}
  .stats{grid-template-columns:repeat(2,1fr);gap:8px}
  .toolbar{flex-wrap:wrap}
  .sw{min-width:100%}
  .sel{flex:1;min-width:120px}
  .per-sel{margin-left:0}
  .tcard{overflow:hidden}
}
@media(max-width:600px){
  .stats{grid-template-columns:1fr 1fr;gap:8px}
  .stat-val{font-size:20px}
  .topbar{flex-direction:column;align-items:flex-start;gap:8px}
  .btn-add{width:100%;justify-content:center}
  .tbl{min-width:620px}
  .tcard{overflow-x:auto;-webkit-overflow-scrolling:touch}
  .mo{border-radius:12px 12px 0 0;max-width:100%;align-self:flex-end}
  .mo-bg{align-items:flex-end;padding:0}
  .fg2{grid-template-columns:1fr}
}
@media(max-width:400px){
  .stats{grid-template-columns:1fr 1fr}
  .stat-ic{width:36px;height:36px;font-size:15px}
}
</style>

<div class="aw">

  @if(session('success'))
    <div class="flash"><i class="fa-solid fa-check-circle"></i> {{ session('success') }}</div>
  @endif

  <div class="topbar">
    <div>
      <div class="tt">Quản lý người dùng</div>
      <div class="ts">Danh sách tài khoản & phân quyền hệ thống</div>
    </div>
    <div class="topbar-btns">
      <button class="btn-add" wire:click="openAdd">
        <i class="fa-solid fa-plus"></i> Thêm người dùng
      </button>
    </div>
  </div>

 

  <div class="toolbar">
    <div class="sw">
      <i class="fa-solid fa-magnifying-glass sw-ic"></i>
      <input wire:model.live.debounce.300ms="search" type="text" placeholder="Tìm tên, email...">
    </div>
    <select wire:model.live="filterRole" class="sel">
      <option value="">Tất cả vai trò</option>
      <option value="admin">Quản trị viên</option>
      <option value="alumni">Cựu sinh viên</option>
      <option value="student">Sinh viên</option>
      <option value="lecturer">Giảng viên</option>
    </select>
    <select wire:model.live="filterStatus" class="sel">
      <option value="">Tất cả trạng thái</option>
      <option value="active">Đang hoạt động</option>
      <option value="pending">Chờ duyệt</option>
      <option value="inactive">Từ chối</option>
    </select>
    <div class="per-sel">
      Số hàng:
      <select wire:model.live="perPage">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
      </select>
    </div>
  </div>

  <div class="tcard">
    <table class="tbl">
      <thead>
        <tr>
          <th style="width:5%">STT</th>
          <th style="width:26%">Người dùng</th>
          <th style="width:22%">Email</th>
          <th style="width:14%">Vai trò</th>
          <th style="width:14%">Trạng thái</th>
          <th style="width:12%">Ngày tạo</th>
          <th style="width:7%"></th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $i => $u)
        @php
          $role   = $u->profile?->role ?? 'student';
          $status = $u->profile?->status ?? 'pending';
          $colors = ['#1a56db','#7c3aed','#065f46','#c2410c','#9d174d','#1e3a5f'];
          $color  = $colors[$u->id % count($colors)];
          $roleLabel  = match($role) { 'admin'=>'Quản trị', 'alumni'=>'Cựu SV', 'student'=>'Sinh viên', 'lecturer'=>'Giảng viên', default=>'Khác' };
          $statusLabel= match($status) { 'active'=>'Hoạt động', 'pending'=>'Chờ duyệt', default=>'Từ chối' };
        @endphp
        <tr>
          <td style="font-size:13px;color:#94a3b8;font-weight:500">{{ $users->firstItem() + $i }}</td>
          <td>
            <div class="urow">
              <div class="uava" style="background:{{ $color }}">
                {{ strtoupper(substr($u->name, 0, 2)) }}
              </div>
              <div>
                <div class="un">{{ $u->name }}</div>
                <div class="ue">ID #{{ $u->id }}</div>
              </div>
            </div>
          </td>
          <td style="font-size:13px;color:#475569;">{{ $u->email }}</td>
          <td><span class="bd bd-{{ $role }}">{{ $roleLabel }}</span></td>
          <td><span class="bd bd-{{ $status }}">{{ $statusLabel }}</span></td>
          <td style="font-size:12px;color:#94a3b8;">{{ $u->created_at->format('d/m/Y') }}</td>
          <td>
            {{-- ← PHẦN ĐÃ SỬA: tự detect xổ lên hay xuống --}}
            <div class="dot-wrap" x-data="{open:false}" @click.away="open=false">
              <button class="dot-btn" @click="
                open = !open;
                if (open) {
                  const rect = $el.getBoundingClientRect();
                  const spaceBelow = window.innerHeight - rect.bottom;
                  const dd = $el.nextElementSibling;
                  if (spaceBelow < 160) {
                    dd.classList.add('drop-up');
                  } else {
                    dd.classList.remove('drop-up');
                  }
                }
              ">
                <span></span><span></span><span></span>
              </button>
              <div class="dropdown" :class="{open:open}">
                <div class="dd-item blue" @click="open=false" wire:click="openRole({{ $u->id }})">
                  <span class="dd-ic"><i class="fa-solid fa-user-shield"></i></span> Phân quyền
                </div>
                <div class="dd-sep"></div>
                <div class="dd-item" @click="open=false" wire:click="openEdit({{ $u->id }})">
                  <span class="dd-ic"><i class="fa-solid fa-pen-to-square"></i></span> Chỉnh sửa
                </div>
                <div class="dd-sep"></div>
                <div class="dd-item red" @click="open=false" wire:click="confirmDelete({{ $u->id }})">
                  <span class="dd-ic"><i class="fa-solid fa-trash"></i></span> Xóa
                </div>
              </div>
            </div>
          </td>
        </tr>
        @empty
          <tr><td colspan="7"><div class="empty">📭 Không tìm thấy người dùng nào.</div></td></tr>
        @endforelse
      </tbody>
    </table>
    <div class="pgn">
      <div class="pgn-info">
        Hiển thị {{ $users->firstItem() }}–{{ $users->lastItem() }} / {{ $users->total() }} người dùng
      </div>
      {{ $users->links() }}
    </div>
  </div>

</div>

@if($showModal)
<div class="mo-bg" wire:click.self="closeModal">
  <div class="mo">
    <div class="mo-hd">
      <div class="mo-title">{{ $editId ? 'Chỉnh sửa người dùng' : 'Thêm người dùng mới' }}</div>
      <button class="mo-close" wire:click="closeModal">✕</button>
    </div>
    <div class="mo-body">
      <div class="mo-sec">Thông tin cơ bản</div>
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
      <div class="mo-sec">Vai trò & Trạng thái</div>
      <div class="fg2">
        <div class="fi">
          <label>Vai trò</label>
          <select wire:model="f_role">
            <option value="alumni">Cựu sinh viên</option>
            <option value="student">Sinh viên</option>
            <option value="lecturer">Giảng viên</option>
            <option value="admin">Quản trị viên</option>
          </select>
        </div>
        <div class="fi">
          <label>Trạng thái</label>
          <select wire:model="f_status">
            <option value="active">Đang hoạt động</option>
            <option value="pending">Chờ duyệt</option>
            <option value="inactive">Từ chối</option>
          </select>
        </div>
      </div>
    </div>
    <div class="mo-ft">
      <button class="btn btn-ghost" wire:click="closeModal">Hủy</button>
      <button class="btn btn-prim" wire:click="save" wire:loading.attr="disabled">
        <span wire:loading wire:target="save">Đang lưu...</span>
        <span wire:loading.remove wire:target="save">
          <i class="fa-solid fa-floppy-disk"></i> {{ $editId ? 'Cập nhật' : 'Thêm mới' }}
        </span>
      </button>
    </div>
  </div>
</div>
@endif

@if($showRole)
<div class="mo-bg" wire:click.self="closeRole">
  <div class="mo mo-sm">
    <div class="mo-hd">
      <div>
        <div class="mo-title">Phân quyền</div>
        <div style="font-size:12px;color:#64748b;margin-top:2px">{{ $roleUserName }}</div>
      </div>
      <button class="mo-close" wire:click="closeRole">✕</button>
    </div>
    <div class="mo-body">
      <div class="role-grid">
        @foreach([
          ['alumni',   'fa-graduation-cap', '#f0fdf4', 'Cựu sinh viên', 'Đã ra trường'],
          ['student',  'fa-user-graduate',  '#faf5ff', 'Sinh viên',     'Đang theo học'],
          ['lecturer', 'fa-chalkboard-user','#fff7ed', 'Giảng viên',    'Cán bộ giảng dạy'],
          ['admin',    'fa-shield-halved',  '#eff6ff', 'Quản trị viên', 'Toàn quyền hệ thống'],
        ] as [$val, $ic, $bg, $name, $desc])
        <div class="role-card {{ $roleValue === $val ? 'selected' : '' }}"
             wire:click="$set('roleValue','{{ $val }}')">
          <div class="role-ic" style="background:{{ $bg }}">
            <i class="fa-solid {{ $ic }}" style="font-size:15px"></i>
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

@if($showDelete)
<div class="mo-bg" wire:click.self="closeDelete">
  <div class="mo mo-sm">
    <div class="cf-body">
      <div class="cf-ic">🗑️</div>
      <div class="cf-title">Xóa người dùng?</div>
      <div class="cf-sub">
        Bạn sắp xóa <strong>{{ $deleteName }}</strong>.<br>
        Tất cả dữ liệu liên quan sẽ bị xóa vĩnh viễn.
      </div>
      <div class="cf-btns">
        <button class="btn btn-ghost" wire:click="closeDelete">Hủy</button>
        <button class="btn btn-del" wire:click="destroy" wire:loading.attr="disabled">
          <span wire:loading wire:target="destroy">Đang xóa...</span>
          <span wire:loading.remove wire:target="destroy">
            <i class="fa-solid fa-trash"></i> Xóa
          </span>
        </button>
      </div>
    </div>
  </div>
</div>
@endif
</div>