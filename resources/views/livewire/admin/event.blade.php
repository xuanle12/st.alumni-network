<div>
  <style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

.dash { padding: 1.75rem; }

.topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.75rem; }
.ptitle { font-size: 20px; font-weight: 700; color: #0f172a; letter-spacing: -.4px; }
.psub   { font-size: 13px; color: #64748b; margin-top: 3px; }

.btn-prim {
  padding: 8px 18px; background: #0961aa; color: #fff; border: none;
  border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer;
  font-family: inherit; display: inline-flex; align-items: center; gap: 6px;
  transition: background .15s, transform .1s;
}
.btn-prim:active { transform: scale(.98); }

.btn-xs {
  font-size: 12px; padding: 7px 13px; border-radius: 7px; border: 1px solid #d1d5db;
  background: #fff; color: #374151; cursor: pointer; font-family: inherit; transition: background .1s;
}
.btn-xs:hover { background: #f9fafb; }
.btn-del-sm { border-color: #fca5a5; color: #dc2626; background: #fef2f2; }
.btn-del-sm:hover { background: #fee2e2; }

.tog {
  width: 36px; height: 20px; border-radius: 10px; border: none;
  cursor: pointer; position: relative; flex-shrink: 0; transition: background .2s; display: block;
}
.tog::after {
  content: ''; position: absolute; top: 2px; left: 2px; width: 16px; height: 16px;
  border-radius: 50%; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,.2); transition: transform .2s;
}
.tog.on { background: #0961aa; }
.tog.on::after { transform: translateX(16px); }
.tog.off { background: #d1d5db; }

.modal-bg {
  position: fixed; inset: 0; background: rgba(0,0,0,.4); backdrop-filter: blur(2px);
  display: flex; align-items: center; justify-content: center; z-index: 50;
}
.modal {
  background: #fff; border-radius: 14px; padding: 1.5rem; width: 520px; max-width: 92vw;
  max-height: 90vh; overflow-y: auto; box-shadow: 0 20px 60px rgba(0,0,0,.18);
}
.modal-title {
  font-size: 15px; font-weight: 700; color: #111; margin-bottom: 1.25rem;
  display: flex; justify-content: space-between; align-items: center;
}
.close-btn {
  background: none; border: none; font-size: 13px; color: #9ca3af; cursor: pointer;
  line-height: 1; padding: 2px 4px; border-radius: 4px; transition: color .1s, background .1s;
}
.close-btn:hover { color: #374151; background: #f3f4f6; }

.fg { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
.fi { display: flex; flex-direction: column; gap: 5px; }
.fi.full { grid-column: 1 / -1; }
.fi label { font-size: 10.5px; font-weight: 700; color: #6b7280; text-transform: uppercase; letter-spacing: .5px; }
.fi input, .fi select, .fi textarea {
  padding: 8px 11px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 13px; color: #111;
  font-family: inherit; width: 100%; transition: border-color .15s, box-shadow .15s;
}
.fi input:focus, .fi select:focus, .fi textarea:focus {
  outline: none; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,.1);
}
.fi textarea { resize: vertical; min-height: 80px; }
.err { font-size: 11px; color: #dc2626; margin-top: 2px; }

.modal-footer {
  display: flex; justify-content: flex-end; gap: 8px; margin-top: 1.25rem;
  padding-top: 1rem; border-top: 1px solid #eaecf0;
}

.d-hero { background: #f8f9fc; border-radius: 10px; padding: 1.25rem; margin-bottom: 1.25rem; }
.d-grid { display: grid; grid-template-columns: 1fr 1fr; gap: .875rem; margin-bottom: 1.25rem; }
.dg label { font-size: 10px; font-weight: 700; color: #9ca3af; text-transform: uppercase; letter-spacing: .5px; display: block; margin-bottom: 3px; }
.dg p { font-size: 13px; color: #374151; font-weight: 500; }
.dg p.mt { color: #c4cdd6; font-style: italic; font-weight: 400; }
.d-desc { background: #f8f9fc; border-radius: 8px; padding: 1rem; font-size: 13px; color: #374151; line-height: 1.75; margin-bottom: 1.25rem; }
.d-footer { display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; border-top: 1px solid #eaecf0; }

.badge { display:inline-block; padding:2px 9px; border-radius:20px; font-size:11px; font-weight:600; }

@media(max-width:768px){
  .dash{padding:1rem}
  .card{overflow-x:auto;-webkit-overflow-scrolling:touch}
  table{min-width:640px}
  .fg{grid-template-columns:1fr}
  .fi.full{grid-column:1}
}
  </style>

  <div>
    <div class="dash">
      <div class="topbar">
        <div>
          <div class="ptitle">Sự kiện</div>
          <div class="psub">Quản lý sự kiện · {{ now()->format('d/m/Y') }}</div>
        </div>
        <button class="btn-prim" wire:click="openCreate">+ Thêm sự kiện</button>
      </div>

      {{-- Tabs trạng thái --}}
      <div style="display:flex;gap:6px;margin-bottom:1rem;flex-wrap:wrap">
        <button wire:click="$set('statusFilter','')"
          style="padding:6px 14px;border-radius:20px;font-size:12.5px;font-weight:600;cursor:pointer;border:1.5px solid {{ $statusFilter==='' ? '#0961aa' : '#e5e7eb' }};background:{{ $statusFilter==='' ? '#eff6ff' : '#fff' }};color:{{ $statusFilter==='' ? '#0961aa' : '#6b7280' }}">
          Tất cả
        </button>
        <button wire:click="$set('statusFilter','active')"
          style="padding:6px 14px;border-radius:20px;font-size:12.5px;font-weight:600;cursor:pointer;border:1.5px solid {{ $statusFilter==='active' ? '#0961aa' : '#e5e7eb' }};background:{{ $statusFilter==='active' ? '#eff6ff' : '#fff' }};color:{{ $statusFilter==='active' ? '#0961aa' : '#6b7280' }};display:inline-flex;align-items:center;gap:6px">
          Đang diễn ra
          @if($activeCount > 0)
            <span style="background:#0961aa;color:#fff;border-radius:10px;padding:1px 7px;font-size:11px;line-height:1.6">{{ $activeCount }}</span>
          @endif
        </button>
        <button wire:click="$set('statusFilter','draft')"
          style="padding:6px 14px;border-radius:20px;font-size:12.5px;font-weight:600;cursor:pointer;border:1.5px solid {{ $statusFilter==='draft' ? '#d97706' : '#e5e7eb' }};background:{{ $statusFilter==='draft' ? '#fffbeb' : '#fff' }};color:{{ $statusFilter==='draft' ? '#d97706' : '#6b7280' }};display:inline-flex;align-items:center;gap:6px">
          Nháp / Ẩn
          @if($draftCount > 0)
            <span style="background:#d97706;color:#fff;border-radius:10px;padding:1px 7px;font-size:11px;line-height:1.6">{{ $draftCount }}</span>
          @endif
        </button>
        <button wire:click="$set('statusFilter','closed')"
          style="padding:6px 14px;border-radius:20px;font-size:12.5px;font-weight:600;cursor:pointer;border:1.5px solid {{ $statusFilter==='closed' ? '#dc2626' : '#e5e7eb' }};background:{{ $statusFilter==='closed' ? '#fef2f2' : '#fff' }};color:{{ $statusFilter==='closed' ? '#dc2626' : '#6b7280' }}">
          Đã đóng
        </button>
      </div>

      <x-toolbar>
        <x-slot:search>
          <x-toolbar.search placeholder="Tìm theo tên, đơn vị tổ chức..." />
        </x-slot:search>
        <x-toolbar.select model="badgeFilter">
          <option value="">Tất cả loại vé</option>
          <option value="free">Miễn phí</option>
          <option value="register">Đăng ký</option>
          <option value="paid">Có phí</option>
        </x-toolbar.select>
      </x-toolbar>

      <x-table minWidth="900px">
        <x-slot:heading>
          <th style="width:4%">STT</th>
          <th style="width:24%">Sự kiện</th>
          <th style="width:14%">Đơn vị tổ chức</th>
          <th style="width:11%">Ngày diễn ra</th>
          <th style="width:9%">Loại vé</th>
          <th style="width:11%">Trạng thái</th>
          <th style="width:8%">Hiển thị</th>
          <th style="width:10%">Ngày tạo</th>
          <th style="width:8%"></th>
        </x-slot:heading>

        @forelse($events as $event)
        @php
          $badgeColor = match($event->badge) { 'paid'=>'purple', 'register'=>'yellow', default=>'green' };
        @endphp
        <tr wire:key="event-{{ $event->id }}" style="{{ $event->status==='draft' ? 'background:#fffbeb' : '' }}">
          <td style="color:#94a3b8;font-size:12px;font-weight:600">{{ $loop->iteration }}</td>
          <td>
            <div style="font-weight:500;color:#111;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:220px">{{ $event->title }}</div>
            <div style="font-size:11px;color:#9ca3af">{{ $event->location ?? '—' }}@if($event->time_range) · {{ $event->time_range }}@endif</div>
          </td>
          <td style="font-weight:500;font-size:13px">{{ $event->organizer ?? '—' }}</td>
          <td style="font-size:12px;color:#6b7280;white-space:nowrap">{{ \Carbon\Carbon::parse($event->event_date)->format('d/m/Y') }}</td>
          <td><x-badge :color="$badgeColor">{{ $event->badge_label }}</x-badge></td>
          <td><x-badge :color="$event->status_color">{{ $event->status_label }}</x-badge></td>
          <td>
            @if($event->status !== 'closed')
              <button wire:click="toggleActive({{ $event->id }})" class="tog {{ $event->status === 'active' ? 'on' : 'off' }}"></button>
            @else
              <span style="font-size:12px;color:#d1d5db">—</span>
            @endif
          </td>
          <td style="font-size:12px;color:#9ca3af;white-space:nowrap">{{ $event->created_at->format('d/m/Y') }}</td>
          <td>
            <x-table.action-btn>
              <div class="adm-dd-item" wire:click="openDetail({{ $event->id }})">
                <i class="fa-solid fa-eye"></i> Xem chi tiết
              </div>
              <div class="adm-dd-item" wire:click="openEdit({{ $event->id }})">
                <i class="fa-solid fa-edit"></i> Chỉnh sửa
              </div>
              @if($event->status === 'active')
                <div class="adm-dd-item" wire:click="setStatus({{ $event->id }}, 'closed')" style="color:#dc2626">
                  <i class="fa-solid fa-lock"></i> Đóng sự kiện
                </div>
              @elseif($event->status === 'closed')
                <div class="adm-dd-item" wire:click="setStatus({{ $event->id }}, 'active')" style="color:#0961aa;font-weight:600">
                  <i class="fa-solid fa-unlock"></i> Mở lại
                </div>
              @endif
              <div class="adm-dd-sep"></div>
              <div class="adm-dd-item red" wire:click="delete({{ $event->id }})" wire:confirm="Xóa sự kiện này?">
                <i class="fa-solid fa-trash"></i> Xóa
              </div>
            </x-table.action-btn>
          </td>
        </tr>
        @empty
        <tr><td colspan="9" class="adm-tbl-empty">Không tìm thấy sự kiện nào.</td></tr>
        @endforelse

        <x-slot:paginationInfo>Hiển thị {{ $events->firstItem() ?? 0 }}–{{ $events->lastItem() ?? 0 }} / {{ $events->total() }} sự kiện</x-slot:paginationInfo>
        <x-slot:pagination>{{ $events->links() }}</x-slot:pagination>
      </x-table>
    </div>

    {{-- ══ Chi tiết ══ --}}
    @if($showDetail && $detail)
      <div class="modal-bg" wire:click.self="$set('showDetail', false)">
        <div class="modal">
          <div class="modal-title">Chi tiết sự kiện<button class="close-btn" wire:click="$set('showDetail', false)">×</button></div>
          <div class="d-hero">
            <div style="font-size:15px;font-weight:600;color:#111">{{ $detail->title }}</div>
            <div style="font-size:12px;color:#6b7280;margin-top:2px">{{ $detail->organizer }}@if($detail->location) · {{ $detail->location }}@endif</div>
            <div style="margin-top:8px;display:flex;gap:6px;flex-wrap:wrap">
              @php
                $bc = match($detail->badge) { 'paid'=>'background:#ede9fe;color:#7c3aed', 'register'=>'background:#fef9c3;color:#ca8a04', default=>'background:#dbeafe;color:#0961aa' };
                $sc = match($detail->status) { 'active'=>'background:#dbeafe;color:#0961aa', 'closed'=>'background:#fee2e2;color:#dc2626', default=>'background:#fef9c3;color:#ca8a04' };
              @endphp
              <span class="badge" style="{{ $bc }}">{{ $detail->badge_label }}</span>
              <span class="badge" style="{{ $sc }}">{{ $detail->status_label }}</span>
            </div>
          </div>
          <div class="d-grid">
            <div class="dg"><label>Ngày diễn ra</label>
              <p>{{ \Carbon\Carbon::parse($detail->event_date)->format('d/m/Y') }}</p>
            </div>
            <div class="dg"><label>Thời gian</label>
              <p class="{{ $detail->time_range ? '' : 'mt' }}">{{ $detail->time_range ?: 'Chưa cập nhật' }}</p>
            </div>
            <div class="dg"><label>Địa điểm</label>
              <p class="{{ $detail->location ? '' : 'mt' }}">{{ $detail->location ?? 'Chưa cập nhật' }}</p>
            </div>
            <div class="dg"><label>Email liên hệ</label>
              <p class="{{ $detail->contact_email ? '' : 'mt' }}">{{ $detail->contact_email ?? 'Chưa cập nhật' }}</p>
            </div>
            <div class="dg"><label>Số người đăng ký</label>
              <p>{{ $detail->registrations_count }}</p>
            </div>
            <div class="dg"><label>Ngày tạo</label>
              <p>{{ $detail->created_at->format('d/m/Y') }}</p>
            </div>
          </div>
          @if($detail->description)
            <div style="font-size:11px;font-weight:600;color:#9ca3af;text-transform:uppercase;letter-spacing:.4px;margin-bottom:8px">Mô tả</div>
            <div class="d-desc">{{ $detail->description }}</div>
          @endif
          <div class="d-footer">
            <button class="btn-xs btn-del-sm" wire:click="delete({{ $detail->id }})" wire:confirm="Xóa sự kiện này?">
              <i class="fa-solid fa-trash"></i> Xóa
            </button>
            <div style="display:flex;gap:8px">
              <button class="btn-xs" wire:click="$set('showDetail', false)">Đóng</button>
              <button class="btn-prim" wire:click="openEdit({{ $detail->id }})">
                <i class="fa-solid fa-edit"></i> Chỉnh sửa
              </button>
            </div>
          </div>
        </div>
      </div>
    @endif

    {{-- ══ Thêm / Sửa ══ --}}
    @if($showForm)
      <div class="modal-bg" wire:click.self="$set('showForm', false)">
        <div class="modal">
          <div class="modal-title">
            {{ $editId ? 'Chỉnh sửa sự kiện' : 'Thêm sự kiện mới' }}
            <button class="close-btn" wire:click="$set('showForm', false)">×</button>
          </div>
          <div class="fg">
            <div class="fi full"><label>Tên sự kiện *</label>
              <input wire:model="title" type="text" placeholder="VD: Ngày hội việc làm 2026">
              @error('title')<div class="err">{{ $message }}</div>@enderror
            </div>
            <div class="fi"><label>Đơn vị tổ chức *</label>
              <input wire:model="organizer" type="text" placeholder="Khoa CNTT">
              @error('organizer')<div class="err">{{ $message }}</div>@enderror
            </div>
            <div class="fi"><label>Địa điểm</label>
              <input wire:model="location" type="text" placeholder="Hội trường A">
            </div>
            <div class="fi"><label>Ngày diễn ra *</label>
              <input wire:model="event_date" type="date">
              @error('event_date')<div class="err">{{ $message }}</div>@enderror
            </div>
            <div class="fi"><label>Loại vé</label>
              <select wire:model="badge">
                <option value="free">Miễn phí</option>
                <option value="register">Đăng ký</option>
                <option value="paid">Có phí</option>
              </select>
            </div>
            <div class="fi"><label>Giờ bắt đầu</label>
              <input wire:model="start_time" type="time">
            </div>
            <div class="fi"><label>Giờ kết thúc</label>
              <input wire:model="end_time" type="time">
            </div>
            <div class="fi full"><label>Email liên hệ</label>
              <input wire:model="contact_email" type="email" placeholder="lienhe@truong.edu.vn">
              @error('contact_email')<div class="err">{{ $message }}</div>@enderror
            </div>
            <div class="fi full"><label>Mô tả</label>
              <textarea wire:model="description" placeholder="Nội dung, chương trình sự kiện..."></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn-xs" wire:click="$set('showForm', false)">Hủy</button>
            <button class="btn-prim" wire:click="save">
              <span wire:loading wire:target="save">Đang lưu...</span>
              <span wire:loading.remove wire:target="save">{{ $editId ? 'Cập nhật' : 'Thêm sự kiện' }}</span>
            </button>
          </div>
        </div>
      </div>
    @endif
  </div>
</div>
