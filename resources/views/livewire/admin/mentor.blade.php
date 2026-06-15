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

.adm-mentor-filters{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
}

.adm-mentor-input{
    height:46px;
    border:1px solid var(--border);
    border-radius:12px;
    padding:0 16px;
    background:#fff;
    font-size:14px;
    min-width:220px;
}

.adm-mentor-input:focus{
    outline:none;
    border-color:var(--primary);
}

.adm-table-wrap{
    background:var(--card);
    border:1px solid var(--border);
    border-radius:20px;
    overflow:hidden;
}

.adm-table{
    width:100%;
    border-collapse:collapse;
}

.adm-table thead{
    background:#f8fafc;
}

.adm-table th{
    padding:18px 20px;
    text-align:left;
    font-size:13px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:.05em;
    color:#64748b;
    border-bottom:1px solid var(--border);
}

.adm-table td{
    padding:18px 20px;
    border-bottom:1px solid #f1f5f9;
    vertical-align:middle;
}

.adm-table tbody tr:hover{
    background:#fafcff;
}

.adm-table tbody tr:last-child td{
    border-bottom:none;
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

.adm-pagination{
    margin-top:20px;
}
</style>

<div class="container adm-mentor-wrap">

  <div class="adm-mentor-top">
    <div class="adm-title">
        <h1>Quản lý Mentor</h1>
        <p>Quản lý đăng ký mentor và xét duyệt hồ sơ</p>
    </div>
    <div class="adm-mentor-filters">
      <input wire:model.live.debounce.300ms="search" type="text"
             class="adm-mentor-input" placeholder="Tìm theo tên...">
      <select wire:model.live="filterStatus" class="adm-mentor-input" style="background:#fff">
        <option value="">Tất cả trạng thái</option>
        <option value="pending">Chờ duyệt</option>
        <option value="approved">Đã duyệt</option>
        <option value="rejected">Từ chối</option>
      </select>
    </div>
  </div>

  @if(session('success'))
    <div class="adm-flash">{{ session('success') }}</div>
  @endif

  <div class="adm-table-wrap">
    <table class="adm-table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Họ tên</th>
          <th>Lĩnh vực</th>
          <th>Liên hệ</th>
          <th>Trạng thái</th>
          <th>Ngày đăng ký</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        @forelse($mentors as $mentor)
          <tr>
            <td style="color:var(--text-muted)">{{ $mentor->id }}</td>
            <td>
              <div class="adm-name">{{ $mentor->user->name }}</div>
              <div class="adm-email">{{ $mentor->user->email }}</div>
            </td>
            <td>{{ Str::limit($mentor->expertise, 40) }}</td>
            <td style="font-size:13px">{{ $mentor->contact_info ?? '—' }}</td>
            <td>
              @php
                $colors = [
                  'pending'  => ['bg'=>'#fef9c3','text'=>'#854d0e'],
                  'approved' => ['bg'=>'#dcfce7','text'=>'#166534'],
                  'rejected' => ['bg'=>'#fee2e2','text'=>'#991b1b'],
                ];
                $c = $colors[$mentor->status] ?? ['bg'=>'#f1f5f9','text'=>'#64748b'];
              @endphp
              <span class="adm-badge" style="background:{{ $c['bg'] }};color:{{ $c['text'] }}">
                {{ $mentor->status_label }}
              </span>
            </td>
            <td style="color:var(--text-muted);font-size:13px">
              {{ $mentor->created_at->format('d/m/Y') }}
            </td>
            <td>
              @if($selectedId === $mentor->id)
                <div class="adm-action-form">
                  <textarea wire:model="admin_note" class="adm-note"
                            placeholder="Ghi chú (tuỳ chọn)..."></textarea>
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
                  <button wire:click="$set('selectedId', {{ $mentor->id }})" class="adm-btn-change">Đổi trạng thái</button>
                @endif
              @endif
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="adm-empty">Chưa có đơn đăng ký mentor nào.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="adm-pagination">{{ $mentors->links() }}</div>

</div>
</div>
