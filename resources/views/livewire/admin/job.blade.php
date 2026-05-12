<div>
  <style>
   @import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700&display=swap');

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Be Vietnam Pro', sans-serif;
  background: #f4f6f9;
  color: #111;
  font-size: 13px;
}

.dash { padding: 1.75rem; }

.topbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.75rem;
}

.ptitle { font-size: 20px; font-weight: 700; color: #111; letter-spacing: -.4px; }
.psub   { font-size: 12px; color: #9ca3af; margin-top: 3px; }

.flash-ok {
  background: #f0fdf4; border: 1px solid #86efac;
  color: #166534; padding: 9px 14px; border-radius: 8px;
  font-size: 13px; margin-bottom: 1rem;
}

.btn-prim {
  padding: 8px 18px;
  background: #111; color: #fff;
  border: none; border-radius: 8px;
  font-size: 13px; font-weight: 600;
  cursor: pointer; font-family: inherit;
  display: inline-flex; align-items: center; gap: 6px;
  transition: background .15s, transform .1s;
}
.btn-prim:hover  { background: #2d2d2d; }
.btn-prim:active { transform: scale(.98); }

.btn-xs {
  font-size: 12px; padding: 7px 13px;
  border-radius: 7px; border: 1px solid #d1d5db;
  background: #fff; color: #374151;
  cursor: pointer; font-family: inherit;
  transition: background .1s;
}
.btn-xs:hover { background: #f9fafb; }

.btn-del-sm {
  border-color: #fca5a5; color: #dc2626; background: #fef2f2;
}
.btn-del-sm:hover { background: #fee2e2; }

.stats-sm {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 12px;
  margin-bottom: 1.25rem;
}

.stat-sm {
  background: #fff;
  border: 1px solid #eaecf0;
  border-radius: 10px;
  padding: .875rem 1rem;
  display: flex; justify-content: space-between; align-items: center;
  transition: box-shadow .15s;
}
.stat-sm:hover { box-shadow: 0 2px 12px rgba(0,0,0,.07); }

.stat-sm-label { font-size: 11px; color: #9ca3af; margin-bottom: 4px; }
.stat-sm-val   { font-size: 20px; font-weight: 700; color: #111; }
.stat-sm-icon  { font-size: 18px; color: #d1d5db; }

.toolbar {
  display: flex; gap: 8px; margin-bottom: 1rem; flex-wrap: wrap;
}

.tb-in {
  flex: 1; min-width: 180px;
  padding: 8px 12px;
  border: 1px solid #d1d5db; border-radius: 8px;
  font-size: 13px; color: #111; background: #fff;
  font-family: inherit;
  transition: border-color .15s, box-shadow .15s;
}
.tb-in:focus {
  outline: none; border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59,130,246,.1);
}

.tb-sel {
  padding: 8px 12px;
  border: 1px solid #d1d5db; border-radius: 8px;
  font-size: 13px; color: #374151; background: #fff;
  font-family: inherit; cursor: pointer;
  transition: border-color .15s;
}
.tb-sel:focus { outline: none; border-color: #3b82f6; }

/* ── KEY FIX: overflow visible để dropdown không bị cắt ── */
.card {
  background: #fff;
  border: 1px solid #eaecf0;
  border-radius: 10px;
  overflow: visible;
}

table { width: 100%; border-collapse: collapse; }

thead th {
  font-size: 10px; font-weight: 700;
  letter-spacing: .06em; text-transform: uppercase;
  color: #9ca3af;
  padding: 11px 14px;
  text-align: left;
  border-bottom: 1px solid #eaecf0;
  background: #fafafa;
  white-space: nowrap;
}

tbody tr {
  border-bottom: 1px solid #f3f4f6;
  transition: background .12s;
}
tbody tr:last-child { border-bottom: none; }
tbody tr:hover      { background: #fafafa; }

td {
  padding: 11px 14px;
  font-size: 12.5px;
  color: #374151;
  vertical-align: middle;
}

.badge {
  display: inline-block;
  font-size: 10.5px; font-weight: 600;
  padding: 3px 9px; border-radius: 5px;
  white-space: nowrap;
}
.bg { background: #f0fdf4; color: #15803d; }
.by { background: #fef9c3; color: #92400e; }
.bp { background: #f5f3ff; color: #6d28d9; }
.bc { background: #eff6ff; color: #1d4ed8; }
.bn { background: #f3f4f6; color: #6b7280; }

.tog {
  width: 36px; height: 20px;
  border-radius: 10px; border: none;
  cursor: pointer; position: relative; flex-shrink: 0;
  transition: background .2s;
  display: block;
}
.tog::after {
  content: '';
  position: absolute; top: 2px; left: 2px;
  width: 16px; height: 16px;
  border-radius: 50%; background: #fff;
  box-shadow: 0 1px 3px rgba(0,0,0,.2);
  transition: transform .2s;
}
.tog.on  { background: #16a34a; }
.tog.on::after  { transform: translateX(16px); }
.tog.off { background: #d1d5db; }

.pager {
  display: flex; justify-content: space-between; align-items: center;
  padding: 10px 14px;
  border-top: 1px solid #eaecf0;
  font-size: 12px; color: #9ca3af;
}

/* ── DROPDOWN FIX CHÍNH ── */
.dd-wrap {
  position: relative;
  display: inline-block;
}

.dd-btn {
  width: 30px; height: 30px;
  border: 1px solid #e5e7eb; border-radius: 6px;
  background: #fff; cursor: pointer;
  display: flex; align-items: center;
  justify-content: center; flex-direction: column;
  gap: 2.5px; padding: 0;
  transition: background .1s, border-color .1s;
}
.dd-btn:hover { background: #f3f4f6; border-color: #d1d5db; }

.dd-dot {
  width: 3px; height: 3px;
  border-radius: 50%; background: #9ca3af;
}

.dd-menu {
  position: absolute;
  right: 0; top: calc(100% + 6px);
  background: #fff;
  border: 1px solid #e5e7eb;
  border-radius: 9px;
  box-shadow: 0 8px 24px rgba(0,0,0,.12);
  min-width: 155px;
  z-index: 9999;           /* ← nổi lên trên tất cả */
  overflow: hidden;
}

.dd-item {
  display: flex; align-items: center; gap: 9px;
  padding: 9px 14px;
  font-size: 12.5px; color: #374151;
  cursor: pointer;
  transition: background .1s;
}
.dd-item:hover     { background: #f9fafb; }
.dd-item.red       { color: #dc2626; }
.dd-item.red:hover { background: #fef2f2; }
.dd-item i         { width: 14px; text-align: center; flex-shrink: 0; }

.dd-sep { height: 1px; background: #f3f4f6; }

.modal-bg {
  position: fixed; inset: 0;
  background: rgba(0,0,0,.4);
  backdrop-filter: blur(2px);
  display: flex; align-items: center; justify-content: center;
  z-index: 50;
}

.modal {
  background: #fff;
  border-radius: 14px;
  padding: 1.5rem;
  width: 520px; max-width: 92vw;
  max-height: 90vh; overflow-y: auto;
  box-shadow: 0 20px 60px rgba(0,0,0,.18);
}

.modal-title {
  font-size: 15px; font-weight: 700; color: #111;
  margin-bottom: 1.25rem;
  display: flex; justify-content: space-between; align-items: center;
}

.close-btn {
  background: none; border: none;
  font-size: 20px; color: #9ca3af;
  cursor: pointer; line-height: 1; padding: 2px 4px;
  border-radius: 4px; transition: color .1s, background .1s;
}
.close-btn:hover { color: #374151; background: #f3f4f6; }

.fg { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
.fi { display: flex; flex-direction: column; gap: 5px; }
.fi.full { grid-column: 1 / -1; }

.fi label {
  font-size: 10.5px; font-weight: 700; color: #6b7280;
  text-transform: uppercase; letter-spacing: .5px;
}

.fi input, .fi select, .fi textarea {
  padding: 8px 11px;
  border: 1px solid #d1d5db; border-radius: 8px;
  font-size: 13px; color: #111;
  font-family: inherit; width: 100%;
  transition: border-color .15s, box-shadow .15s;
}
.fi input:focus, .fi select:focus, .fi textarea:focus {
  outline: none; border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59,130,246,.1);
}
.fi textarea { resize: vertical; min-height: 80px; }

.err { font-size: 11px; color: #dc2626; margin-top: 2px; }

.modal-footer {
  display: flex; justify-content: flex-end; gap: 8px;
  margin-top: 1.25rem; padding-top: 1rem;
  border-top: 1px solid #eaecf0;
}

.d-hero {
  background: #f8f9fc; border-radius: 10px;
  padding: 1.25rem; margin-bottom: 1.25rem;
  display: flex; align-items: center; gap: 14px;
}
.d-ico { font-size: 36px; flex-shrink: 0; }

.d-grid {
  display: grid; grid-template-columns: 1fr 1fr;
  gap: .875rem; margin-bottom: 1.25rem;
}
.dg label {
  font-size: 10px; font-weight: 700; color: #9ca3af;
  text-transform: uppercase; letter-spacing: .5px;
  display: block; margin-bottom: 3px;
}
.dg p    { font-size: 13px; color: #374151; font-weight: 500; }
.dg p.mt { color: #c4cdd6; font-style: italic; font-weight: 400; }

.d-desc {
  background: #f8f9fc; border-radius: 8px;
  padding: 1rem; font-size: 13px; color: #374151;
  line-height: 1.75; margin-bottom: 1.25rem;
}

.d-footer {
  display: flex; justify-content: space-between; align-items: center;
  padding-top: 1rem; border-top: 1px solid #eaecf0;
}

@media (max-width: 900px) { .stats-sm { grid-template-columns: 1fr 1fr; } }
@media (max-width: 600px) {
  .fg { grid-template-columns: 1fr; }
  .fi.full { grid-column: 1; }
  .dash { padding: 1rem; }
}
  </style>
  <div>
    <div class="dash">
      <div class="topbar">
        <div>
          <div class="ptitle">Tuyển dụng</div>
          <div class="psub">Quản lý tin tuyển dụng · {{ now()->format('d/m/Y') }}</div>
        </div>
        <button class="btn-prim" wire:click="openCreate">+ Thêm tin</button>
      </div>

      @if(session('success'))
        <div class="flash-ok"><i class="fa-solid fa-check"></i> {{ session('success') }}</div>
      @endif

      <div class="stats-sm">
        <div class="stat-sm">
          <div>
            <div class="stat-sm-label">Tổng tin</div>
            <div class="stat-sm-val">{{ \App\Models\Job::count() }}</div>
          </div><span style="font-size:20px"><i class="fa-solid fa-briefcase"></i></span>
        </div>
        <div class="stat-sm">
          <div>
            <div class="stat-sm-label">Đang hiển thị</div>
            <div class="stat-sm-val">{{ \App\Models\Job::where('is_active', true)->count() }}</div>
          </div><span style="font-size:20px"><i class="fa-solid fa-eye"></i></span>
        </div>
        <div class="stat-sm">
          <div>
            <div class="stat-sm-label">Thực tập</div>
            <div class="stat-sm-val">{{ \App\Models\Job::where('type', 'internship')->count() }}</div>
          </div><span style="font-size:20px"><i class="fa-solid fa-graduation-cap"></i></span>
        </div>
        <div class="stat-sm">
          <div>
            <div class="stat-sm-label">Tất cả khoa</div>
            <div class="stat-sm-val">{{ \App\Models\Job::whereNull('khoa')->count() }}</div>
          </div><span style="font-size:20px"><i class="fa-solid fa-globe"></i></span>
        </div>
      </div>

      <div class="toolbar">
      <input class="tb-in" wire:model.live.debounce.300ms="search" type="text" placeholder="Tìm theo tiêu đề, công ty...">       
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
            <tr>
              <th style="width:30%">Tin tuyển dụng</th>
              <th>Công ty</th>
              <th>Khoa</th>
              <th>Loại</th>
              <th>Lương</th>
              <th>Hiển thị</th>
              <th>Ngày đăng</th>
              <th style="width:44px"></th>
            </tr>
          </thead>
          <tbody>
            @forelse($jobs as $job)
              <tr wire:key="job-{{ $job->id }}">
                <td>
                  <div style="display:flex;align-items:center;gap:9px">
                    <span style="font-size:20px;flex-shrink:0">{{ $job->logo_emoji }}</span>
                    <div style="min-width:0">
                      <div
                        style="font-weight:500;color:#111;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:200px">
                        {{ $job->title }}</div>
                      <div style="font-size:11px;color:#9ca3af">{{ $job->location ?? '—' }}@if($job->field) ·
                      {{ $job->field }}@endif</div>
                    </div>
                  </div>
                </td>
                <td style="font-weight:500">{{ $job->company }}</td>
                <td>
                  @if($job->khoa)<span class="badge bc">{{ $job->khoa }}</span>
                  @else<span class="badge" style="background:#f3f4f6;color:#6b7280">Tất cả</span>@endif
                </td>
                <td><span
                    class="badge {{ $job->type === 'internship' ? 'by' : ($job->type === 'part-time' ? 'bp' : 'bg') }}">{{ $job->type_label }}</span>
                </td>
                <td style="color:#6b7280">{{ $job->salary ?? '—' }}</td>
                <td><button wire:click="toggleActive({{ $job->id }})"
                    class="tog {{ $job->is_active ? 'on' : 'off' }}"></button></td>
                <td style="color:#9ca3af;white-space:nowrap">{{ $job->created_at->format('d/m/Y') }}</td>
                <td>
                  <div x-data="{ open:false }" class="dd-wrap">
                    <button class="dd-btn" @click="open=!open">
                      <span class="dd-dot"></span>
                      <span class="dd-dot"></span>
                      <span class="dd-dot"></span>
                    </button>
                    <div class="dd-menu" x-show="open" @click.outside="open=false" x-transition>
                      <div class="dd-item" @click="open=false" wire:click="openDetail({{ $job->id }})"> <i class="fa-solid fa-eye"></i> Xem chi tiết</div>
                      <div class="dd-item" @click="open=false" wire:click="openEdit({{ $job->id }})"> <i class="fa-solid fa-edit"></i> Chỉnh sửa </div>
                      <div class="dd-sep"></div>
                      <div class="dd-item red" @click="open=false" wire:click="delete({{ $job->id }})"> <i class="fa-solid fa-trash"></i> Xóa</div>
                    </div>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" style="text-align:center;color:#9ca3af;padding:2rem">Không tìm thấy tin nào</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <div class="pager">
          <span>Hiển thị {{ $jobs->firstItem() ?? 0 }}–{{ $jobs->lastItem() ?? 0 }} trong {{ $jobs->total() }} tin</span>
          {{ $jobs->links() }}
        </div>
      </div>
    </div>

    @if($showDetail && $detail)
      <div class="modal-bg" wire:click.self="$set('showDetail', false)">
        <div class="modal">
          <div class="modal-title">Chi tiết tin tuyển dụng<button class="close-btn"
              wire:click="$set('showDetail', false)">×</button></div>
          <div class="d-hero">
            <div class="d-ico">{{ $detail->logo_emoji }}</div>
            <div>
              <div style="font-size:15px;font-weight:600;color:#111">{{ $detail->title }}</div>
              <div style="font-size:12px;color:#6b7280;margin-top:2px">{{ $detail->company }}@if($detail->location) ·
              {{ $detail->location }}@endif</div>
              <div style="margin-top:8px;display:flex;gap:6px;flex-wrap:wrap">
                <span class="badge {{ $detail->type === 'internship' ? 'by' : 'bg' }}">{{ $detail->type_label }}</span>
                @if($detail->khoa)<span class="badge bc">{{ $detail->khoa_label }}</span>
                @else<span class="badge" style="background:#f3f4f6;color:#6b7280">Tất cả khoa</span>@endif
                <span class="badge {{ $detail->is_active ? 'bg' : '' }}"
                  style="{{ $detail->is_active ? '' : 'background:#f3f4f6;color:#9ca3af' }}">{{ $detail->is_active ? 'Đang hiển thị' : 'Đã ẩn' }}</span>
              </div>
            </div>
          </div>
          <div class="d-grid">
            <div class="dg"><label>Mức lương</label>
              <p class="{{ $detail->salary ? '' : 'mt' }}">{{ $detail->salary ?? 'Chưa cập nhật' }}</p>
            </div>
            <div class="dg"><label>Ngành nghề</label>
              <p class="{{ $detail->field ? '' : 'mt' }}">{{ $detail->field ?? 'Chưa cập nhật' }}</p>
            </div>
            <div class="dg"><label>Email liên hệ</label>
              <p class="{{ $detail->contact_email ? '' : 'mt' }}">{{ $detail->contact_email ?? 'Chưa cập nhật' }}</p>
            </div>
            <div class="dg"><label>Ngày đăng</label>
              <p>{{ $detail->created_at->format('d/m/Y') }}</p>
            </div>
          </div>
          @if($detail->description)
            <div
              style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.4px;margin-bottom:8px">
              Mô tả công việc</div>
            <div class="d-desc">{{ $detail->description }}</div>
          @endif
          <div class="d-footer">
            <button class="btn-xs btn-del-sm" wire:click="delete({{ $detail->id }})" wire:confirm="Xóa tin này?"><i class="fa-solid fa-trash"></i> Xóa
              tin</button>
            <div style="display:flex;gap:8px">
              <button class="btn-xs" wire:click="$set('showDetail', false)">Đóng</button>
              <button class="btn-prim" wire:click="openEdit({{ $detail->id }})"><i class="fa-solid fa-edit"></i> Chỉnh sửa</button>
            </div>
          </div>
        </div>
      </div>
    @endif

    
    @if($showForm)
      <div class="modal-bg" wire:click.self="$set('showForm', false)">
        <div class="modal">
          <div class="modal-title">
            {{ $editId ? 'Chỉnh sửa tin tuyển dụng' : 'Thêm tin tuyển dụng mới' }}
            <button class="close-btn" wire:click="$set('showForm', false)">×</button>
          </div>
          <div class="fg">
            <div class="fi full"><label>Tiêu đề *</label><input wire:model="title" type="text"
                placeholder="VD: Lập trình viên Backend PHP">@error('title')<div class="err">{{ $message }}</div>@enderror
            </div>
            <div class="fi"><label>Công ty *</label><input wire:model="company" type="text"
                placeholder="FPT Software">@error('company')<div class="err">{{ $message }}</div>@enderror</div>
            <div class="fi"><label>Địa điểm</label><input wire:model="location" type="text" placeholder="Hà Nội"></div>
            <div class="fi"><label>Loại công việc</label><select wire:model="f_type">
                <option value="full-time">Full-time</option>
                <option value="part-time">Part-time</option>
                <option value="internship">Thực tập</option>
              </select></div>
            <div class="fi"><label>Khoa (bỏ trống = tất cả)</label>
              <select wire:model="f_khoa">
                <option value="">Tất cả khoa</option>@foreach($khoaList as $k => $l)<option value="{{ $k }}">{{ $l }}
                </option>@endforeach
              </select>
            </div>
            <div class="fi"><label>Ngành nghề</label><input wire:model="field" type="text" placeholder="Công nghệ...">
            </div>
            <div class="fi"><label>Mức lương</label><input wire:model="salary" type="text" placeholder="18–30 tr"></div>
            <div class="fi"><label>Icon</label><input wire:model="logo_emoji" type="text" placeholder="<i class='fa-solid fa-laptop'></i>"></div>            <div class="fi"><label>Email liên hệ</label><input wire:model="contact_email" type="email"
                placeholder="hr@congty.com">@error('contact_email')<div class="err">{{ $message }}</div>@enderror</div>
            <div class="fi full"><label>Mô tả công việc</label><textarea wire:model="description"
                placeholder="Mô tả yêu cầu, quyền lợi..."></textarea></div>
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