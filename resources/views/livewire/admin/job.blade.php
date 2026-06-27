<div>
  <style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

.dash { padding: 1.75rem; }

.topbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.75rem;
}

.ptitle { font-size: 20px; font-weight: 700; color: #0f172a; letter-spacing: -.4px; }
.psub   { font-size: 13px; color: #64748b; margin-top: 3px; }

.btn-prim {
  padding: 8px 18px;
  background: #16a34a;
  color: #fff;
  border: none;
  border-radius: 8px;
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
  font-family: inherit;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  transition: background .15s, transform .1s;
}

.btn-prim:hover {
  background: #16a34a;
}

.btn-prim:active {
  transform: scale(.98);
}

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
.stat-sm-icon  { font-size: 14px; color: #d1d5db; }


.card {
  background: #fff;
  border: 1px solid #eaecf0;
  border-radius: 10px;
  overflow: visible;
}

.tog {
  width: 36px; height: 20px;
  border-radius: 10px; border: none;
  cursor: pointer; position: relative; flex-shrink: 0;
  transition: background .2s; display: block;
}
.tog::after {
  content: ''; position: absolute; top: 2px; left: 2px;
  width: 16px; height: 16px; border-radius: 50%; background: #fff;
  box-shadow: 0 1px 3px rgba(0,0,0,.2); transition: transform .2s;
}
.tog.on { background: #16a34a; }
.tog.on::after { transform: translateX(16px); }
.tog.off { background: #d1d5db; }

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
  font-size: 13px; color: #9ca3af;
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

.fi .company-input-wrap { position: relative; }
.fi .company-suggest {
  position: absolute; left: 0; right: 0; top: calc(100% + 4px); z-index: 20;
  background: #fff; border: 1px solid #d1d5db; border-radius: 8px;
  box-shadow: 0 8px 24px rgba(0,0,0,.08); max-height: 200px; overflow-y: auto;
}
.fi .company-suggest-item { padding: 8px 12px; font-size: 12.5px; color: #374151; cursor: pointer; transition: .1s; }
.fi .company-suggest-item:hover { background: #eff6ff; color: #1d4ed8; }

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

@media(max-width:1024px){
  .dash{padding:1.25rem}
  .stats-sm{grid-template-columns:repeat(2,1fr);gap:10px}
}
@media(max-width:768px){
  .dash{padding:1rem}
  .stats-sm{grid-template-columns:repeat(2,1fr);gap:8px}
  .card{overflow-x:auto;-webkit-overflow-scrolling:touch}
  table{min-width:640px}
}
@media(max-width:600px){
  .stats-sm{grid-template-columns:1fr 1fr}
  .stat-sm-val{font-size:18px}
  .topbar{flex-direction:column;align-items:flex-start;gap:8px}
  .btn-prim[wire\\:click="openCreate"]{width:100%;justify-content:center}
  .modal{border-radius:12px 12px 0 0;max-width:100%;align-self:flex-end}
  .modal-bg{align-items:flex-end;padding:0}
  .fg{grid-template-columns:1fr}
  .fi.full{grid-column:1}
}
@media(max-width:400px){
  .stat-sm-val{font-size:16px}
  table th:nth-child(5),table td:nth-child(5){display:none}
}
  </style>
  <div>
    <div class="dash">
      <div class="topbar">
        <div>
          <div class="ptitle">Tuyển dụng</div>
          <div class="psub">Quản lý tin tuyển dụng · {{ now()->format('d/m/Y') }}</div>
        </div>
        <button class="btn-prim" wire:click="openCreate">+ Thêm tin mới </button>
      </div>

      {{-- Tabs trạng thái --}}
      <div style="display:flex;gap:6px;margin-bottom:1rem;flex-wrap:wrap">
        <button wire:click="$set('statusFilter','')"
          style="padding:6px 14px;border-radius:20px;font-size:12.5px;font-weight:600;cursor:pointer;border:1.5px solid {{ $statusFilter==='' ? '#16a34a' : '#e5e7eb' }};background:{{ $statusFilter==='' ? '#f0fdf4' : '#fff' }};color:{{ $statusFilter==='' ? '#16a34a' : '#6b7280' }}">
          Tất cả
        </button>
        <button wire:click="$set('statusFilter','pending')"
          style="padding:6px 14px;border-radius:20px;font-size:12.5px;font-weight:600;cursor:pointer;border:1.5px solid {{ $statusFilter==='pending' ? '#d97706' : '#e5e7eb' }};background:{{ $statusFilter==='pending' ? '#fffbeb' : '#fff' }};color:{{ $statusFilter==='pending' ? '#d97706' : '#6b7280' }};display:inline-flex;align-items:center;gap:6px">
          Chờ duyệt
          @if($pendingCount > 0)
            <span style="background:#ef4444;color:#fff;border-radius:10px;padding:1px 7px;font-size:11px;line-height:1.6">{{ $pendingCount }}</span>
          @endif
        </button>
        <button wire:click="$set('statusFilter','approved')"
          style="padding:6px 14px;border-radius:20px;font-size:12.5px;font-weight:600;cursor:pointer;border:1.5px solid {{ $statusFilter==='approved' ? '#16a34a' : '#e5e7eb' }};background:{{ $statusFilter==='approved' ? '#f0fdf4' : '#fff' }};color:{{ $statusFilter==='approved' ? '#16a34a' : '#6b7280' }}">
          Đã duyệt
        </button>
        <button wire:click="$set('statusFilter','rejected')"
          style="padding:6px 14px;border-radius:20px;font-size:12.5px;font-weight:600;cursor:pointer;border:1.5px solid {{ $statusFilter==='rejected' ? '#dc2626' : '#e5e7eb' }};background:{{ $statusFilter==='rejected' ? '#fef2f2' : '#fff' }};color:{{ $statusFilter==='rejected' ? '#dc2626' : '#6b7280' }}">
          Từ chối
        </button>
      </div>

      <x-toolbar>
        <x-slot:search>
          <x-toolbar.search placeholder="Tìm theo tiêu đề, công ty..." />
        </x-slot:search>
        <x-toolbar.select model="type">
          <option value="">Tất cả loại</option>
          <option value="full-time">Full-time</option>
          <option value="part-time">Part-time</option>
          <option value="internship">Thực tập</option>
        </x-toolbar.select>
      </x-toolbar>

      <x-table minWidth="900px">
        <x-slot:heading>
          <th style="width:4%">STT</th>
          <th style="width:22%">Tin tuyển dụng</th>
          <th style="width:12%">Công ty</th>
          <th style="width:8%">Loại</th>
          <th style="width:10%">Trạng thái</th>
          <th style="width:11%">Lương</th>
          <th style="width:7%">Hiển thị</th>
          <th style="width:9%">Ngày nộp</th>
          <th style="width:9%">Hạn nộp</th>
          <th style="width:8%"></th>
        </x-slot:heading>

        @forelse($jobs as $job)
        @php
          $typeColor   = match($job->type) { 'internship'=>'yellow', 'part-time'=>'purple', default=>'green' };
          $statusColor = $job->status_color;
        @endphp
        <tr wire:key="job-{{ $job->id }}" style="{{ $job->status==='pending' ? 'background:#fffbeb' : '' }}">
          <td style="color:#94a3b8;font-size:12px;font-weight:600">{{ $loop->iteration }}</td>
          <td>
            <div style="font-weight:500;color:#111;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:190px">{{ $job->title }}</div>
            <div style="font-size:11px;color:#9ca3af">{{ $job->location ?? '—' }}@if($job->field) · {{ $job->field }}@endif</div>
          </td>
          <td style="font-weight:500;font-size:13px">{{ $job->company }}</td>
          <td><x-badge :color="$typeColor">{{ $job->type_label }}</x-badge></td>
          <td><x-badge :color="$statusColor">{{ $job->status_label }}</x-badge></td>
          <td style="font-size:13px;color:#6b7280">
            @if($job->min_salary || $job->max_salary)
              {{ number_format($job->min_salary ?? 0) }}–{{ number_format($job->max_salary ?? 0) }}
            @else —
            @endif
          </td>
          <td>
            @if($job->status === 'approved')
              <button wire:click="toggleActive({{ $job->id }})" class="tog {{ $job->is_active ? 'on' : 'off' }}"></button>
            @else
              <span style="font-size:12px;color:#d1d5db">—</span>
            @endif
          </td>
          <td style="font-size:12px;color:#9ca3af;white-space:nowrap">{{ $job->created_at->format('d/m/Y') }}</td>
          <td style="font-size:12px;color:#9ca3af;white-space:nowrap">{{ $job->deadline ? \Carbon\Carbon::parse($job->deadline)->format('d/m/Y') : '—' }}</td>
          <td>
            <x-table.action-btn>
              <div class="adm-dd-item" wire:click="openDetail({{ $job->id }})">
                <i class="fa-solid fa-eye"></i> Xem chi tiết
              </div>
              @if($job->status === 'pending')
                <div class="adm-dd-sep"></div>
                <div class="adm-dd-item" wire:click="approve({{ $job->id }})" style="color:#16a34a;font-weight:600">
                  <i class="fa-solid fa-check"></i> Duyệt
                </div>
                <div class="adm-dd-item red" wire:click="reject({{ $job->id }})">
                  <i class="fa-solid fa-xmark"></i> Từ chối
                </div>
              @else
                <div class="adm-dd-item" wire:click="openEdit({{ $job->id }})">
                  <i class="fa-solid fa-edit"></i> Chỉnh sửa
                </div>
              @endif
              <div class="adm-dd-sep"></div>
              <div class="adm-dd-item red" wire:click="delete({{ $job->id }})" wire:confirm="Xóa tin này?">
                <i class="fa-solid fa-trash"></i> Xóa
              </div>
            </x-table.action-btn>
          </td>
        </tr>
        @empty
        <tr><td colspan="10" class="adm-tbl-empty">Không tìm thấy tin nào.</td></tr>
        @endforelse

        <x-slot:paginationInfo>Hiển thị {{ $jobs->firstItem() ?? 0 }}–{{ $jobs->lastItem() ?? 0 }} / {{ $jobs->total() }} tin</x-slot:paginationInfo>
        <x-slot:pagination>{{ $jobs->links() }}</x-slot:pagination>
      </x-table>
    </div>

    @if($showDetail && $detail)
      <div class="modal-bg" wire:click.self="$set('showDetail', false)">
        <div class="modal">
          <div class="modal-title">Chi tiết tin tuyển dụng<button class="close-btn"
              wire:click="$set('showDetail', false)">×</button></div>
          <div class="d-hero">
            <div>
              <div style="font-size:15px;font-weight:600;color:#111">{{ $detail->title }}</div>
              <div style="font-size:12px;color:#6b7280;margin-top:2px">{{ $detail->company }}@if($detail->location) ·
              {{ $detail->location }}@endif</div>
              <div style="margin-top:8px;display:flex;gap:6px;flex-wrap:wrap">
                <span class="badge {{ $detail->type === 'internship' ? 'by' : 'bg' }}">{{ $detail->type_label }}</span>
                @php
                  $sc = match($detail->status) { 'approved'=>'background:#dcfce7;color:#16a34a', 'rejected'=>'background:#fee2e2;color:#dc2626', default=>'background:#fef9c3;color:#ca8a04' };
                @endphp
                <span class="badge" style="{{ $sc }}">{{ $detail->status_label }}</span>
              </div>
            </div>
          </div>
          <div class="d-grid">
            <div class="dg">
              <label>Mức lương</label>
              <p class="{{ ($detail->min_salary || $detail->max_salary) ? '' : 'mt' }}">
                @if($detail->min_salary || $detail->max_salary)
                  {{ number_format($detail->min_salary ?? 0) }}
                  -
                  {{ number_format($detail->max_salary ?? 0) }}
                @else
                  Chưa cập nhật
                @endif
              </p>
            </div>
            <div class="dg"><label>Ngành nghề</label>
              <p class="{{ $detail->field ? '' : 'mt' }}">{{ $detail->field ?? 'Chưa cập nhật' }}</p>
            </div>
            <div class="dg"><label>Kinh nghiệm yêu cầu</label>
              <p class="{{ $detail->experience_required ? '' : 'mt' }}">{{ $detail->experience_required ? $detail->experience_required . ' năm' : 'Chưa cập nhật' }}</p>
            </div>
            <div class="dg"><label>Hạn nộp</label>
              <p class="{{ $detail->deadline ? '' : 'mt' }}">{{ $detail->deadline ? \Carbon\Carbon::parse($detail->deadline)->format('d/m/Y') : 'Chưa cập nhật' }}</p>
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
            <button class="btn-xs btn-del-sm" wire:click="delete({{ $detail->id }})" wire:confirm="Xóa tin này?">
              <i class="fa-solid fa-trash"></i> Xóa
            </button>
            <div style="display:flex;gap:8px">
              <button class="btn-xs" wire:click="$set('showDetail', false)">Đóng</button>
              @if($detail->status === 'pending')
                <button class="btn-xs" wire:click="reject({{ $detail->id }})"
                  style="border-color:#fca5a5;color:#dc2626;background:#fef2f2">
                  <i class="fa-solid fa-xmark"></i> Từ chối
                </button>
                <button class="btn-prim" wire:click="approve({{ $detail->id }})">
                  <i class="fa-solid fa-check"></i> Duyệt tin
                </button>
              @else
                <button class="btn-prim" wire:click="openEdit({{ $detail->id }})">
                  <i class="fa-solid fa-edit"></i> Chỉnh sửa
                </button>
              @endif
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
            <div class="fi" x-data="{open:false}"><label>Công ty *</label>
              <div class="company-input-wrap">
                <input wire:model.live.debounce.250ms="company" type="text"
                  placeholder="FPT Software" autocomplete="off"
                  @focus="open=true" @click.outside="open=false">
                <div class="company-suggest" x-show="open" x-cloak
                     @if($this->companySuggestions->isEmpty()) style="display:none" @endif>
                  @foreach($this->companySuggestions as $c)
                    <div class="company-suggest-item" wire:click="selectCompany({{ $c->id }})">{{ $c->name }}</div>
                  @endforeach
                </div>
              </div>
              @error('company')<div class="err">{{ $message }}</div>@enderror</div>
            <div class="fi"><label>Địa điểm</label><input wire:model="location" type="text" placeholder="Hà Nội"></div>
            <div class="fi"><label>Loại công việc</label><select wire:model="f_type">
                <option value="full-time">Full-time</option>
                <option value="part-time">Part-time</option>
                <option value="internship">Thực tập</option>
              </select></div>
            <div class="fi">
              <label>Ngành nghề</label>
              <input wire:model="field" type="text" placeholder="Công nghệ...">
            </div>
            <div class="fi">
                <label>Lương tối thiểu</label>
                <input
                    wire:model="min_salary"
                    type="number"
                    placeholder="10000000">
                @error('min_salary')<div class="err">{{ $message }}</div>@enderror
            </div>
            <div class="fi">
                <label>Lương tối đa</label>
                <input
                    wire:model="max_salary"
                    type="number"
                    placeholder="30000000">
                @error('max_salary')<div class="err">{{ $message }}</div>@enderror
            </div>
            <div class="fi">
                <label>Kinh nghiệm (năm)</label>
                <input
                    wire:model="experience_required"
                    type="number"
                    placeholder="2">
                @error('experience_required')<div class="err">{{ $message }}</div>@enderror
            </div>
            <div class="fi">
                <label>Hạn nộp</label>
                <input
                    wire:model="deadline"
                    type="date">
                @error('deadline')<div class="err">{{ $message }}</div>@enderror
            </div>
            <div class="fi">
              <label>Email liên hệ</label>
              <input wire:model="contact_email" type="email"
                placeholder="hr@congty.com">
              </div>
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