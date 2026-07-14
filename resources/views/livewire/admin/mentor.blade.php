<div>
<style>
:root{
    --bg:#f8fafc;
    --card:#ffffff;
    --border:#e2e8f0;
    --text:#0f172a;
    --muted:#64748b;
    --primary:#2563eb;
    --success:#0961aa;
}

.adm-mentor-wrap{
    padding:1.75rem;
}

.adm-mentor-top{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    gap:20px;
    margin-bottom:20px;
}

.adm-title h1{
    font-size:20px;
    font-weight:700;
    color:var(--text);
    letter-spacing:-.4px;
    margin:0;
}

.adm-title p{
    margin-top:3px;
    color:var(--muted);
    font-size:13px;
}



.adm-user{
    display:flex;
    flex-direction:column;
    gap:4px;
}

.adm-name{
    font-size:16px;
    font-weight:700;
    color:var(--text);
    line-height:1.2;
}

.adm-email{
    font-size:13px;
    color:#94a3b8;
}

.adm-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    padding:6px 14px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
}

.adm-action-form{
    display:flex;
    flex-direction:column;
    gap:10px;
    width:260px;
}

.adm-note{
    width:100%;
    min-height:80px;
    border:1px solid var(--border);
    border-radius:10px;
    padding:10px;
    resize:none;
}

.adm-action-btns{
    display:flex;
    gap:8px;
}

.adm-btn-approve,
.adm-btn-reject,
.adm-btn-review,
.adm-btn-change,
.adm-btn-cancel{
    border:none;
    border-radius:10px;
    padding:8px 14px;
    font-size:13px;
    font-weight:600;
    cursor:pointer;
    transition:.2s;
    white-space:nowrap;
}

/* hàng nút + 3 chấm ở cột hành động */
.adm-row-actions{display:flex;align-items:center;justify-content:center;gap:6px;flex-wrap:nowrap}

.adm-btn-review{
    background:#2563eb;
    color:#fff;
}

.adm-btn-approve{
    background:#0961aa;
    color:#fff;
}

.adm-btn-reject{
    background:#dc2626;
    color:#fff;
}

.adm-btn-change{
    background:#f1f5f9;
    color:#334155;
    border:1px solid #e2e8f0;
}

.adm-btn-cancel{
    background:#e5e7eb;
    color:#475569;
}

.adm-btn-review:hover,
.adm-btn-approve:hover,
.adm-btn-reject:hover{
    transform:translateY(-1px);
}

.adm-empty{
    padding:60px;
    text-align:center;
    color:#94a3b8;
}

.adm-pagination{ margin-top:4px; }

[x-cloak]{display:none!important}

/* ── Nút thêm ── */
.adm-btn-add{
    display:inline-flex;align-items:center;gap:7px;flex-shrink:0;
    padding:9px 18px;background:#0961aa;color:#fff;border:none;
    border-radius:9px;font-size:13px;font-weight:600;cursor:pointer;
    font-family:inherit;transition:background .15s,transform .1s;
}
.adm-btn-add:hover{background:#075490}
.adm-btn-add:active{transform:scale(.98)}

/* ── Modal ── */
.m-bg{position:fixed;inset:0;background:rgba(0,0,0,.4);backdrop-filter:blur(2px);
    display:flex;align-items:center;justify-content:center;z-index:50;padding:16px}
.m-box{background:#fff;border-radius:14px;padding:1.5rem;width:560px;max-width:100%;
    max-height:90vh;overflow-y:auto;box-shadow:0 20px 60px rgba(0,0,0,.18)}
.m-title{font-size:15px;font-weight:700;color:#111;margin-bottom:1.25rem;
    display:flex;justify-content:space-between;align-items:center}
.m-x{background:none;border:none;font-size:16px;color:#9ca3af;cursor:pointer;
    line-height:1;padding:2px 6px;border-radius:4px;transition:.1s}
.m-x:hover{color:#374151;background:#f3f4f6}
.m-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.m-fi{display:flex;flex-direction:column;gap:5px}
.m-fi.full{grid-column:1/-1}
.m-fi label{font-size:10.5px;font-weight:700;color:#6b7280;text-transform:uppercase;letter-spacing:.5px}
.m-fi input,.m-fi select,.m-fi textarea{padding:8px 11px;border:1px solid #d1d5db;
    border-radius:8px;font-size:13px;color:#111;font-family:inherit;width:100%;
    transition:border-color .15s,box-shadow .15s}
.m-fi input:focus,.m-fi select:focus,.m-fi textarea:focus{outline:none;border-color:#0961aa;
    box-shadow:0 0 0 3px rgba(9,97,170,.1)}
.m-fi textarea{resize:vertical;min-height:70px}
.m-err{font-size:11px;color:#dc2626;margin-top:2px}
.m-userpick{position:relative}
.m-userbox{display:flex;align-items:center;justify-content:space-between;gap:8px;
    padding:8px 11px;border:1px solid #d1d5db;border-radius:8px;font-size:13px;background:#f8fafc}
.m-userclear{background:none;border:none;color:#dc2626;cursor:pointer;font-size:12px;font-weight:600}
.m-suggest{position:absolute;left:0;right:0;top:calc(100% + 4px);z-index:20;background:#fff;
    border:1px solid #d1d5db;border-radius:8px;box-shadow:0 8px 24px rgba(0,0,0,.08);
    max-height:220px;overflow-y:auto}
.m-suggest-item{padding:8px 12px;font-size:12.5px;color:#374151;cursor:pointer;transition:.1s}
.m-suggest-item:hover{background:#eff6ff;color:#0961aa}
.m-suggest-item small{color:#94a3b8;display:block;font-size:11px}
.m-suggest-empty{padding:10px 12px;font-size:12px;color:#94a3b8}
.m-footer{display:flex;justify-content:flex-end;gap:8px;margin-top:1.25rem;
    padding-top:1rem;border-top:1px solid #eaecf0}
.m-btn{font-size:13px;padding:8px 16px;border-radius:8px;border:1px solid #d1d5db;
    background:#fff;color:#374151;cursor:pointer;font-family:inherit;font-weight:600;transition:.1s}
.m-btn:hover{background:#f9fafb}
.m-btn-prim{background:#0961aa;color:#fff;border-color:#0961aa}
.m-btn-prim:hover{background:#075490}
.m-btn-danger{background:#dc2626;color:#fff;border-color:#dc2626}
.m-btn-danger:hover{background:#b91c1c}
.m-del-ico{width:52px;height:52px;border-radius:50%;background:#fef2f2;color:#dc2626;
    display:flex;align-items:center;justify-content:center;font-size:22px;margin:0 auto 14px}
@media(max-width:600px){.m-grid{grid-template-columns:1fr}.m-fi.full{grid-column:1}}
</style>

<div class="container adm-mentor-wrap">

  <div class="adm-mentor-top">
    <div class="adm-title">
        <h1>Quản lý Mentor</h1>
        <p>Quản lý đăng ký mentor và xét duyệt hồ sơ</p>
    </div>
    <button class="adm-btn-add" wire:click="openCreate">
        <i class="fa-solid fa-plus"></i> Thêm mentor
    </button>
  </div>

  <x-status-tabs :current="$filterStatus" :tabs="[
    ['value' => '',         'label' => 'Tất cả'],
    ['value' => 'pending',  'label' => 'Chờ duyệt', 'count' => $statusCounts['pending'],  'color' => 'amber'],
    ['value' => 'approved', 'label' => 'Đã duyệt',  'count' => $statusCounts['approved'], 'color' => 'blue'],
    ['value' => 'rejected', 'label' => 'Từ chối',   'count' => $statusCounts['rejected'], 'color' => 'red'],
  ]" />

  <x-toolbar>
    <x-slot:search>
      <x-toolbar.search placeholder="Tìm theo tên..." />
    </x-slot:search>
  </x-toolbar>

  <x-table minWidth="960px">
    <x-slot:heading>
      <th style="width:5%">STT</th>
      <th style="width:22%">Họ tên</th>
      <th style="width:25%">Lĩnh vực</th>
      <th style="width:19%">Liên hệ</th>
      <th style="width:11%">Trạng thái</th>
      <th style="width:10%">Ngày ĐK</th>
      <th style="width:8%;text-align:center">Hành động</th>
    </x-slot:heading>

    @forelse($mentors as $mentor)
    @php
      $mColor = match($mentor->status) { 'approved'=>'green', 'pending'=>'yellow', default=>'red' };
    @endphp
    <tr>
      <td style="color:#94a3b8;font-size:13px">{{ $mentor->id }}</td>
      <td>
        <div class="adm-name">{{ $mentor->user->name }}</div>
        <div class="adm-email">{{ $mentor->user->email }}</div>
      </td>
      <td style="font-size:13px;color:#475569">{{ Str::limit($mentor->expertise, 40) }}</td>
      <td style="font-size:13px;color:#475569">{{ $mentor->contact_info ?? '—' }}</td>
      <td><x-badge :color="$mColor">{{ $mentor->status_label }}</x-badge></td>
      <td style="font-size:12px;color:#94a3b8">{{ $mentor->created_at->format('d/m/Y') }}</td>
      <td>
        @if($selectedId === $mentor->id)
          <div class="adm-action-form">
            <textarea wire:model="admin_note" class="adm-note" placeholder="Ghi chú (tuỳ chọn)..."></textarea>
            <div class="adm-action-btns">
              <button wire:click="approve({{ $mentor->id }})" class="adm-btn-approve">✓ Duyệt</button>
              <button wire:click="reject({{ $mentor->id }})"  class="adm-btn-reject">✗ Từ chối</button>
              <button wire:click="$set('selectedId', null)"   class="adm-btn-cancel">Huỷ</button>
            </div>
          </div>
        @else
          <div class="adm-row-actions">
            <x-table.action-btn>
              @if($mentor->status === 'pending')
                <div class="adm-dd-item" wire:click="$set('selectedId', {{ $mentor->id }})">
                  <span class="adm-dd-ic"><i class="fa-solid fa-clipboard-check"></i></span> Xét duyệt
                </div>
              @else
                <div class="adm-dd-item" wire:click="$set('selectedId', {{ $mentor->id }})">
                  <span class="adm-dd-ic"><i class="fa-solid fa-arrows-rotate"></i></span> Đổi trạng thái
                </div>
              @endif
              <div class="adm-dd-sep"></div>
              <div class="adm-dd-item" wire:click="openEdit({{ $mentor->id }})">
                <span class="adm-dd-ic"><i class="fa-solid fa-pen-to-square"></i></span> Chỉnh sửa
              </div>
              <div class="adm-dd-sep"></div>
              <div class="adm-dd-item red" wire:click="confirmDelete({{ $mentor->id }})">
                <span class="adm-dd-ic"><i class="fa-solid fa-trash"></i></span> Xóa
              </div>
            </x-table.action-btn>
          </div>
        @endif
      </td>
    </tr>
    @empty
    <tr><td colspan="7" class="adm-tbl-empty">Chưa có đơn đăng ký mentor nào.</td></tr>
    @endforelse

    <x-slot:paginationInfo>Hiển thị {{ $mentors->firstItem() ?? 0 }}–{{ $mentors->lastItem() ?? 0 }} / {{ $mentors->total() }} mentor</x-slot:paginationInfo>
    <x-slot:pagination>{{ $mentors->links() }}</x-slot:pagination>
  </x-table>

  {{-- ── Modal Thêm / Sửa ── --}}
  @if($showForm)
  <div class="m-bg" wire:click.self="closeForm">
    <div class="m-box">
      <div class="m-title">
        {{ $editId ? 'Chỉnh sửa mentor' : 'Thêm mentor mới' }}
        <button class="m-x" wire:click="closeForm">×</button>
      </div>

      <div class="m-grid">
        {{-- Người dùng --}}
        <div class="m-fi full">
          <label>Người dùng *</label>
          @if($editId)
            <div class="m-userbox">
              <span><i class="fa-solid fa-user" style="color:#94a3b8"></i> {{ $f_userName }}</span>
            </div>
          @elseif($f_user_id)
            <div class="m-userbox">
              <span><i class="fa-solid fa-user-check" style="color:#0961aa"></i> {{ $f_userName }}</span>
              <button type="button" class="m-userclear" wire:click="$set('f_user_id', null)">Đổi</button>
            </div>
          @else
            <div class="m-userpick" x-data="{open:false}" @click.outside="open=false">
              <input type="text" wire:model.live.debounce.300ms="userSearch"
                     placeholder="Tìm cựu sinh viên theo tên hoặc email..." autocomplete="off" @focus="open=true">
              <div class="m-suggest" x-show="open" x-cloak>
                @forelse($this->userSuggestions as $u)
                  <div class="m-suggest-item" wire:click="selectUser({{ $u->id }})" @click="open=false">
                    {{ $u->name }} <small>{{ $u->email }}</small>
                  </div>
                @empty
                  <div class="m-suggest-empty">Không tìm thấy người dùng phù hợp.</div>
                @endforelse
              </div>
            </div>
            @error('f_user_id')<div class="m-err">{{ $message }}</div>@enderror
          @endif
        </div>

        <div class="m-fi full">
          <label>Lĩnh vực chuyên môn *</label>
          <input type="text" wire:model="f_expertise" placeholder="VD: Lập trình Web, Data Science...">
          @error('f_expertise')<div class="m-err">{{ $message }}</div>@enderror
        </div>

        <div class="m-fi full">
          <label>Kỹ năng *</label>
          <input type="text" wire:model="f_skills" placeholder="VD: PHP, Laravel, React...">
          @error('f_skills')<div class="m-err">{{ $message }}</div>@enderror
        </div>

        <div class="m-fi">
          <label>Liên hệ</label>
          <input type="text" wire:model="f_contact" placeholder="Email / SĐT / Zalo...">
          @error('f_contact')<div class="m-err">{{ $message }}</div>@enderror
        </div>

        <div class="m-fi">
          <label>Số mentee tối đa</label>
          <input type="number" min="1" max="50" wire:model="f_max">
          @error('f_max')<div class="m-err">{{ $message }}</div>@enderror
        </div>

        <div class="m-fi full">
          <label>Trạng thái</label>
          <select wire:model="f_status">
            <option value="pending">Chờ duyệt</option>
            <option value="approved">Đã duyệt</option>
            <option value="rejected">Từ chối</option>
          </select>
        </div>

        <div class="m-fi full">
          <label>Giới thiệu (bio)</label>
          <textarea wire:model="f_bio" placeholder="Mô tả kinh nghiệm, định hướng hỗ trợ mentee..."></textarea>
          @error('f_bio')<div class="m-err">{{ $message }}</div>@enderror
        </div>
      </div>

      <div class="m-footer">
        <button class="m-btn" wire:click="closeForm">Huỷ</button>
        <button class="m-btn m-btn-prim" wire:click="save">
          <span wire:loading.remove wire:target="save">{{ $editId ? 'Cập nhật' : 'Thêm mentor' }}</span>
          <span wire:loading wire:target="save">Đang lưu...</span>
        </button>
      </div>
    </div>
  </div>
  @endif

  {{-- ── Modal Xoá ── --}}
  @if($showDelete)
  <div class="m-bg" wire:click.self="closeDelete">
    <div class="m-box" style="width:400px;text-align:center">
      <div class="m-del-ico"><i class="fa-solid fa-trash"></i></div>
      <div style="font-size:15px;font-weight:700;color:#111;margin-bottom:6px">Xoá hồ sơ mentor?</div>
      <div style="font-size:13px;color:#6b7280;margin-bottom:1.25rem">
        Bạn có chắc muốn xoá hồ sơ mentor của <strong>{{ $deleteName }}</strong>? Hành động này không thể hoàn tác.
      </div>
      <div style="display:flex;gap:8px;justify-content:center">
        <button class="m-btn" wire:click="closeDelete">Huỷ</button>
        <button class="m-btn m-btn-danger" wire:click="destroy">
          <i class="fa-solid fa-trash"></i> Xoá
        </button>
      </div>
    </div>
  </div>
  @endif

</div>
</div>
