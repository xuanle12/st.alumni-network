<div>
<style>
.adm-mentor-wrap        { padding: 32px 0 48px; }
.adm-mentor-top         { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; margin-bottom: 24px; }
.adm-mentor-top h1      { font-size: 22px; font-weight: 800; color: var(--blue); }
.adm-mentor-filters     { display: flex; gap: 10px; flex-wrap: wrap; }
.adm-mentor-input       { padding: 8px 14px; border: 1px solid var(--border); border-radius: 8px; font-size: 14px; font-family: inherit; }
.adm-mentor-input:focus { outline: none; border-color: var(--blue); }

.adm-flash              { background: #dcfce7; border: 1px solid #86efac; color: #166534; padding: 10px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }

.adm-table-wrap         { background: #fff; border: 1px solid var(--border); border-radius: 12px; overflow: hidden; }
.adm-table              { width: 100%; border-collapse: collapse; font-size: 14px; }
.adm-table thead tr     { background: #f8faf9; border-bottom: 1px solid var(--border); }
.adm-table th           { padding: 12px 16px; text-align: left; font-weight: 600; color: var(--text-muted); }
.adm-table td           { padding: 12px 16px; border-bottom: 1px solid var(--border); vertical-align: middle; }
.adm-table tbody tr:last-child td { border-bottom: none; }

.adm-name               { font-weight: 600; color: var(--text); }
.adm-email              { font-size: 12px; color: var(--text-muted); }

.adm-badge              { padding: 3px 10px; border-radius: 20px; font-size: 12px; font-weight: 600; }

.adm-action-form        { display: flex; flex-direction: column; gap: 6px; min-width: 200px; }
.adm-note               { padding: 6px 10px; border: 1px solid var(--border); border-radius: 6px; font-size: 12px; font-family: inherit; resize: vertical; min-height: 50px; }
.adm-action-btns        { display: flex; gap: 6px; }
.adm-btn-approve        { background: #16a34a; color: #fff; border: none; padding: 5px 12px; border-radius: 6px; font-size: 12px; cursor: pointer; font-family: inherit; }
.adm-btn-reject         { background: #dc2626; color: #fff; border: none; padding: 5px 12px; border-radius: 6px; font-size: 12px; cursor: pointer; font-family: inherit; }
.adm-btn-cancel         { background: #f1f5f9; color: var(--text-muted); border: 1px solid var(--border); padding: 5px 10px; border-radius: 6px; font-size: 12px; cursor: pointer; font-family: inherit; }
.adm-btn-review         { background: var(--blue); color: #fff; border: none; padding: 6px 12px; border-radius: 6px; font-size: 12px; cursor: pointer; font-family: inherit; }
.adm-btn-change         { background: #f1f5f9; color: var(--text-muted); border: 1px solid var(--border); padding: 6px 12px; border-radius: 6px; font-size: 12px; cursor: pointer; font-family: inherit; }

.adm-empty              { padding: 40px; text-align: center; color: var(--text-muted); }
.adm-pagination         { margin-top: 20px; }
</style>

<div class="container adm-mentor-wrap">

  <div class="adm-mentor-top">
    <h1><i class="fa-solid fa-user-graduate"></i> Quản lý Mentor</h1>
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
          <th>#</th>
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
