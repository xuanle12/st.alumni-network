<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
.aw{padding:1.5rem 1.75rem;display:flex;flex-direction:column;gap:1rem;min-height:100vh;background:#f8fafc}
.flash{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px}
.topbar{display:flex;align-items:center;justify-content:space-between;gap:10px;flex-wrap:wrap}
.tt{font-size:20px;font-weight:700;color:#0f172a}
.ts{font-size:13px;color:#64748b;margin-top:2px}
.btn-add{padding:8px 16px;border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;background:#16a34a;color:#fff;border:none;display:inline-flex;align-items:center;gap:6px;white-space:nowrap}
.btn-add:hover{background:#15803d}
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:12px}
.stat{
    background:#fff;
    border:1px solid #e2e8f0;
    border-radius:12px;
    padding:1.1rem 1.4rem;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:16px;
    transition:box-shadow .15s;
}
.stat:hover{box-shadow:0 4px 16px rgba(0,0,0,.07)}
.stat-left{display:flex;flex-direction:column;gap:4px}
.stat-l{font-size:12px;color:#64748b;font-weight:500}
.stat-n{font-size:28px;font-weight:700;line-height:1.1}
.stat-ic{
    width:44px;height:44px;
    border-radius:12px;
    display:flex;align-items:center;justify-content:center;
    font-size:14px;
    flex-shrink:0;
    color:#94a3b8;
}
.ic-b{background:#f0fdf4}.ic-g{background:#f0fdf4}.ic-p{background:#faf5ff}.ic-a{background:#fffbeb}
.n-b{color:#0f172a}.n-g{color:#16a34a}.n-p{color:#7c3aed}.n-a{color:#d97706}
.clogo{width:36px;height:36px;border-radius:9px;background:#f1f5f9;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#475569;flex-shrink:0}
.crow{display:flex;align-items:center;gap:10px}
.cn{font-size:13px;font-weight:600;color:#0f172a}
.ce{font-size:11px;color:#94a3b8;margin-top:1px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:140px}
.ct{font-size:12px;font-weight:500;color:#0f172a}
.cs{font-size:11px;color:#94a3b8;margin-top:1px}
.btn{display:inline-flex;align-items:center;gap:5px;padding:7px 16px;border-radius:8px;font-size:13px;font-weight:600;border:1px solid transparent;cursor:pointer;font-family:inherit;transition:all .15s}
.btn-ghost{background:transparent;border-color:#e2e8f0;color:#475569}
.btn-ghost:hover{background:#f8fafc}
.btn-prim{background:#16a34a;color:#fff}.btn-prim:hover{background:#15803d}
.btn-del{background:#fef2f2;color:#b91c1c;border-color:#fecaca}.btn-del:hover{background:#fee2e2}
.mo-bg{position:fixed;inset:0;background:rgba(0,0,0,0.4);display:flex;align-items:center;justify-content:center;z-index:999;padding:1rem}
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

.vrow{display:flex;gap:12px;align-items:flex-start;margin-bottom:12px}
.vlogo{width:50px;height:50px;border-radius:12px;background:#f1f5f9;border:1px solid #e2e8f0;display:flex;align-items:center;justify-content:center;font-size:18px;font-weight:700;color:#475569;flex-shrink:0}
.vg3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:.75rem}
.vg2{display:grid;grid-template-columns:1fr 1fr;gap:.75rem}
.vi label{display:block;font-size:10px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:#94a3b8;margin-bottom:3px}
.vi p{font-size:13px;font-weight:600;color:#0f172a}
.vi p.mt{color:#cbd5e1;font-style:italic;font-weight:400}
.vi a{font-size:12px;color:#16a34a;word-break:break-all}
.job-item{display:flex;align-items:center;gap:10px;padding:9px 12px;background:#f8fafc;border:1px solid #e2e8f0;border-radius:9px;margin-bottom:6px}
.ji-t{font-size:13px;font-weight:500;color:#0f172a}
.ji-m{font-size:11px;color:#94a3b8;margin-top:1px}


.cf-body{padding:2rem 1.5rem;text-align:center}
.cf-ic{font-size:34px;margin-bottom:10px}
.cf-t{font-size:15px;font-weight:700;color:#0f172a;margin-bottom:6px}
.cf-s{font-size:13px;color:#64748b;line-height:1.7;margin-bottom:1.25rem}
.cf-btns{display:flex;gap:10px;justify-content:center}

.empty{text-align:center;padding:3rem;color:#cbd5e1;font-size:13px}


@media(max-width:1024px){
  .aw{padding:1.25rem}
  .stats{grid-template-columns:repeat(2,1fr);gap:10px}
}
@media(max-width:768px){
  .aw{padding:1rem}
  .stats{grid-template-columns:repeat(2,1fr);gap:8px}
  .stat-n{font-size:22px}
  .tbl th:nth-child(5),.tbl td:nth-child(5){display:none}
  .dropdown{min-width:190px}
}
@media(max-width:480px){
  .aw{padding:.875rem}
  .stats{grid-template-columns:1fr 1fr;gap:8px}
  .stat{padding:.85rem 1rem}
  .stat-n{font-size:20px}
  .stat-l{font-size:11px}
  .stat-ic{width:36px;height:36px;font-size:16px}
  .topbar{flex-direction:column;align-items:flex-start;gap:8px}
  .btn-add{width:100%;justify-content:center}
  .tbl th:nth-child(2),.tbl td:nth-child(2){display:none}
  .mo{border-radius:12px 12px 0 0;max-width:100%;align-self:flex-end}
  .mo-bg{align-items:flex-end;padding:0}
  .vg3{grid-template-columns:1fr 1fr}
  .vg2{grid-template-columns:1fr}
  .fg2{grid-template-columns:1fr}
  .dropdown{min-width:200px}
}
@media(max-width:360px){
  .stats{grid-template-columns:1fr 1fr}
  .tbl th:nth-child(3),.tbl td:nth-child(3){display:none}
}
</style>

<div>
<div class="aw">

<div class="topbar">
  <div>
    <div class="tt">Doanh nghiệp</div>
    <div class="ts">Quản lý đối tác tuyển dụng</div>
  </div>
  <button class="btn-add" wire:click="openAdd">＋ Thêm doanh nghiệp</button>
</div>



<x-toolbar>
  <x-slot:search>
    <x-toolbar.search placeholder="Tìm tên, email, lĩnh vực..." />
  </x-slot:search>
  <x-toolbar.select model="filterStatus">
    <option value="">Tất cả trạng thái</option>
    <option value="active">Đang hợp tác</option>
    <option value="pending">Chờ duyệt</option>
    <option value="inactive">Ngừng hợp tác</option>
  </x-toolbar.select>
  <x-toolbar.select model="filterField">
    <option value="">Tất cả lĩnh vực</option>
    <option value="CNTT">CNTT</option>
    <option value="Tài chính">Tài chính</option>
    <option value="Thương mại">Thương mại</option>
    <option value="Sản xuất">Sản xuất</option>
    <option value="Giáo dục">Giáo dục</option>
  </x-toolbar.select>
</x-toolbar>

<x-table minWidth="680px">
  <x-slot:heading>
    <th style="width:5%">STT</th>
    <th style="width:25%">Doanh nghiệp</th>
    <th style="width:14%">Lĩnh vực</th>
    <th style="width:13%">Trạng thái</th>
    <th style="width:22%">Liên hệ</th>
    <th style="width:10%;text-align:right">Thao tác</th>
  </x-slot:heading>

  @forelse($companies as $c)
  @php
    $statusColor = match($c->status) { 'active'=>'green', 'pending'=>'yellow', default=>'red' };
    $statusLabel = match($c->status) { 'active'=>'Đang hợp tác', 'pending'=>'Chờ duyệt', default=>'Ngừng HT' };
  @endphp
  <tr>
    <td style="color:#94a3b8;font-size:12px;font-weight:600">{{ $loop->iteration }}</td>
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
    <td><x-badge :color="$statusColor">{{ $statusLabel }}</x-badge></td>
    <td>
      <div class="ct">{{ $c->contact_name ?: '—' }}</div>
      <div class="ce">{{ $c->contact_email ?: '—' }}</div>
    </td>
    <td style="text-align:right">
      <x-table.action-btn>
        <div class="adm-dd-item" wire:click="openView({{ $c->id }})">
          <i class="fa-solid fa-eye"></i> Xem chi tiết
        </div>
        @if($c->status === 'pending')
        <div class="adm-dd-item green" wire:click="quickApprove({{ $c->id }})" wire:confirm="Duyệt doanh nghiệp {{ $c->name }}?">
          <i class="fa-solid fa-check"></i> Duyệt
        </div>
        @endif
        <div class="adm-dd-sep"></div>
        <div class="adm-dd-item" wire:click="openEdit({{ $c->id }})">
          <i class="fa-solid fa-pen-to-square"></i> Chỉnh sửa
        </div>
        <div class="adm-dd-sep"></div>
        <div class="adm-dd-item red" wire:click="confirmDelete({{ $c->id }})">
          <i class="fa-solid fa-trash"></i> Xoá
        </div>
      </x-table.action-btn>
    </td>
  </tr>
  @empty
  <tr><td colspan="6" class="adm-tbl-empty">Không tìm thấy doanh nghiệp nào.</td></tr>
  @endforelse

  <x-slot:paginationInfo>Hiển thị {{ $companies->firstItem() ?? 0 }}–{{ $companies->lastItem() ?? 0 }} / {{ $companies->total() }} doanh nghiệp</x-slot:paginationInfo>
  <x-slot:pagination>{{ $companies->links() }}</x-slot:pagination>
</x-table>

</div>

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
            <option value="active">Đang hợp tác</option>
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
        <i class="fa-solid fa-pen-to-square"></i> {{ $viewCompany->admin_note }}
      </div>
      @endif
    </div>
    <div class="mo-ft">
      <button wire:click="closeView" class="btn btn-ghost">Đóng</button>
      <button wire:click="openEdit({{ $viewCompany->id }})" class="btn btn-prim"> Chỉnh sửa</button>
    </div>
  </div>
</div>
@endif

@if($showDelete)
<div class="mo-bg" wire:click.self="closeDelete">
  <div class="mo" style="max-width:360px">
    <div class="cf-body">
      <div class="cf-ic"><i class="fas fa-trash"></i>
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
