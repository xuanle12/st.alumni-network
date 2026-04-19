<div>
    <style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
.dash{padding:1.75rem}
.topbar{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:1.75rem}
.page-title{font-size:20px;font-weight:600;color:#111;letter-spacing:-.3px}
.page-sub{font-size:12px;color:#9ca3af;margin-top:3px}
.flash-ok{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px;margin-bottom:1rem}
 
/* Stats */
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-bottom:1.25rem}
.stat{background:#fff;border:1px solid #eaecf0;border-radius:8px;padding:.875rem 1rem}
.stat-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:8px}
.stat-label{font-size:11px;color:#9ca3af}
.stat-ico{width:28px;height:28px;border-radius:6px;display:flex;align-items:center;justify-content:center}
.stat-val{font-size:22px;font-weight:600;color:#111;line-height:1}
.stat-sub{font-size:11px;margin-top:5px}
.up{color:#16a34a}.warn{color:#d97706}.muted{color:#9ca3af}
 
/* Charts row */
.row2{display:grid;grid-template-columns:1.6fr 1fr;gap:10px;margin-bottom:10px}
.card{background:#fff;border:1px solid #eaecf0;border-radius:8px;padding:1rem 1.1rem}
.card-hd{display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem}
.card-title{font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:.05em}
.chart-wrap{height:120px;display:flex;align-items:flex-end;gap:5px}
.bar-col{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px}
.bar{width:100%;border-radius:3px 3px 0 0;transition:opacity .15s}
.bar:hover{opacity:.75}
.bar-lbl{font-size:9px;color:#9ca3af}
.leg{display:flex;flex-direction:column;gap:10px;justify-content:center;height:100%}
.leg-row{display:flex;align-items:center;gap:8px;font-size:12px;color:#374151}
.leg-dot{width:8px;height:8px;border-radius:2px;flex-shrink:0}
.leg-num{margin-left:auto;font-weight:600;color:#111;font-size:13px}
 
/* Bottom row */
.row3{display:grid;grid-template-columns:1.6fr 1fr;gap:10px}
table{width:100%;border-collapse:collapse}
thead th{font-size:10px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;color:#9ca3af;padding:5px 8px;text-align:left;border-bottom:1px solid #eaecf0}
tbody tr{border-bottom:1px solid #f3f4f6;transition:background .1s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:#fafafa}
td{padding:8px;font-size:12px;color:#374151;vertical-align:middle}
.badge{display:inline-block;font-size:10px;font-weight:500;padding:2px 7px;border-radius:4px}
.b-yellow{background:#fef9c3;color:#92400e}
.b-green{background:#f0fdf4;color:#166534}
.b-red{background:#fef2f2;color:#991b1b}
.b-gray{background:#f3f4f6;color:#6b7280}
.btn-xs{font-size:11px;padding:4px 10px;border-radius:6px;border:1px solid #d1d5db;background:#fff;color:#374151;cursor:pointer}
.btn-xs:hover{background:#f9fafb}
.btn-ok{border-color:#86efac;color:#166534;background:#f0fdf4}
.btn-ok:hover{background:#dcfce7}
.btn-no{border-color:#fca5a5;color:#991b1b;background:#fef2f2}
.btn-no:hover{background:#fee2e2}
.act-row{display:flex;gap:10px;padding:7px 0;border-bottom:1px solid #f3f4f6}
.act-row:last-child{border-bottom:none}
.act-mark{width:6px;height:6px;border-radius:50%;flex-shrink:0;margin-top:4px}
.act-txt{font-size:12px;color:#374151;line-height:1.4}
.act-time{font-size:10px;color:#9ca3af;margin-top:1px}
 
@media(max-width:900px){
  .stats{grid-template-columns:1fr 1fr}
  .row2,.row3{grid-template-columns:1fr}
}
@media(max-width:480px){
  .stats{grid-template-columns:1fr 1fr}
  .dash{padding:1rem}
}
</style>
<div>
<div>
    <div class="dash">
  <div class="topbar">
    <div>
      <div class="page-title">Dashboard</div>
      <div class="page-sub">{{ now()->isoFormat('dddd, DD/MM/YYYY') }}</div>
    </div>
  </div>
 
  @if(session('success'))
    <div class="flash-ok">✓ {{ session('success') }}</div>
  @endif
 
  {{-- Stats --}}
  <div class="stats">
    <div class="stat">
      <div class="stat-top">
        <div class="stat-label">Cựu sinh viên</div>
        <div class="stat-ico" style="background:#eff6ff">
          <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5" r="3" stroke="#3b82f6" stroke-width="1.5"/><path d="M2 13c0-3 2.7-5 6-5s6 2 6 5" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
      </div>
      <div class="stat-val">{{ number_format($totalAlumni) }}</div>
      <div class="stat-sub up">↑ Đang hoạt động</div>
    </div>
    <div class="stat">
      <div class="stat-top">
        <div class="stat-label">Chờ duyệt</div>
        <div class="stat-ico" style="background:#fffbeb">
          <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="#d97706" stroke-width="1.5"/><path d="M8 5v3.5l2 2" stroke="#d97706" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
      </div>
      <div class="stat-val">{{ $pendingCount }}</div>
      <div class="stat-sub warn">Cần xử lý</div>
    </div>
    <div class="stat">
      <div class="stat-top">
        <div class="stat-label">Tuyển dụng</div>
        <div class="stat-ico" style="background:#f0fdf4">
          <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="10" rx="1.5" stroke="#16a34a" stroke-width="1.5"/><path d="M5 7h6M5 10h4" stroke="#16a34a" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
      </div>
      <div class="stat-val">{{ $jobCount }}</div>
      <div class="stat-sub up">Đang hiển thị</div>
    </div>
    <div class="stat">
      <div class="stat-top">
        <div class="stat-label">Sự kiện sắp tới</div>
        <div class="stat-ico" style="background:#faf5ff">
          <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="11" rx="1.5" stroke="#9333ea" stroke-width="1.5"/><path d="M5 1v4M11 1v4M2 7h12" stroke="#9333ea" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
      </div>
      <div class="stat-val">{{ $eventCount }}</div>
      <div class="stat-sub muted">30 ngày tới</div>
    </div>
  </div>
 
  {{-- Charts --}}
  <div class="row2">
    <div class="card">
      <div class="card-hd">
        <div class="card-title">Đăng ký theo tháng ({{ now()->year }})</div>
      </div>
      <div class="chart-wrap" id="bar-chart"
           data-vals="{{ json_encode($monthlyStats) }}">
      </div>
    </div>
    <div class="card">
      <div class="card-hd"><div class="card-title">Trạng thái hồ sơ</div></div>
      <div class="leg">
        <div class="leg-row"><div class="leg-dot" style="background:#3b82f6"></div>Hoạt động<span class="leg-num">{{ number_format($statusStats['active']) }}</span></div>
        <div class="leg-row"><div class="leg-dot" style="background:#d97706"></div>Chờ duyệt<span class="leg-num">{{ number_format($statusStats['pending']) }}</span></div>
        <div class="leg-row"><div class="leg-dot" style="background:#d1d5db"></div>Không HĐ<span class="leg-num">{{ number_format($statusStats['inactive']) }}</span></div>
      </div>
    </div>
  </div>
 
  {{-- Table + Activity --}}
  <div class="row3">
    <div class="card">
      <div class="card-hd">
        <div class="card-title">Hồ sơ gần đây</div>
        <a href="#" class="btn-xs">Xem tất cả</a>
      </div>
      <table>
        <thead>
          <tr><th>Họ tên</th><th>MSV</th><th>Lớp</th><th>Ngày</th><th>Trạng thái</th><th></th></tr>
        </thead>
        <tbody>
          @forelse($recentProfiles as $profile)
          <tr>
            <td>{{ $profile->user?->name ?? '—' }}</td>
            <td style="color:#9ca3af">{{ $profile->msv ?? '—' }}</td>
            <td>{{ $profile->lop ?? '—' }}</td>
            <td style="color:#9ca3af">{{ $profile->created_at->format('d/m') }}</td>
            <td>
              @if($profile->status === 'active')
                <span class="badge b-green">Hoạt động</span>
              @elseif($profile->status === 'pending')
                <span class="badge b-yellow">Chờ duyệt</span>
              @else
                <span class="badge b-red">Từ chối</span>
              @endif
            </td>
            <td>
              @if($profile->status === 'pending')
                <div style="display:flex;gap:4px">
                  <button wire:click="approve({{ $profile->id }})" class="btn-xs btn-ok">✓</button>
                  <button wire:click="reject({{ $profile->id }})" class="btn-xs btn-no">✕</button>
                </div>
              @endif
            </td>
          </tr>
          @empty
            <tr><td colspan="6" style="text-align:center;color:#9ca3af;padding:1rem">Chưa có dữ liệu</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
 
    <div class="card">
      <div class="card-hd"><div class="card-title">Hoạt động gần đây</div></div>
      <div>
        @forelse($recentActivities as $act)
        <div class="act-row">
          <div class="act-mark" style="background:{{ $act->status === 'active' ? '#3b82f6' : ($act->status === 'pending' ? '#d97706' : '#d1d5db') }}"></div>
          <div>
            <div class="act-txt">
              {{ $act->status === 'active' ? 'Đã duyệt' : ($act->status === 'pending' ? 'Đăng ký mới' : 'Từ chối') }}:
              {{ $act->user?->name ?? '—' }}
            </div>
            <div class="act-time">{{ $act->updated_at->diffForHumans() }}</div>
          </div>
        </div>
        @empty
          <div style="text-align:center;color:#9ca3af;font-size:13px;padding:1rem">Chưa có hoạt động</div>
        @endforelse
      </div>
    </div>
  </div>
</div>
 
<script>
document.addEventListener('DOMContentLoaded', function () {
  const wrap = document.getElementById('bar-chart');
  if (!wrap) return;
  const vals = JSON.parse(wrap.dataset.vals);
  const months = ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12'];
  const max = Math.max(...vals, 1);
  const currentMonth = new Date().getMonth();
  months.forEach((m, i) => {
    const col = document.createElement('div');
    col.className = 'bar-col';
    const h = vals[i] ? Math.round((vals[i] / max) * 100) : 3;
    const clr = i === currentMonth ? '#3b82f6' : vals[i] === 0 ? '#eaecf0' : '#bfdbfe';
    col.innerHTML = `<div class="bar" style="height:${h}px;background:${clr}" title="${vals[i]} đăng ký"></div><div class="bar-lbl">${m}</div>`;
    wrap.appendChild(col);
  });
});
</script>
</div>
</div>
</div>
