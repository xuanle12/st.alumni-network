<div>
    <style>
/* ── RESET ── */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

/* ── WRAP ── */
.aw{padding:1.5rem 1.75rem;display:flex;flex-direction:column;gap:1rem;min-height:100vh;background:#f8fafc}

/* ── FLASH ── */
.flash{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px}

/* ── TOPBAR ── */
.topbar{display:flex;align-items:center;justify-content:space-between;gap:10px;flex-wrap:wrap}
.tt{font-size:17px;font-weight:700;color:#0f172a}
.ts{font-size:12px;color:#64748b;margin-top:2px}
.btn-add{padding:8px 16px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;background:#1d4ed8;color:#fff;border:none;display:inline-flex;align-items:center;gap:6px;white-space:nowrap}
.btn-add:hover{background:#1e40af}

/* ── STATS ── */
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:12px}
.stat{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:1rem 1.1rem}
.stat-ic{width:32px;height:32px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:15px;margin-bottom:9px}
.ic-b{background:#eff6ff}.ic-g{background:#f0fdf4}.ic-p{background:#faf5ff}.ic-a{background:#fffbeb}
.stat-n{font-size:24px;font-weight:700}
.stat-l{font-size:11px;color:#64748b;margin-top:3px}
.n-b{color:#0f172a}.n-g{color:#16a34a}.n-p{color:#7c3aed}.n-a{color:#d97706}

/* ── TOOLBAR ── */
.toolbar{display:flex;gap:8px;flex-wrap:wrap}
.sw{flex:1;min-width:180px;position:relative}
.sw input{width:100%;padding:9px 12px 9px 34px;background:#fff;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;color:#0f172a;font-family:inherit}
.sw input:focus{outline:none;border-color:#3b82f6}
.sw input::placeholder{color:#94a3b8}
.sw-ic{position:absolute;left:11px;top:50%;transform:translateY(-50%);font-size:13px;color:#94a3b8}
.sel{padding:9px 10px;background:#fff;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;color:#475569;font-family:inherit;min-width:140px}
.sel:focus{outline:none;border-color:#3b82f6}

/* ── TABLE ── */
.tcard{background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden}
.tbl-wrap{overflow-x:auto;-webkit-overflow-scrolling:touch}
.tbl{width:100%;border-collapse:collapse;table-layout:fixed;min-width:680px}
.tbl th{padding:10px 14px;font-size:10.5px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#94a3b8;text-align:left;background:#f8fafc;border-bottom:1px solid #e2e8f0;white-space:nowrap}
.tbl td{padding:12px 14px;border-bottom:1px solid #f1f5f9;vertical-align:middle}
.tbl tr:last-child td{border-bottom:none}
.tbl tbody tr:hover td{background:#fafbfc}

/* ── COMPANY ROW ── */
.clogo{width:36px;height:36px;border-radius:9px;background:#f1f5f9;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#475569;flex-shrink:0}
.crow{display:flex;align-items:center;gap:10px}
.cn{font-size:13px;font-weight:600;color:#0f172a}
.ce{font-size:11px;color:#94a3b8;margin-top:1px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:140px}
.ct{font-size:12px;font-weight:500;color:#0f172a}
.cs{font-size:11px;color:#94a3b8;margin-top:1px}

/* ── BADGES ── */
.bd{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:600;padding:3px 9px;border-radius:20px;white-space:nowrap}
.bd::before{content:'';width:5px;height:5px;border-radius:50%;flex-shrink:0}
.bd-g{background:#f0fdf4;color:#15803d}.bd-g::before{background:#16a34a}
.bd-a{background:#fffbeb;color:#b45309}.bd-a::before{background:#d97706}
.bd-r{background:#fef2f2;color:#b91c1c}.bd-r::before{background:#dc2626}

/* ── JOB COUNT ── */
.jc{display:inline-flex;align-items:center;gap:5px;font-size:12px;font-weight:500;color:#0f172a}
.jc-dot{width:20px;height:20px;border-radius:6px;background:#eff6ff;color:#1d4ed8;font-size:10px;font-weight:700;display:flex;align-items:center;justify-content:center}

/* ── 3 GẠCH ── */
.dot-wrap{position:relative;display:inline-block}
.dot-btn{width:30px;height:30px;border-radius:7px;border:1px solid #e2e8f0;background:transparent;cursor:pointer;color:#94a3b8;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:3px}
.dot-btn:hover{background:#f1f5f9}
.dot-btn span{display:block;width:13px;height:1.5px;background:currentColor;border-radius:2px}
.dropdown{display:none;position:absolute;top:34px;right:0;background:#fff;border:1px solid #e2e8f0;border-radius:10px;min-width:168px;z-index:999;overflow:hidden;box-shadow:0 8px 24px rgba(0,0,0,.1)}
.dropdown.open{display:block}
.dd-item{padding:9px 14px;font-size:13px;cursor:pointer;display:flex;align-items:center;gap:9px;color:#334155}
.dd-item:hover{background:#f8fafc}
.dd-item.green{color:#15803d}.dd-item.green:hover{background:#f0fdf4}
.dd-item.red{color:#b91c1c}.dd-item.red:hover{background:#fef2f2}
.dd-sep{height:1px;background:#f1f5f9;margin:3px 0}

/* ── PAGINATION ── */
.pgn{display:flex;justify-content:space-between;align-items:center;padding:.875rem 1rem;border-top:1px solid #f1f5f9;background:#fafafa;flex-wrap:wrap;gap:8px}
.pgn-info{font-size:12px;color:#94a3b8}

/* ── BUTTONS ── */
.btn{display:inline-flex;align-items:center;gap:5px;padding:7px 16px;border-radius:8px;font-size:13px;font-weight:600;border:1px solid transparent;cursor:pointer;font-family:inherit;transition:all .15s}
.btn-ghost{background:transparent;border-color:#e2e8f0;color:#475569}
.btn-ghost:hover{background:#f8fafc}
.btn-prim{background:#1d4ed8;color:#fff}.btn-prim:hover{background:#1e40af}
.btn-del{background:#fef2f2;color:#b91c1c;border-color:#fecaca}.btn-del:hover{background:#fee2e2}

/* ── MODAL ── */
.mo-bg{position:fixed;inset:0;background:rgba(15,23,42,.5);display:flex;align-items:center;justify-content:center;z-index:999;padding:1rem}
.mo{background:#fff;border-radius:14px;width:100%;max-width:580px;max-height:92vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,.2)}
.mo-hd{padding:1.1rem 1.4rem;border-bottom:1px solid #f1f5f9;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;background:#fff;z-index:1}
.mo-title{font-size:15px;font-weight:700;color:#0f172a}
.mo-close{width:28px;height:28px;border-radius:8px;border:1px solid #e2e8f0;background:transparent;cursor:pointer;color:#94a3b8;font-size:16px;display:flex;align-items:center;justify-content:center}
.mo-body{padding:1.25rem 1.4rem;display:flex;flex-direction:column;gap:12px}
.mo-sec{font-size:10px;font-weight:700;text-transform:uppercase;letter-spacing:.07em;color:#94a3b8}
.fg2{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.fi{display:flex;flex-direction:column;gap:4px}
.fi label{font-size:12px;font-weight:600;color:#475569}
.fi input,.fi select,.fi textarea{width:100%;padding:8px 10px;border:1px solid #e2e8f0;border-radius:9px;font-size:13px;color:#0f172a;font-family:inherit;background:#fff}
.fi input:focus,.fi select:focus,.fi textarea:focus{outline:none;border-color:#3b82f6;box-shadow:0 0 0 3px #3b82f611}
.fi textarea{resize:vertical;min-height:64px}
.fi .err{font-size:11px;color:#dc2626}
.mdiv{border:none;border-top:1px solid #f1f5f9}
.mo-ft{padding:.875rem 1.4rem;border-top:1px solid #f1f5f9;display:flex;justify-content:flex-end;gap:8px;position:sticky;bottom:0;background:#fff}

/* ── VIEW MODAL ── */
.vrow{display:flex;gap:12px;align-items:flex-start;margin-bottom:12px}
.vlogo{width:50px;height:50px;border-radius:12px;background:#f1f5f9;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;font-size:18px;font-weight:700;color:#475569;flex-shrink:0}
.vg3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:.75rem}
.vg2{display:grid;grid-template-columns:1fr 1fr;gap:.75rem}
.vi label{display:block;font-size:10px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#94a3b8;margin-bottom:3px}
.vi p{font-size:13px;font-weight:600;color:#0f172a}
.vi p.mt{color:#cbd5e1;font-style:italic;font-weight:400}
.vi a{font-size:12px;color:#1d4ed8;word-break:break-all}
.job-item{display:flex;align-items:center;gap:10px;padding:9px 12px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:9px;margin-bottom:6px}
.ji-t{font-size:13px;font-weight:500;color:#0f172a}
.ji-m{font-size:11px;color:#94a3b8;margin-top:1px}

/* ── CONFIRM ── */
.cf-body{padding:2rem 1.5rem;text-align:center}
.cf-ic{font-size:34px;margin-bottom:10px}
.cf-t{font-size:15px;font-weight:700;color:#0f172a;margin-bottom:6px}
.cf-s{font-size:13px;color:#64748b;line-height:1.7;margin-bottom:1.25rem}
.cf-btns{display:flex;gap:10px;justify-content:center}

/* ── EMPTY ── */
.empty{text-align:center;padding:3rem;color:#cbd5e1;font-size:13px}

/* ════════════════════════════
   RESPONSIVE
════════════════════════════ */

/* Tablet: 2 cột stat, ẩn cột ít quan trọng */
@media(max-width:1024px){
  .aw{padding:1.25rem}
  .stats{grid-template-columns:repeat(2,1fr);gap:10px}
}

/* Tablet nhỏ */
@media(max-width:768px){
  .aw{padding:1rem}
  .stats{grid-template-columns:repeat(2,1fr);gap:8px}
  .stat-n{font-size:20px}
  .toolbar{flex-direction:column}
  .sw{width:100%}
  .sel{width:100%}
  /* ẩn cột liên hệ trên tablet */
  .tbl th:nth-child(5),.tbl td:nth-child(5){display:none}
}

/* Mobile */
@media(max-width:480px){
  .aw{padding:.875rem}
  .stats{grid-template-columns:1fr 1fr;gap:8px}
  .stat{padding:.75rem .875rem}
  .stat-n{font-size:18px}
  .stat-l{font-size:10px}
  .topbar{flex-direction:column;align-items:flex-start;gap:8px}
  .btn-add{width:100%;justify-content:center}
  /* ẩn thêm cột lĩnh vực */
  .tbl th:nth-child(2),.tbl td:nth-child(2){display:none}
  /* modal full width */
  .mo{border-radius:12px 12px 0 0;max-width:100%;align-self:flex-end}
  .mo-bg{align-items:flex-end;padding:0}
  /* modal view grid 1 cột */
  .vg3{grid-template-columns:1fr 1fr}
  .vg2{grid-template-columns:1fr}
  /* form 1 cột */
  .fg2{grid-template-columns:1fr}
}

@media(max-width:360px){
  .stats{grid-template-columns:1fr 1fr}
  .tbl th:nth-child(3),.tbl td:nth-child(3){display:none}
}
</style>

<div>
<div class="aw">

@if(session('success'))
  <div class="flash">✓ {{ session('success') }}</div>
@endif

{{-- topbar --}}
<div class="topbar">
  <div>
    <div class="tt">Doanh nghiệp</div>
    <div class="ts">Quản lý đối tác tuyển dụng</div>
  </div>
  <button class="btn-add" wire:click="openAdd">＋ Thêm doanh nghiệp</button>
</div>


<div class="stats">
  <div class="stat"><div class="stat-ic ic-b"><i class="fa-solid fa-building"></i></div><div class="stat-n n-b">{{ $stats['total'] }}</div><div class="stat-l">Tổng doanh nghiệp</div></div>
  <div class="stat"><div class="stat-ic ic-g"><i class="fa-solid fa-circle-check"></i></div><div class="stat-n n-g">{{ $stats['active'] }}</div><div class="stat-l">Đang hợp tác</div></div>
  <div class="stat"><div class="stat-ic ic-p"><i class="fa-solid fa-list"></i></div><div class="stat-n n-p">{{ $stats['jobs'] }}</div><div class="stat-l">Tin tuyển dụng</div></div>
  <div class="stat"><div class="stat-ic ic-a"><i class="fa-solid fa-clock"></i></div><div class="stat-n n-a">{{ $stats['pending'] }}</div><div class="stat-l">Chờ duyệt</div></div>
</div>


<div class="toolbar">
  <div class="sw">
    <span class="sw-ic"><i class="fa-solid fa-magnifying-glass"></i></span>
    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Tìm tên, email, lĩnh vực...">
  </div>
  <select wire:model.live="filterStatus" class="sel">
    <option value="">Tất cả trạng thái</option>
    <option value="active">Đang hợp tác</option>
    <option value="pending">Chờ duyệt</option>
    <option value="inactive">Ngừng hợp tác</option>
  </select>
  <select wire:model.live="filterField" class="sel">
    <option value="">Tất cả lĩnh vực</option>
    <option value="CNTT">CNTT</option>
    <option value="Tài chính">Tài chính</option>
    <option value="Thương mại">Thương mại</option>
    <option value="Sản xuất">Sản xuất</option>
    <option value="Giáo dục">Giáo dục</option>
  </select>
</div>

{{-- table --}}
<div class="tcard">
  <div class="tbl-wrap">
    <table class="tbl">
      <thead>
        <tr>
          <th style="width:30%">Doanh nghiệp</th>
          <th style="width:14%">Lĩnh vực</th>
          <th style="width:11%">Tin đăng</th>
          <th style="width:13%">Trạng thái</th>
          <th style="width:22%">Liên hệ</th>
          <th style="width:10%;text-align:right">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @forelse($companies as $c)
        @php
          $bc = match($c->status) { 'active' => 'bd-g', 'pending' => 'bd-a', default => 'bd-r' };
          $bl = match($c->status) { 'active' => 'Đang hợp tác', 'pending' => 'Chờ duyệt', default => 'Ngừng HT' };
        @endphp
        <tr>
          <td>
            <div class="crow">
              <div class="clogo">{{ $c->initials }}</div>
              <div style="min-width:0">
                <div class="cn">{{ $c->name }}</div>
                <div class="ce">{{ $c->website ?: 'Chưa cập nhật' }}</div>
              </div>
            </div>
          </td>
          <td>
            <div class="ct">{{ $c->field ?: '—' }}</div>
            <div class="cs">{{ $c->size ?: '—' }}</div>
          </td>
          <td>
            <div class="jc">
              <div class="jc-dot">{{ $c->job_postings_count }}</div>
              tin
            </div>
          </td>
          <td><span class="bd {{ $bc }}">{{ $bl }}</span></td>
          <td>
            <div class="ct">{{ $c->contact_name ?: '—' }}</div>
            <div class="ce">{{ $c->contact_email ?: '—' }}</div>
          </td>
          <td style="text-align:right">
            <div class="dot-wrap" x-data="{ open: false }" @click.away="open = false">
              <button class="dot-btn" @click="open = !open">
                <span></span><span></span><span></span>
              </button>
              <div class="dropdown" :class="{ open: open }">
                <div class="dd-item" @click="open=false" wire:click="openView({{ $c->id }})">
                  Xem chi tiết
                </div>
                @if($c->status === 'pending')
                <div class="dd-item green" @click="open=false"
                     wire:click="quickApprove({{ $c->id }})"
                     wire:confirm="Duyệt doanh nghiệp {{ $c->name }}?">
                  Duyệt
                </div>
                @endif
                <div class="dd-sep"></div>
                <div class="dd-item" @click="open=false" wire:click="openEdit({{ $c->id }})">
                   Chỉnh sửa
                </div>
                <div class="dd-sep"></div>
                <div class="dd-item red" @click="open=false" wire:click="confirmDelete({{ $c->id }})">
                  Xoá
                </div>
              </div>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6"><div class="empty"> Không tìm thấy doanh nghiệp nào.</div></td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="pgn">
    <div class="pgn-info">
      Hiển thị {{ $companies->firstItem() }}–{{ $companies->lastItem() }} / {{ $companies->total() }}
    </div>
    {{ $companies->links() }}
  </div>
</div>

</div>

{{-- ══ MODAL THÊM/SỬA ══ --}}
@if($showModal)
<div class="mo-bg" wire:click.self="closeModal">
  <div class="mo">
    <div class="mo-hd">
      <div class="mo-title">{{ $editId ? 'Chỉnh sửa doanh nghiệp' : 'Thêm doanh nghiệp' }}</div>
      <button class="mo-close" wire:click="closeModal">✕</button>
    </div>
    <div class="mo-body">

      <div class="mo-sec">Thông tin cơ bản</div>
      <div class="fg2">
        <div class="fi">
          <label>Tên doanh nghiệp *</label>
          <input wire:model="f_name" placeholder="FPT Software">
          @error('f_name')<div class="err">{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Lĩnh vực</label>
          <select wire:model="f_field">
            <option value="">-- Chọn --</option>
            <option value="CNTT">CNTT / Phần mềm</option>
            <option value="Tài chính">Tài chính / Ngân hàng</option>
            <option value="Thương mại">Thương mại / Bán lẻ</option>
            <option value="Sản xuất">Sản xuất / Công nghiệp</option>
            <option value="Giáo dục">Giáo dục / Đào tạo</option>
            <option value="Khác">Khác</option>
          </select>
        </div>
      </div>
      <div class="fg2">
        <div class="fi">
          <label>Website</label>
          <input wire:model="f_web" placeholder="https://company.com">
          @error('f_web')<div class="err">{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Quy mô</label>
          <select wire:model="f_size">
            <option value="">-- Chọn --</option>
            <option value="1-50">1–50 nhân viên</option>
            <option value="51-200">51–200 nhân viên</option>
            <option value="201-1000">201–1000 nhân viên</option>
            <option value="1000+">Trên 1000 nhân viên</option>
          </select>
        </div>
      </div>
      <div class="fi">
        <label>Địa chỉ</label>
        <input wire:model="f_addr" placeholder="17 Duy Tân, Cầu Giấy, Hà Nội">
      </div>
      <div class="fi">
        <label>Mô tả</label>
        <textarea wire:model="f_desc" placeholder="Mô tả ngắn về doanh nghiệp..."></textarea>
      </div>

      <hr class="mdiv">
      <div class="mo-sec">Người liên hệ</div>
      <div class="fg2">
        <div class="fi">
          <label>Họ tên</label>
          <input wire:model="f_cname" placeholder="Nguyễn Văn A">
        </div>
        <div class="fi">
          <label>Chức vụ</label>
          <input wire:model="f_cpos" placeholder="HR Manager">
        </div>
      </div>
      <div class="fg2">
        <div class="fi">
          <label>Email</label>
          <input wire:model="f_email" type="email" placeholder="hr@company.com">
          @error('f_email')<div class="err">{{ $message }}</div>@enderror
        </div>
        <div class="fi">
          <label>Điện thoại</label>
          <input wire:model="f_phone" placeholder="0912 345 678">
        </div>
      </div>

      <hr class="mdiv">
      <div class="mo-sec">Trạng thái</div>
      <div class="fg2">
        <div class="fi">
          <label>Trạng thái hợp tác</label>
          <select wire:model="f_status">
            <option value="active"> Đang hợp tác</option>
            <option value="pending">Chờ duyệt</option>
            <option value="inactive">Ngừng hợp tác</option>
          </select>
        </div>
        <div class="fi">
          <label>Ghi chú admin</label>
          <input wire:model="f_note" placeholder="Ghi chú thêm...">
        </div>
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

{{-- ══ MODAL XEM ══ --}}
@if($showView && $viewCompany)
<div class="mo-bg" wire:click.self="closeView">
  <div class="mo">
    <div class="mo-hd">
      <div style="display:flex;align-items:center;gap:12px;min-width:0">
        <div class="vlogo">{{ $viewCompany->initials }}</div>
        <div style="min-width:0">
          <div class="mo-title">{{ $viewCompany->name }}</div>
          <div style="font-size:12px;color:#64748b;margin-top:2px">
            {{ $viewCompany->field }} @if($viewCompany->size) · {{ $viewCompany->size }} @endif
          </div>
        </div>
      </div>
      <button class="mo-close" wire:click="closeView" style="flex-shrink:0">✕</button>
    </div>
    <div class="mo-body">
      @php
        $bc2 = match($viewCompany->status) { 'active' => 'bd-g', 'pending' => 'bd-a', default => 'bd-r' };
        $bl2 = match($viewCompany->status) { 'active' => 'Đang hợp tác', 'pending' => 'Chờ duyệt', default => 'Ngừng HT' };
      @endphp
      <span class="bd {{ $bc2 }}">{{ $bl2 }}</span>

      <div class="vg3">
        <div class="vi"><label>Quy mô</label><p>{{ $viewCompany->size ?: '—' }}</p></div>
        <div class="vi"><label>Website</label>
          @if($viewCompany->website)
            <a href="{{ $viewCompany->website }}" target="_blank">{{ $viewCompany->website }}</a>
          @else <p class="mt">Chưa cập nhật</p> @endif
        </div>
        <div class="vi"><label>Địa chỉ</label><p class="{{ $viewCompany->address ? '' : 'mt' }}">{{ $viewCompany->address ?: 'Chưa cập nhật' }}</p></div>
      </div>

      @if($viewCompany->description)
      <div class="vi">
        <label>Mô tả</label>
        <p style="font-weight:400;color:#374151;line-height:1.7">{{ $viewCompany->description }}</p>
      </div>
      @endif

      <hr class="mdiv">
      <div class="mo-sec" style="margin-bottom:8px">Người liên hệ</div>
      <div class="vg2">
        <div class="vi"><label>Họ tên</label><p class="{{ $viewCompany->contact_name ? '' : 'mt' }}">{{ $viewCompany->contact_name ?: 'Chưa cập nhật' }}</p></div>
        <div class="vi"><label>Chức vụ</label><p class="{{ $viewCompany->contact_position ? '' : 'mt' }}">{{ $viewCompany->contact_position ?: '—' }}</p></div>
        <div class="vi"><label>Email</label><p class="{{ $viewCompany->contact_email ? '' : 'mt' }}">{{ $viewCompany->contact_email ?: 'Chưa cập nhật' }}</p></div>
        <div class="vi"><label>Điện thoại</label><p class="{{ $viewCompany->contact_phone ? '' : 'mt' }}">{{ $viewCompany->contact_phone ?: 'Chưa cập nhật' }}</p></div>
      </div>

      @if($viewCompany->job->count() > 0)
      <hr class="mdiv">
      <div class="mo-sec" style="margin-bottom:8px">Tin tuyển dụng ({{ $viewCompany->job_postings_count }})</div>
      @foreach($viewCompany->job->take(5) as $job)
      <div class="job-item">
        <div style="flex:1;min-width:0">
          <div class="ji-t">{{ $job->title }}</div>
          <div class="ji-m">{{ $job->type ?? '—' }} · {{ $job->location ?? '—' }}</div>
        </div>
        <span class="bd {{ $job->status === 'active' ? 'bd-g' : 'bd-a' }}">
          {{ $job->status === 'active' ? 'Đang mở' : 'Đã đóng' }}
        </span>
      </div>
      @endforeach
      @endif

      @if($viewCompany->admin_note)
      <div style="background:#fffbeb;border:1px solid #fde68a;border-radius:8px;padding:10px 12px;font-size:13px;color:#92400e">
        <i class="fa-solid fa-pen-to-square"></i>{{ $viewCompany->admin_note }}
      </div>
      @endif
    </div>
    <div class="mo-ft">
      <button wire:click="closeView" class="btn btn-ghost">Đóng</button>
      <button wire:click="openEdit({{ $viewCompany->id }})" class="btn btn-prim">✎ Chỉnh sửa</button>
    </div>
  </div>
</div>
@endif

{{-- ══ CONFIRM XOÁ ══ --}}
@if($showDelete)
<div class="mo-bg" wire:click.self="closeDelete">
  <div class="mo" style="max-width:360px">
    <div class="cf-body">
      <div class="cf-ic">🗑</div>
      <div class="cf-t">Xoá doanh nghiệp?</div>
      <div class="cf-s">Bạn sắp xoá <strong>{{ $deleteName }}</strong>.<br>Hành động này không thể hoàn tác.</div>
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
