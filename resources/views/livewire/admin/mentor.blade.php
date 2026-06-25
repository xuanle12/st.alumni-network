<div>
<style>
:root{
    --bg:#f8fafc;
    --card:#ffffff;
    --border:#e2e8f0;
    --text:#0f172a;
    --muted:#64748b;
    --primary:#2563eb;
    --success:#16a34a;
}

.adm-mentor-wrap{
    padding:24px;
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
    font-weight:800;
    color:var(--text);
    margin:0;
}

.adm-title p{
    margin-top:6px;
    color:var(--muted);
    font-size:15px;
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
}

.adm-btn-review{
    background:#2563eb;
    color:#fff;
}

.adm-btn-approve{
    background:#16a34a;
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
</style>

<div class="container adm-mentor-wrap">

  <div class="adm-mentor-top">
    <div class="adm-title">
        <h1>Quản lý Mentor</h1>
        <p>Quản lý đăng ký mentor và xét duyệt hồ sơ</p>
    </div>
  </div>

  <x-toolbar>
    <x-slot:search>
      <x-toolbar.search placeholder="Tìm theo tên..." />
    </x-slot:search>
    <x-toolbar.select model="filterStatus">
      <option value="">Tất cả trạng thái</option>
      <option value="pending">Chờ duyệt</option>
      <option value="approved">Đã duyệt</option>
      <option value="rejected">Từ chối</option>
    </x-toolbar.select>
  </x-toolbar>

  <x-table>
    <x-slot:heading>
      <th style="width:5%">STT</th>
      <th style="width:22%">Họ tên</th>
      <th style="width:25%">Lĩnh vực</th>
      <th style="width:18%">Liên hệ</th>
      <th style="width:12%">Trạng thái</th>
      <th style="width:10%">Ngày ĐK</th>
      <th style="width:8%">Hành động</th>
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
          @if($mentor->status === 'pending')
            <button wire:click="$set('selectedId', {{ $mentor->id }})" class="adm-btn-review">Xét duyệt</button>
          @else
            <button wire:click="$set('selectedId', {{ $mentor->id }})" class="adm-btn-change">Đổi TT</button>
          @endif
        @endif
      </td>
    </tr>
    @empty
    <tr><td colspan="7" class="adm-tbl-empty">Chưa có đơn đăng ký mentor nào.</td></tr>
    @endforelse

    <x-slot:paginationInfo>Hiển thị {{ $mentors->firstItem() ?? 0 }}–{{ $mentors->lastItem() ?? 0 }} / {{ $mentors->total() }} mentor</x-slot:paginationInfo>
    <x-slot:pagination>{{ $mentors->links() }}</x-slot:pagination>
  </x-table>

</div>
</div>
