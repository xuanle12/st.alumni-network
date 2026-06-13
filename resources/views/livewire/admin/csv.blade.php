<div>
  <style>
  *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
  .aw{padding:1.5rem 1.75rem;display:flex;flex-direction:column;gap:1rem;background:#f8fafc;min-height:100vh}
  .flash{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px}
  .topbar{display:flex;align-items:center;justify-content:space-between}
  .tt{font-size:17px;font-weight:700;color:#0f172a}.ts{font-size:12px;color:#64748b;margin-top:2px}
  .btn-add{padding:8px 16px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;background:#16a34a;color:#fff;border:none;display:inline-flex;align-items:center;gap:6px}
  .btn-add:hover{background:#15803d}
  .stats{display:grid;grid-template-columns:repeat(4,1fr);gap:12px}
  .stat{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:1rem 1.5rem;display:flex;align-items:center;gap:14px;}
  .stat-ic{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:14px;flex-shrink:0;margin-bottom:0;}.ic-b{background:#f0fdf4}.ic-g{background:#f0fdf4}.ic-a{background:#fffbeb}.ic-p{background:#faf5ff}
  .stat-n{font-size:24px;font-weight:700}.stat-l{font-size:11px;color:#64748b;margin-top:3px}
  .n-b{color:#0f172a}.n-g{color:#16a34a}.n-a{color:#d97706}.n-p{color:#7c3aed}
  .toolbar{display:flex;gap:10px}
  .sw{flex:1;position:relative}
  .sw input{width:100%;padding:9px 12px 9px 34px;background:#fff;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;color:#0f172a;font-family:inherit}
  .sw input:focus{outline:none;border-color:#3b82f6;box-shadow:0 0 0 3px #3b82f611}
  .sw input::placeholder{color:#94a3b8}
  .sw-ic{position:absolute;left:11px;top:50%;transform:translateY(-50%);font-size:13px;color:#94a3b8}
  .sel{padding:9px 11px;background:#fff;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;color:#475569;font-family:inherit}
  .sel:focus{outline:none;border-color:#3b82f6}
  .tcard{background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:visible}.tbl{width:100%;border-collapse:collapse;table-layout:fixed}
  .tbl th{padding:10px 14px;font-size:10.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#94a3b8;text-align:left;background:#f8fafc;border-bottom:1px solid #e2e8f0}
  .tbl td{padding:12px 14px;border-bottom:1px solid #f1f5f9;vertical-align:middle}
  .tbl tr:last-child td{border-bottom:none}
  .tbl tbody tr:hover td{background:#fafbfc}
  .urow{display:flex;align-items:center;gap:10px}
  .uava{width:34px;height:34px;border-radius:50%;color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center;flex-shrink:0}
  .un{font-size:13px;font-weight:600;color:#0f172a}.ue{font-size:11px;color:#94a3b8;margin-top:1px}
  .msv{font-size:13px;font-weight:600;color:#0f172a}.cls{font-size:11px;color:#94a3b8;margin-top:1px}
  .job{font-size:12px;font-weight:600;color:#0f172a}.cmp{font-size:11px;color:#94a3b8;margin-top:1px}
  .bd{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 9px;border-radius:20px}
  .bd::before{content:'';width:5px;height:5px;border-radius:50%;flex-shrink:0}
  .bd-g{background:#f0fdf4;color:#15803d}.bd-g::before{background:#16a34a}
  .bd-a{background:#fffbeb;color:#b45309}.bd-a::before{background:#d97706}
  .bd-r{background:#fef2f2;color:#b91c1c}.bd-r::before{background:#dc2626}


  .dot-wrap{position:relative;display:inline-block}
  .dot-btn{width:32px;height:32px;border-radius:8px;border:1px solid #e2e8f0;background:transparent;cursor:pointer;color:#64748b;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:3.5px}
  .dot-btn:hover{background:#f1f5f9}
  .dot-btn span{display:block;width:13px;height:1.5px;background:currentColor;border-radius:2px}
  .dropdown{display:none;position:absolute;top:36px;right:0;background:#fff;border:1px solid #e2e8f0;border-radius:10px;min-width:168px;z-index:999;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,.1)}
  .dropdown.open{display:block}

  .dropdown.drop-up{top:auto;bottom:36px;}

  .dd-item{padding:9px 14px;font-size:13px;cursor:pointer;display:flex;align-items:center;gap:9px;color:#334155}
  .dd-item:hover{background:#f8fafc}
  .dd-item.green{color:#15803d}.dd-item.green:hover{background:#f0fdf4}
  .dd-item.red{color:#b91c1c}.dd-item.red:hover{background:#fef2f2}
  .dd-sep{height:1px;background:#f1f5f9;margin:3px 0}
  .dd-ic{font-size:14px;width:16px;text-align:center}
  .pgn{display:flex;justify-content:space-between;align-items:center;padding:.875rem 1rem;border-top:1px solid #f1f5f9;background:#fafafa}
  .pgn-info{font-size:12px;color:#94a3b8}
  .btn{display:inline-flex;align-items:center;gap:5px;padding:7px 16px;border-radius:8px;font-size:13px;font-weight:600;border:1px solid transparent;cursor:pointer;font-family:inherit;transition:all .15s}
  .btn-ghost{background:transparent;border-color:#e2e8f0;color:#475569}
  .btn-ghost:hover{background:#f8fafc}
  .btn-prim{background:#16a34a;color:#fff}
  .btn-prim:hover{background:#15803d}
  .btn-del{background:#fef2f2;color:#b91c1c;border-color:#fecaca}
  .btn-del:hover{background:#fee2e2}
  .mo-bg{position:fixed;inset:0;background:rgba(15,23,42,.5);display:flex;align-items:center;justify-content:center;z-index:999;padding:1rem}
  .mo{background:#fff;border-radius:14px;width:100%;max-width:560px;max-height:90vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,.2)}
  .mo-hd{padding:1.25rem 1.5rem;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:#fff;z-index:1}
  .mo-title{font-size:16px;font-weight:700;color:#0f172a}
  .mo-close{width:28px;height:28px;border-radius:8px;border:1px solid #e2e8f0;background:transparent;cursor:pointer;color:#94a3b8;font-size:16px;display:flex;align-items:center;justify-content:center}
  .mo-body{padding:1.5rem;display:flex;flex-direction:column;gap:14px}
  .mo-sec{font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8}
  .fg2{display:grid;grid-template-columns:1fr 1fr;gap:12px}
  .fg3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px}
  .fi{display:flex;flex-direction:column;gap:5px}
  .fi label{font-size:12px;font-weight:600;color:#475569}
  .fi input,.fi select{padding:9px 11px;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;color:#0f172a;font-family:inherit;background:#fff}
  .fi input:focus,.fi select:focus{outline:none;border-color:#3b82f6;box-shadow:0 0 0 3px #3b82f611}
  .fi .err{font-size:11px;color:#dc2626}
  .fi.full{grid-column:1/-1}
  .mdiv{border:none;border-top:1px solid #f1f5f9}
  .mo-ft{padding:1rem 1.5rem;border-top:1px solid #f1f5f9;display:flex;justify-content:flex-end;gap:8px;position:sticky;bottom:0;background:#fff}
  .vgrid{display:grid;grid-template-columns:1fr 1fr 1fr;gap:.875rem}
  .vi label{display:block;font-size:10px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#94a3b8;margin-bottom:3px}
  .vi p{font-size:13px;font-weight:600;color:#0f172a}
  .vi p.mt{color:#cbd5e1;font-style:italic;font-weight:400}
  .vi a{font-size:12px;color:#16a34a}
  .cf-body{padding:2rem 1.5rem;text-align:center}
  .cf-ic{font-size:36px;margin-bottom:12px}
  .cf-title{font-size:16px;font-weight:700;color:#0f172a;margin-bottom:6px}
  .cf-sub{font-size:13px;color:#64748b;line-height:1.7;margin-bottom:1.5rem}
  .cf-btns{display:flex;gap:10px;justify-content:center}
  .empty{text-align:center;padding:3rem;color:#cbd5e1;font-size:13px}
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
}
@media(max-width:600px){
  .stats{grid-template-columns:1fr 1fr;gap:8px}
  .stat-n{font-size:20px}
  .topbar{flex-direction:column;align-items:flex-start;gap:8px}
  .btn-add{width:100%;justify-content:center}
  .tcard{overflow-x:auto;-webkit-overflow-scrolling:touch}
  .tbl{min-width:560px}
  .mo{border-radius:12px 12px 0 0;max-width:100%;align-self:flex-end}
  .mo-bg{align-items:flex-end;padding:0}
  .fg2{grid-template-columns:1fr}
  .fg3{grid-template-columns:1fr 1fr}
}
@media(max-width:400px){
  .stat-n{font-size:18px}
  .stat-ic{width:36px;height:36px;font-size:15px}
  .fg3{grid-template-columns:1fr}
}
  </style>

  <div>
    <div class="aw">

    @if(session('success'))
      <div class="flash">✓ {{ session('success') }}</div>
    @endif

    <div class="topbar">
      <div><div class="tt">Danh sách cựu sinh viên</div><div class="ts">Quản lý danh sách tốt nghiệp</div></div>
      <button class="btn-add" wire:click="openAdd">＋ Thêm cựu sinh viên</button>
    </div>
    <div class="toolbar">
      <div class="sw">
        <span class="sw-ic"><i class="fa-solid fa-magnifying-glass"></i></span>
        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Tìm tên, MSV, lớp...">
      </div>
      <select wire:model.live="filterNam" class="sel">
        <option value="">Tất cả năm</option>
        @foreach($namList as $nam)
          <option value="{{ $nam }}">{{ $nam }}</option>
        @endforeach
      </select>
      <select wire:model.live="filterStatus" class="sel">
        <option value="">Tất cả</option>
        <option value="co_tk">Đã có tài khoản</option>
        <option value="chua_tk">Chưa có tài khoản</option>
      </select>
    </div>

    <div class="tcard">
      <table class="tbl">
        <thead>
          <tr>
            <th style="width:28%">Họ và tên</th>
            <th style="width:14%">MSV</th>
            <th style="width:14%">Lớp / Năm TN</th>
            <th style="width:20%">Khoa / Ngành</th>
            <th style="width:14%">Tài khoản</th>
            <th style="width:10%"></th>
          </tr>
        </thead>
        <tbody>
          @forelse($rows as $row)
          @php
            $user = $msvCoTaiKhoan[$row->msv] ?? null;
            $profileStatus = $user?->profile?->status ?? null;
          @endphp
          <tr>
            <td>
              <div class="un">{{ $row->ho_ten }}</div>
            </td>
            <td>
              <div class="msv">{{ $row->msv }}</div>
            </td>
            <td>
              <div class="msv">{{ $row->lop ?? '—' }}</div>
              <div class="cls">{{ $row->nam_tot_nghiep ?? '—' }}</div>
            </td>
            <td>
              <div class="job">{{ $row->khoa ?? '—' }}</div>
              <div class="cmp">{{ $row->nganh ?? '—' }}</div>
            </td>
            <td>
              @if($user)
                <span class="bd {{ $profileStatus === 'active' ? 'bd-g' : 'bd-a' }}">
                  {{ $profileStatus === 'active' ? 'Đã duyệt' : 'Chờ duyệt' }}
                </span>
              @else
                <span class="bd bd-r">Chưa có TK</span>
              @endif
            </td>
            <td>
              <div class="dot-wrap" x-data="{ open: false }" @click.away="open = false">
                <button class="dot-btn" @click="
                  open = !open;
                  if (open) {
                    const rect = $el.getBoundingClientRect();
                    const spaceBelow = window.innerHeight - rect.bottom;
                    const dd = $el.nextElementSibling;
                    if (spaceBelow < 200) { dd.classList.add('drop-up'); }
                    else { dd.classList.remove('drop-up'); }
                  }
                ">
                  <span></span><span></span><span></span>
                </button>
                <div class="dropdown" :class="{ open: open }">
                  @if($user)
                  <div class="dd-item" @click="open=false" wire:click="openView({{ $user->id }})">
                    <span class="dd-ic"><i class="fa-solid fa-eye"></i></span> Xem hồ sơ
                  </div>
                  @if($profileStatus === 'pending')
                  <div class="dd-item green" @click="open=false" wire:click="quickApprove({{ $user->id }})" wire:confirm="Duyệt hồ sơ {{ $row->ho_ten }}?">
                    <span class="dd-ic"><i class="fa-solid fa-check"></i></span> Duyệt hồ sơ
                  </div>
                  @endif
                  <div class="dd-sep"></div>
                  @endif
                  <div class="dd-item" @click="open=false" wire:click="openEdit({{ $row->id }})">
                    <span class="dd-ic"><i class="fa-solid fa-pen-to-square"></i></span> Chỉnh sửa
                  </div>
                  <div class="dd-sep"></div>
                  <div class="dd-item red" @click="open=false" wire:click="confirmDelete({{ $row->id }})">
                    <span class="dd-ic"><i class="fa-solid fa-trash"></i></span> Xoá
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @empty
          <tr><td colspan="6"><div class="empty">📭 Không tìm thấy cựu sinh viên nào.</div></td></tr>
          @endforelse
        </tbody>
      </table>
      <div class="pgn">
        <div class="pgn-info">Hiển thị {{ $rows->firstItem() }}–{{ $rows->lastItem() }} / {{ $rows->total() }}</div>
        {{ $rows->links() }}
      </div>
    </div>

  </div>

  {{-- MODAL THÊM / SỬA ds_csv --}}
  @if($showModal)
  <div class="mo-bg" wire:click.self="closeModal">
    <div class="mo">
      <div class="mo-hd">
        <div class="mo-title">{{ $editId ? 'Chỉnh sửa' : 'Thêm cựu sinh viên' }}</div>
        <button class="mo-close" wire:click="closeModal">✕</button>
      </div>
      <div class="mo-body">
        <div class="fg2">
          <div class="fi">
            <label>Họ và tên *</label>
            <input wire:model="f_ho_ten" type="text" placeholder="Nguyễn Văn A">
            @error('f_ho_ten')<div class="err">{{ $message }}</div>@enderror
          </div>
          <div class="fi">
            <label>Mã sinh viên *</label>
            <input wire:model="f_msv" placeholder="651001">
            @error('f_msv')<div class="err">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="fg3">
          <div class="fi">
            <label>Lớp</label>
            <input wire:model="f_lop" placeholder="K65CNPMA">
          </div>
          <div class="fi">
            <label>Khoa</label>
            <input wire:model="f_khoa" placeholder="Công nghệ Thông tin">
          </div>
          <div class="fi">
            <label>Năm tốt nghiệp</label>
            <input wire:model="f_nam" placeholder="2024">
            @error('f_nam')<div class="err">{{ $message }}</div>@enderror
          </div>
        </div>
        <div class="fi">
          <label>Ngành</label>
          <input wire:model="f_nganh" placeholder="Công nghệ Phần mềm">
        </div>
      </div>
      <div class="mo-ft">
        <button wire:click="closeModal" class="btn btn-ghost">Huỷ</button>
        <button wire:click="save" class="btn btn-prim">
          <span wire:loading wire:target="save">Đang lưu...</span>
          <span wire:loading.remove wire:target="save">{{ $editId ? 'Cập nhật' : 'Thêm mới' }}</span>
        </button>
      </div>
    </div>
  </div>
  @endif

  @if($showView && $viewUser)
  <div class="mo-bg" wire:click.self="closeView">
    <div class="mo">
      <div class="mo-hd">
        <div style="display:flex;align-items:center;gap:12px">
          <div class="uava" style="width:44px;height:44px;font-size:16px;background:#16a34a">{{ $viewUser->initials }}</div>
          <div>
            <div class="mo-title">{{ $viewUser->name }}</div>
            <div style="font-size:12px;color:#64748b;margin-top:2px">{{ $viewUser->email }}</div>
          </div>
        </div>
        <button class="mo-close" wire:click="closeView">✕</button>
      </div>
      <div class="mo-body">
        <div class="vgrid">
          <div class="vi"><label>MSV</label><p>{{ $viewUser->profile?->msv ?? '—' }}</p></div>
          <div class="vi"><label>Lớp</label><p>{{ $viewUser->profile?->lop ?? '—' }}</p></div>
          <div class="vi"><label>Năm TN</label><p>{{ $viewUser->profile?->nam_tot_nghiep ?? '—' }}</p></div>
          <div class="vi"><label>Khoa</label><p>{{ $viewUser->profile?->khoa ?? '—' }}</p></div>
          <div class="vi"><label>Vị trí</label><p class="{{ $viewUser->profile?->position ? '' : 'mt' }}">{{ $viewUser->profile?->position ?: 'Chưa cập nhật' }}</p></div>
          <div class="vi"><label>Công ty</label><p class="{{ $viewUser->profile?->current_company ? '' : 'mt' }}">{{ $viewUser->profile?->current_company ?: 'Chưa cập nhật' }}</p></div>
          <div class="vi"><label>Điện thoại</label><p class="{{ $viewUser->profile?->phone ? '' : 'mt' }}">{{ $viewUser->profile?->phone ?: 'Chưa cập nhật' }}</p></div>
          <div class="vi"><label>Địa chỉ</label><p class="{{ $viewUser->profile?->tinh_thanh ? '' : 'mt' }}">{{ $viewUser->profile?->tinh_thanh ?: 'Chưa cập nhật' }}</p></div>
          @php $st2 = $viewUser->profile?->status ?? 'pending'; @endphp
          <div class="vi"><label>Trạng thái</label>
            <span class="bd {{ match($st2) { 'active' => 'bd-g', 'pending' => 'bd-a', default => 'bd-r' } }}">
              {{ match($st2) { 'active' => 'Đã xác minh', 'pending' => 'Chờ duyệt', default => 'Từ chối' } }}
            </span>
          </div>
        </div>
      </div>
      <div class="mo-ft">
        <button wire:click="closeView" class="btn btn-ghost">Đóng</button>
      </div>
    </div>
  </div>
  @endif
    @if($showDelete)
  <div class="mo-bg" wire:click.self="closeDelete">
    <div class="mo" style="max-width:360px">
      <div class="cf-body">
        <div class="cf-ic">🗑</div>
        <div class="cf-title">Xoá khỏi danh sách?</div>
        <div class="cf-sub">Bạn sắp xoá <strong>{{ $deleteName }}</strong>.<br>Hành động này không thể hoàn tác.</div>
        <div class="cf-btns">
          <button wire:click="closeDelete" class="btn btn-ghost">Huỷ</button>
          <button wire:click="destroy" class="btn btn-del">
            <span wire:loading wire:target="destroy">Đang xoá...</span>
            <span wire:loading.remove wire:target="destroy">Xoá</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  @endif

  </div>
</div>