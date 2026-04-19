<div>
    <style>
.dash{padding:1.75rem}
.topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.75rem}
.ptitle{font-size:20px;font-weight:600;color:#111;letter-spacing:-.3px}
.psub{font-size:12px;color:#9ca3af;margin-top:3px}
.flash-ok{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px;margin-bottom:1rem}
.btn-prim{padding:7px 16px;background:#111;color:#fff;border:none;border-radius:7px;font-size:13px;cursor:pointer;font-family:inherit;display:inline-flex;align-items:center;gap:5px}
.btn-prim:hover{background:#333}
.stats-sm{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-bottom:1.25rem}
.stat-sm{background:#fff;border:1px solid #eaecf0;border-radius:8px;padding:.75rem 1rem;display:flex;justify-content:space-between;align-items:center}
.stat-sm-label{font-size:11px;color:#9ca3af;margin-bottom:3px}
.stat-sm-val{font-size:18px;font-weight:600;color:#111}
.toolbar{display:flex;gap:8px;margin-bottom:1rem;flex-wrap:wrap}
.tb-in{flex:1;min-width:180px;padding:7px 11px;border:1px solid #d1d5db;border-radius:7px;font-size:13px;color:#111;background:#fff}
.tb-in:focus,.tb-sel:focus{outline:none;border-color:#3b82f6}
.tb-sel{padding:7px 11px;border:1px solid #d1d5db;border-radius:7px;font-size:13px;color:#374151;background:#fff}
.card{background:#fff;border:1px solid #eaecf0;border-radius:8px;overflow:hidden}
table{width:100%;border-collapse:collapse}
thead th{font-size:10px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;color:#9ca3af;padding:10px 12px;text-align:left;border-bottom:1px solid #eaecf0;background:#fafafa}
tbody tr{border-bottom:1px solid #f3f4f6;transition:background .1s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:#fafafa}
td{padding:10px 12px;font-size:12px;color:#374151;vertical-align:middle}
.badge{display:inline-block;font-size:10px;font-weight:500;padding:2px 8px;border-radius:4px}
.bg{background:#f0fdf4;color:#166534}.by{background:#fef9c3;color:#92400e}
.bp{background:#f5f3ff;color:#5b21b6}.bc{background:#eff6ff;color:#1e40af}
.tog{width:36px;height:20px;border-radius:10px;border:none;cursor:pointer;position:relative;flex-shrink:0;transition:background .2s}
.tog::after{content:'';position:absolute;top:2px;left:2px;width:16px;height:16px;border-radius:50%;background:#fff;transition:transform .2s}
.tog.on{background:#16a34a}.tog.on::after{transform:translateX(16px)}.tog.off{background:#d1d5db}
.pager{display:flex;justify-content:space-between;align-items:center;padding:10px 12px;border-top:1px solid #eaecf0;font-size:12px;color:#9ca3af}
 
/* Dropdown 3 gạch */
.dd-wrap{position:relative;display:inline-block}
.dd-btn{width:30px;height:30px;border:1px solid #e5e7eb;border-radius:6px;background:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:2.5px;padding:0}
.dd-btn:hover{background:#f3f4f6}
.dd-dot{width:3px;height:3px;border-radius:50%;background:#9ca3af;display:block}
.dd-menu{position:absolute;right:0;top:34px;background:#fff;border:1px solid #e5e7eb;border-radius:8px;box-shadow:0 4px 16px rgba(0,0,0,.1);min-width:150px;z-index:30;overflow:hidden}
.dd-item{display:flex;align-items:center;gap:8px;padding:9px 13px;font-size:12px;color:#374151;cursor:pointer;transition:background .1s}
.dd-item:hover{background:#f9fafb}
.dd-item.red{color:#dc2626}
.dd-item.red:hover{background:#fef2f2}
.dd-sep{height:1px;background:#f3f4f6}
 
/* Modal */
.modal-bg{position:fixed;inset:0;background:rgba(0,0,0,.45);display:flex;align-items:center;justify-content:center;z-index:50}
.modal{background:#fff;border-radius:12px;padding:1.5rem;width:520px;max-width:92vw;max-height:90vh;overflow-y:auto}
.modal-title{font-size:15px;font-weight:600;color:#111;margin-bottom:1.25rem;display:flex;justify-content:space-between;align-items:center}
.close-btn{background:none;border:none;font-size:22px;color:#9ca3af;cursor:pointer;line-height:1;padding:0}
.close-btn:hover{color:#374151}
.fg{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.fi{display:flex;flex-direction:column;gap:4px}
.fi.full{grid-column:1/-1}
.fi label{font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:.4px}
.fi input,.fi select,.fi textarea{padding:8px 10px;border:1px solid #d1d5db;border-radius:7px;font-size:13px;color:#111;font-family:inherit;width:100%}
.fi input:focus,.fi select:focus,.fi textarea:focus{outline:none;border-color:#3b82f6}
.fi textarea{resize:vertical;min-height:80px}
.err{font-size:11px;color:#dc2626;margin-top:2px}
.modal-footer{display:flex;justify-content:flex-end;gap:8px;margin-top:1.25rem;padding-top:1rem;border-top:1px solid #eaecf0}
.btn-xs{font-size:12px;padding:6px 12px;border-radius:6px;border:1px solid #d1d5db;background:#fff;color:#374151;cursor:pointer;font-family:inherit}
.btn-xs:hover{background:#f9fafb}
.btn-del-sm{border-color:#fca5a5;color:#dc2626;background:#fef2f2}
.btn-del-sm:hover{background:#fee2e2}
 
/* Detail */
.d-hero{background:#f8f9fc;border-radius:8px;padding:1.25rem;margin-bottom:1.25rem;display:flex;align-items:center;gap:14px}
.d-ico{font-size:36px;flex-shrink:0}
.d-grid{display:grid;grid-template-columns:1fr 1fr;gap:.875rem;margin-bottom:1.25rem}
.dg label{font-size:10px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.4px;display:block;margin-bottom:3px}
.dg p{font-size:13px;color:#374151;font-weight:500}
.dg p.mt{color:#c4cdd6;font-style:italic;font-weight:400}
.d-desc{background:#f8f9fc;border-radius:8px;padding:1rem;font-size:13px;color:#374151;line-height:1.7;margin-bottom:1.25rem}
.d-footer{display:flex;justify-content:space-between;align-items:center;padding-top:1rem;border-top:1px solid #eaecf0}
 
@media(max-width:900px){.stats-sm{grid-template-columns:1fr 1fr}}
@media(max-width:600px){.fg{grid-template-columns:1fr}.fi.full{grid-column:1}}
</style>
<div>
    <div class="dash">
  <div class="topbar">
    <div><div class="ptitle">Tuyển dụng</div><div class="psub">Quản lý tin tuyển dụng · {{ now()->format('d/m/Y') }}</div></div>
    <button class="btn-prim" wire:click="openCreate">+ Thêm tin</button>
  </div>
 
  @if(session('success'))
    <div class="flash-ok">✓ {{ session('success') }}</div>
  @endif
 
  <div class="stats-sm">
    <div class="stat-sm"><div><div class="stat-sm-label">Tổng tin</div><div class="stat-sm-val">{{ \App\Models\Job::count() }}</div></div><span style="font-size:20px">💼</span></div>
    <div class="stat-sm"><div><div class="stat-sm-label">Đang hiển thị</div><div class="stat-sm-val">{{ \App\Models\Job::where('is_active',true)->count() }}</div></div><span style="font-size:20px">✅</span></div>
    <div class="stat-sm"><div><div class="stat-sm-label">Thực tập</div><div class="stat-sm-val">{{ \App\Models\Job::where('type','internship')->count() }}</div></div><span style="font-size:20px">🎓</span></div>
    <div class="stat-sm"><div><div class="stat-sm-label">Tất cả khoa</div><div class="stat-sm-val">{{ \App\Models\Job::whereNull('khoa')->count() }}</div></div><span style="font-size:20px">🌐</span></div>
  </div>
 
  <div class="toolbar">
    <input class="tb-in" wire:model.live.debounce.300ms="search" type="text" placeholder="🔍  Tìm theo tiêu đề, công ty...">
    <select class="tb-sel" wire:model.live="type">
      <option value="">Tất cả loại</option>
      <option value="full-time">Full-time</option>
      <option value="part-time">Part-time</option>
      <option value="internship">Thực tập</option>
    </select>
    <select class="tb-sel" wire:model.live="khoa">
      <option value="">Tất cả khoa</option>
      @foreach($khoaList as $key => $label)
        <option value="{{ $key }}">{{ $label }}</option>
      @endforeach
    </select>
  </div>
 
  <div class="card">
    <table>
      <thead>
        <tr><th style="width:30%">Tin tuyển dụng</th><th>Công ty</th><th>Khoa</th><th>Loại</th><th>Lương</th><th>Hiển thị</th><th>Ngày đăng</th><th style="width:44px"></th></tr>
      </thead>
      <tbody>
        @forelse($jobs as $job)
        <tr wire:key="job-{{ $job->id }}">
          <td>
            <div style="display:flex;align-items:center;gap:9px">
              <span style="font-size:20px;flex-shrink:0">{{ $job->logo_emoji }}</span>
              <div style="min-width:0">
                <div style="font-weight:500;color:#111;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:200px">{{ $job->title }}</div>
                <div style="font-size:11px;color:#9ca3af">{{ $job->location ?? '—' }}@if($job->field) · {{ $job->field }}@endif</div>
              </div>
            </div>
          </td>
          <td style="font-weight:500">{{ $job->company }}</td>
          <td>
            @if($job->khoa)<span class="badge bc">{{ $job->khoa }}</span>
            @else<span class="badge" style="background:#f3f4f6;color:#6b7280">Tất cả</span>@endif
          </td>
          <td><span class="badge {{ $job->type==='internship'?'by':($job->type==='part-time'?'bp':'bg') }}">{{ $job->type_label }}</span></td>
          <td style="color:#6b7280">{{ $job->salary ?? '—' }}</td>
          <td><button wire:click="toggleActive({{ $job->id }})" class="tog {{ $job->is_active?'on':'off' }}"></button></td>
          <td style="color:#9ca3af;white-space:nowrap">{{ $job->created_at->format('d/m/Y') }}</td>
          <td>
          <div x-data="{ openId: null }"class="dd-wrap">              
            <button class="dd-btn" @click="open = !open">
                <span class="dd-dot"></span><span class="dd-dot"></span><span class="dd-dot"></span>
              </button>
              <div class="dd-menu" x-show="open" x-transition>
                <div class="dd-item" @click="open=false" wire:click="openDetail({{ $job->id }})">
                  <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="#374151" stroke-width="1.5"/><path d="M8 7v4M8 5v.01" stroke="#374151" stroke-width="1.5" stroke-linecap="round"/></svg>
                  Xem chi tiết
                </div>
                <div class="dd-item" @click="open=false" wire:click="openEdit({{ $job->id }})">
                  <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M11 2l3 3-8 8H3v-3l8-8z" stroke="#374151" stroke-width="1.5" stroke-linejoin="round"/></svg>
                  Chỉnh sửa
                </div>
                <div class="dd-sep"></div>
                <div class="dd-item red" @click="open=false" wire:click="delete({{ $job->id }})" wire:confirm="Xóa tin tuyển dụng này?">
                  <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M3 4h10M6 4V2h4v2M5 4v9h6V4" stroke="#dc2626" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  Xóa
                </div>
              </div>
            </div>
          </td>
        </tr>
        @empty
          <tr><td colspan="8" style="text-align:center;color:#9ca3af;padding:2rem">Không tìm thấy tin nào</td></tr>
        @endforelse
      </tbody>
    </table>
    <div class="pager">
      <span>Hiển thị {{ $jobs->firstItem()??0 }}–{{ $jobs->lastItem()??0 }} trong {{ $jobs->total() }} tin</span>
      {{ $jobs->links() }}
    </div>
  </div>
</div>
 
{{-- MODAL XEM CHI TIẾT --}}
@if($showDetail && $detail)
<div class="modal-bg" wire:click.self="$set('showDetail', false)">
  <div class="modal">
    <div class="modal-title">Chi tiết tin tuyển dụng<button class="close-btn" wire:click="$set('showDetail', false)">×</button></div>
    <div class="d-hero">
      <div class="d-ico">{{ $detail->logo_emoji }}</div>
      <div>
        <div style="font-size:15px;font-weight:600;color:#111">{{ $detail->title }}</div>
        <div style="font-size:12px;color:#6b7280;margin-top:2px">{{ $detail->company }}@if($detail->location) · {{ $detail->location }}@endif</div>
        <div style="margin-top:8px;display:flex;gap:6px;flex-wrap:wrap">
          <span class="badge {{ $detail->type==='internship'?'by':'bg' }}">{{ $detail->type_label }}</span>
          @if($detail->khoa)<span class="badge bc">{{ $detail->khoa_label }}</span>
          @else<span class="badge" style="background:#f3f4f6;color:#6b7280">Tất cả khoa</span>@endif
          <span class="badge {{ $detail->is_active?'bg':'' }}" style="{{ $detail->is_active?'':'background:#f3f4f6;color:#9ca3af' }}">{{ $detail->is_active?'Đang hiển thị':'Đã ẩn' }}</span>
        </div>
      </div>
    </div>
    <div class="d-grid">
      <div class="dg"><label>Mức lương</label><p class="{{ $detail->salary?'':'mt' }}">{{ $detail->salary??'Chưa cập nhật' }}</p></div>
      <div class="dg"><label>Ngành nghề</label><p class="{{ $detail->field?'':'mt' }}">{{ $detail->field??'Chưa cập nhật' }}</p></div>
      <div class="dg"><label>Email liên hệ</label><p class="{{ $detail->contact_email?'':'mt' }}">{{ $detail->contact_email??'Chưa cập nhật' }}</p></div>
      <div class="dg"><label>Ngày đăng</label><p>{{ $detail->created_at->format('d/m/Y') }}</p></div>
    </div>
    @if($detail->description)
    <div style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.4px;margin-bottom:8px">Mô tả công việc</div>
    <div class="d-desc">{{ $detail->description }}</div>
    @endif
    <div class="d-footer">
      <button class="btn-xs btn-del-sm" wire:click="delete({{ $detail->id }})" wire:confirm="Xóa tin này?">🗑 Xóa tin</button>
      <div style="display:flex;gap:8px">
        <button class="btn-xs" wire:click="$set('showDetail', false)">Đóng</button>
        <button class="btn-prim" wire:click="openEdit({{ $detail->id }})">✎ Chỉnh sửa</button>
      </div>
    </div>
  </div>
</div>
@endif
 
{{-- MODAL THÊM / SỬA --}}
@if($showForm)
<div class="modal-bg" wire:click.self="$set('showForm', false)">
  <div class="modal">
    <div class="modal-title">
      {{ $editId ? 'Chỉnh sửa tin tuyển dụng' : 'Thêm tin tuyển dụng mới' }}
      <button class="close-btn" wire:click="$set('showForm', false)">×</button>
    </div>
    <div class="fg">
      <div class="fi full"><label>Tiêu đề *</label><input wire:model="title" type="text" placeholder="VD: Lập trình viên Backend PHP">@error('title')<div class="err">{{ $message }}</div>@enderror</div>
      <div class="fi"><label>Công ty *</label><input wire:model="company" type="text" placeholder="FPT Software">@error('company')<div class="err">{{ $message }}</div>@enderror</div>
      <div class="fi"><label>Địa điểm</label><input wire:model="location" type="text" placeholder="Hà Nội"></div>
      <div class="fi"><label>Loại công việc</label><select wire:model="f_type"><option value="full-time">Full-time</option><option value="part-time">Part-time</option><option value="internship">Thực tập</option></select></div>
      <div class="fi"><label>Khoa (bỏ trống = tất cả)</label>
        <select wire:model="f_khoa"><option value="">Tất cả khoa</option>@foreach($khoaList as $k => $l)<option value="{{ $k }}">{{ $l }}</option>@endforeach</select>
      </div>
      <div class="fi"><label>Ngành nghề</label><input wire:model="field" type="text" placeholder="Công nghệ..."></div>
      <div class="fi"><label>Mức lương</label><input wire:model="salary" type="text" placeholder="18–30 tr"></div>
      <div class="fi"><label>Icon (emoji)</label><input wire:model="logo_emoji" type="text" placeholder="💻"></div>
      <div class="fi"><label>Email liên hệ</label><input wire:model="contact_email" type="email" placeholder="hr@congty.com">@error('contact_email')<div class="err">{{ $message }}</div>@enderror</div>
      <div class="fi full"><label>Mô tả công việc</label><textarea wire:model="description" placeholder="Mô tả yêu cầu, quyền lợi..."></textarea></div>
    </div>
    <div class="modal-footer">
      <button class="btn-xs" wire:click="$set('showForm', false)">Hủy</button>
      <button class="btn-prim" wire:click="save">
        <span wire:loading wire:target="save">Đang lưu...</span>
        <span wire:loading.remove wire:target="save">{{ $editId ? 'Cập nhật' : 'Thêm tin' }}</span>
      </button>
    </div>
  </div>
</div>
@endif
</div>
</div>
</div>
