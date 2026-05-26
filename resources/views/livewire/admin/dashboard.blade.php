<div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap');
*,
*::before,
*::after{
  box-sizing:border-box;
  margin:0;
  padding:0;
}

:root{
  --bg:#f4f8fc;
  --card:#ffffff;

  --primary:#1f6fb2;
  --primary-soft:#eaf4ff;
  --primary-light:#bfdbfe;

  --success:#16a34a;
  --success-bg:#f0fdf4;

  --warning:#d97706;
  --warning-bg:#fff7ed;

  --danger:#dc2626;
  --danger-bg:#fef2f2;

  --gray:#6b7280;
  --gray-soft:#9ca3af;

  --border:#e5edf6;
  --shadow:0 10px 30px rgba(15,23,42,.05);
  --shadow-hover:0 16px 36px rgba(15,23,42,.08);
}

body{
  background:var(--bg);
  font-family:'Be Vietnam Pro',sans-serif;
}
.dash{
  padding:1.75rem;
  animation:fadeUp .35s ease;
}

@keyframes fadeUp{
  from{
    opacity:0;
    transform:translateY(8px);
  }
  to{
    opacity:1;
    transform:translateY(0);
  }
}

.topbar{
  display:flex;
  justify-content:space-between;
  align-items:flex-start;
  margin-bottom:1.6rem;
}

.page-title{
  font-size:26px;
  font-weight:700;
  color:#0f172a;
  letter-spacing:-.5px;
}

.page-sub{
  font-size:13px;
  color:var(--gray-soft);
  margin-top:4px;
}
.flash-ok{
  background:var(--success-bg);
  border:1px solid #86efac;
  color:#166534;
  padding:12px 14px;
  border-radius:12px;
  font-size:13px;
  margin-bottom:1rem;
  display:flex;
  align-items:center;
  gap:8px;
}

.stats{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:14px;
  margin-bottom:1.4rem;
}

.stat{
  background:var(--card);
  border:1px solid var(--border);
  border-radius:18px;
  padding:1rem;
  box-shadow:var(--shadow);
  transition:.2s ease;
  position:relative;
  overflow:hidden;
}

.stat::before{
  content:'';
  position:absolute;
  inset:0 auto 0 0;
  width:4px;
  background:var(--primary);
  opacity:.15;
}

.stat:hover{
  transform:translateY(-3px);
  box-shadow:var(--shadow-hover);
}

.stat-top{
  display:flex;
  justify-content:space-between;
  align-items:flex-start;
  margin-bottom:12px;
}

.stat-label{
  font-size:12px;
  color:var(--gray-soft);
  font-weight:500;
}

.stat-ico{
  width:38px;
  height:38px;
  border-radius:12px;
  display:flex;
  align-items:center;
  justify-content:center;
}

.stat-val{
  font-size:28px;
  font-weight:700;
  color:#0f172a;
  line-height:1;
}

.stat-sub{
  font-size:12px;
  margin-top:8px;
  font-weight:500;
}

.up{
  color:var(--success);
}

.warn{
  color:var(--warning);
}

.muted{
  color:var(--gray-soft);
}

.row2,
.row3{
  display:grid;
  gap:14px;
  margin-bottom:14px;
}

.row2{
  grid-template-columns:1.7fr 1fr;
}

.row3{
  grid-template-columns:1.7fr 1fr;
}

.card{
  background:var(--card);
  border:1px solid var(--border);
  border-radius:18px;
  padding:1.1rem 1.2rem;
  box-shadow:var(--shadow);
  transition:.2s ease;
}

.card:hover{
  box-shadow:var(--shadow-hover);
}

.card-hd{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:1rem;
}

.card-title{
  font-size:11px;
  font-weight:700;
  color:var(--gray);
  text-transform:uppercase;
  letter-spacing:.08em;
}

.chart-wrap{
  height:170px;
  display:flex;
  align-items:flex-end;
  gap:8px;
  padding-top:10px;
}

.bar-col{
  flex:1;
  display:flex;
  flex-direction:column;
  align-items:center;
  gap:5px;
}

.bar{
  width:100%;
  border-radius:8px 8px 3px 3px;
  transition:.18s ease;
}

.bar:hover{
  opacity:.85;
  transform:translateY(-2px);
}

.bar-lbl{
  font-size:10px;
  color:var(--gray-soft);
  font-weight:500;
}

.leg{
  display:flex;
  flex-direction:column;
  gap:14px;
  justify-content:center;
  height:100%;
}

.leg-row{
  display:flex;
  align-items:center;
  gap:10px;
  font-size:13px;
  color:#334155;
  background:#f8fbff;
  border:1px solid #edf3fa;
  border-radius:12px;
  padding:10px 12px;
}

.leg-dot{
  width:10px;
  height:10px;
  border-radius:3px;
  flex-shrink:0;
}

.leg-num{
  margin-left:auto;
  font-weight:700;
  color:#111827;
  font-size:14px;
}

table{
  width:100%;
  border-collapse:collapse;
}

thead th{
  font-size:10px;
  font-weight:700;
  letter-spacing:.05em;
  text-transform:uppercase;
  color:var(--gray-soft);
  padding:10px 8px;
  text-align:left;
  border-bottom:1px solid var(--border);
}

tbody tr{
  border-bottom:1px solid #f1f5f9;
  transition:.15s ease;
}

tbody tr:last-child{
  border-bottom:none;
}

tbody tr:hover{
  background:#f8fbff;
}

td{
  padding:11px 8px;
  font-size:13px;
  color:#334155;
  vertical-align:middle;
}

.badge{
  display:inline-flex;
  align-items:center;
  justify-content:center;
  font-size:10px;
  font-weight:700;
  padding:5px 9px;
  border-radius:999px;
  letter-spacing:.02em;
}

.b-yellow{
  background:#fff7ed;
  color:#b45309;
}

.b-green{
  background:#ecfdf5;
  color:#15803d;
}

.b-red{
  background:#fef2f2;
  color:#b91c1c;
}

.b-gray{
  background:#f3f4f6;
  color:#6b7280;
}

.btn-xs{
  font-size:11px;
  padding:6px 10px;
  border-radius:8px;
  border:1px solid #dbe3ee;
  background:#fff;
  color:#334155;
  cursor:pointer;
  transition:.15s ease;
  text-decoration:none;
}

.btn-xs:hover{
  background:#f8fafc;
  transform:translateY(-1px);
}

.btn-ok{
  border-color:#bbf7d0;
  color:#15803d;
  background:#f0fdf4;
}

.btn-ok:hover{
  background:#dcfce7;
}

.btn-no{
  border-color:#fecaca;
  color:#b91c1c;
  background:#fef2f2;
}

.btn-no:hover{
  background:#fee2e2;
}

.act-row{
  display:flex;
  gap:10px;
  padding:10px 0;
  border-bottom:1px solid #f1f5f9;
}

.act-row:last-child{
  border-bottom:none;
}

.act-mark{
  width:8px;
  height:8px;
  border-radius:50%;
  flex-shrink:0;
  margin-top:6px;
}

.act-txt{
  font-size:13px;
  color:#334155;
  line-height:1.45;
}

.act-time{
  font-size:11px;
  color:var(--gray-soft);
  margin-top:3px;
}

@media (max-width:1024px){

  .stats{
    grid-template-columns:repeat(2,1fr);
  }

  .row2,
  .row3{
    grid-template-columns:1fr;
  }
}

@media (max-width:768px){

  .dash{
    padding:1rem;
  }

  .topbar{
    flex-direction:column;
    gap:6px;
  }

  .page-title{
    font-size:22px;
  }

  .stats{
    grid-template-columns:1fr;
  }

  .chart-wrap{
    height:140px;
    gap:4px;
  }

  table{
    display:block;
    overflow-x:auto;
    white-space:nowrap;
  }

  td,
  th{
    font-size:11px;
  }

  .card{
    padding:1rem;
    border-radius:16px;
  }
}

@media (max-width:480px){

  .page-title{
    font-size:19px;
  }

  .stat{
    padding:.9rem;
  }

  .stat-val{
    font-size:22px;
  }

  .btn-xs{
    padding:5px 7px;
    font-size:10px;
  }

  .chart-wrap{
    height:120px;
  }
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
    <div class="flash-ok"><i class="fa-solid fa-check"></i> {{ session('success') }}</div>
  @endif
 
 
  <div class="stats">
    <div class="stat">
      <div class="stat-top">
        <div class="stat-label">Cựu sinh viên</div>
        <div class="stat-ico" style="background:#eff6ff">
          <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5" r="3" stroke="#3b82f6" stroke-width="1.5"/><path d="M2 13c0-3 2.7-5 6-5s6 2 6 5" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
      </div>
      <div class="stat-val">{{ number_format($totalAlumni) }}</div>
      <div class="stat-sub up"> Đang hoạt động</div>
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
                  <button wire:click="approve({{ $profile->id }})" class="btn-xs btn-ok"><i class="fa-solid fa-check"></i></button>
                  <button wire:click="reject({{ $profile->id }})" class="btn-xs btn-no"><i class="fa-solid fa-times"></i></button>
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
