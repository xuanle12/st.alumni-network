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
  font-size:14px;
  color:var(--gray-soft);
  margin-top:4px;
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
  font-size 25px;
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
  font-size:14px;
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
  font-size:14px;
  font-weight:700;
  color:var(--gray);
  text-transform:uppercase;
  letter-spacing:.08em;
}

.chart-wrap{
  height:260px;
}

.donut-row{display:flex;align-items:center;gap:1.25rem}
.leg{display:flex;flex-direction:column;gap:9px;flex:1}
.leg-row{display:flex;align-items:center;gap:7px;font-size:12px;color:#374151}
.leg-dot{width:8px;height:8px;border-radius:2px;flex-shrink:0}
.leg-pct{margin-left:auto;font-weight:600;font-size:13px;color:#111}


.btn-xs{
  font-size:13px;
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
  font-size:15px;
  color:#334155;
  line-height:1.45;
}

.act-time{
  font-size:10px;
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
    font-size:15px;
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
    font-size:15px;
  }

  .stat{
    padding:.9rem;
  }

  .stat-val{
    font-size:15px;
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
      <div class="page-title">Bảng điều khiển</div>
      <div class="page-sub">{{ ucfirst(now()->locale('vi')->isoFormat('dddd, DD/MM/YYYY')) }}</div>
    </div>
  </div>
 
  <div class="stats">
    <div class="stat">
      <div class="stat-top">
        <div class="stat-label">Cựu sinh viên</div>
        <div class="stat-ico" style="background:#eff6ff">
          <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
            <circle cx="8" cy="5" r="3" stroke="#3b82f6" stroke-width="1.5"/>
            <path d="M2 13c0-3 2.7-5 6-5s6 2 6 5" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
        </div>
      </div>
      <div class="stat-val">{{ number_format($totalAlumni) }}</div>
      <div class="stat-sub up"> Đang hoạt động</div>
    </div>
    <div class="stat">
      <div class="stat-top">
        <div class="stat-label">Chờ duyệt</div>
        <div class="stat-ico" style="background:#fffbeb">
          <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
            <circle cx="8" cy="8" r="6" stroke="#d97706" stroke-width="1.5"/>
            <path d="M8 5v3.5l2 2" stroke="#d97706" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
        </div>
      </div>
      <div class="stat-val">{{ $pendingCount }}</div>
      <div class="stat-sub warn">Cần xử lý</div>
    </div>
    <div class="stat" style="cursor:pointer" onclick="window.location='{{ route('admin.job') }}'">
      <div class="stat-top">
        <div class="stat-label">Tuyển dụng</div>
        <div style="display:flex;align-items:center;gap:6px">
          @if($pendingJobCount > 0)
            <span style="background:#ef4444;color:#fff;border-radius:20px;padding:1px 8px;font-size:11px;font-weight:700">{{ $pendingJobCount }} chờ</span>
          @endif
          <div class="stat-ico" style="background:#f0fdf4">
            <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
              <rect x="2" y="3" width="12" height="10" rx="1.5" stroke="#16a34a" stroke-width="1.5"/>
              <path d="M5 7h6M5 10h4" stroke="#16a34a" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
          </div>
        </div>
      </div>
      <div class="stat-val">{{ $jobCount }}</div>
      <div class="stat-sub up">Đang hiển thị</div>
    </div>
    <div class="stat">
      <div class="stat-top">
        <div class="stat-label">Sự kiện sắp tới</div>
        <div class="stat-ico" style="background:#faf5ff">
          <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
            <rect x="2" y="3" width="12" height="11" rx="1.5" stroke="#9333ea" stroke-width="1.5"/>
            <path d="M5 1v4M11 1v4M2 7h12" stroke="#9333ea" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
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
      <div class="chart-wrap" id="bar-chart" wire:ignore></div>
    </div>
    <div class="card">
      <div class="card-hd"><div class="card-title">Trạng thái hồ sơ</div></div>
      @php
        $total = ($statusStats['active'] ?? 0) + ($statusStats['pending'] ?? 0) + ($statusStats['inactive'] ?? 0);
        $active  = $total > 0 ? round(($statusStats['active'] ?? 0) / $total * 238) : 0;
        $pending = $total > 0 ? round(($statusStats['pending'] ?? 0) / $total * 238) : 0;
      @endphp
      <div class="donut-row">
        <svg width="200" height="200" viewBox="0 0 100 100">
          <circle cx="50" cy="50" r="38" fill="none" stroke="#f3f4f6" stroke-width="16"/>
          <circle cx="50" cy="50" r="38" fill="none" stroke="#3b82f6" stroke-width="16"
                  stroke-dasharray="{{ $active }} {{ 238 - $active }}"
                  stroke-dashoffset="0" transform="rotate(-90 50 50)"/>
          <circle cx="50" cy="50" r="38" fill="none" stroke="#f59e0b" stroke-width="16"
                  stroke-dasharray="{{ $pending }} {{ 238 - $pending }}"
                  stroke-dashoffset="-{{ $active }}" transform="rotate(-90 50 50)"/>
          <text x="50" y="46" text-anchor="middle" font-size="14" font-weight="700" fill="#111">{{ number_format($total) }}</text>
          <text x="50" y="60" text-anchor="middle" font-size="9" fill="#9ca3af">tổng</text>
        </svg>
        <div class="leg">
          <div class="leg-row"><div class="leg-dot" style="background:#3b82f6"></div>Hoạt động<span class="leg-pct">{{ number_format($statusStats['active'] ?? 0) }}</span></div>
          <div class="leg-row"><div class="leg-dot" style="background:#f59e0b"></div>Chờ duyệt<span class="leg-pct">{{ number_format($statusStats['pending'] ?? 0) }}</span></div>
          <div class="leg-row"><div class="leg-dot" style="background:#e5e7eb"></div>Không HĐ<span class="leg-pct">{{ number_format($statusStats['inactive'] ?? 0) }}</span></div>
        </div>
      </div>
    </div>
  </div>
 
  
  <div class="row3">
    <div class="card">
      <div class="card-hd">
        <div class="card-title">Hồ sơ gần đây</div>
        <a href="#" class="btn-xs">Xem tất cả</a>
      </div>
      <x-table :bare="true">
        <x-slot:heading>
          <th>STT</th><th>Họ tên</th><th>MSV</th><th>Lớp</th><th>Ngày</th><th>Trạng thái</th><th></th>
        </x-slot:heading>

        @forelse($recentProfiles as $profile)
        @php
          $pColor = match($profile->status) { 'active'=>'green', 'pending'=>'yellow', default=>'red' };
          $pLabel = match($profile->status) { 'active'=>'Hoạt động', 'pending'=>'Chờ duyệt', default=>'Từ chối' };
        @endphp
        <tr>
          <td style="color:#94a3b8;font-size:12px;font-weight:600">{{ $loop->iteration }}</td>
          <td>{{ $profile->user?->name ?? '—' }}</td>
          <td style="color:#9ca3af">{{ $profile->msv ?? '—' }}</td>
          <td>{{ $profile->lop ?? '—' }}</td>
          <td style="color:#9ca3af">{{ $profile->created_at->format('d/m') }}</td>
          <td><x-badge :color="$pColor">{{ $pLabel }}</x-badge></td>
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
          <tr><td colspan="7" class="adm-tbl-empty">Chưa có dữ liệu</td></tr>
        @endforelse
      </x-table>
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
(function () {
  var _barRoot = null;

  var MONTHLY = @json($monthlyStats);

  function initCharts() {
    if (!document.getElementById('bar-chart')) return;

    // dispose cũ nếu có
    if (_barRoot) { _barRoot.dispose(); _barRoot = null; }

    // ── BAR CHART ──────────────────────────────────────────────
    _barRoot = am5.Root.new('bar-chart');
    _barRoot._logo && _barRoot._logo.dispose();
    _barRoot.setThemes([am5themes_Animated.new(_barRoot)]);

    var chart = _barRoot.container.children.push(
      am5xy.XYChart.new(_barRoot, {
        panX: false, panY: false,
        wheelX: 'none', wheelY: 'none',
        paddingLeft: 0, paddingRight: 8, paddingBottom: 0,
      })
    );
    chart.zoomOutButton.set('forceHidden', true);

    var xRend = am5xy.AxisRendererX.new(_barRoot, { minGridDistance: 10, cellStartLocation: 0.15, cellEndLocation: 0.85 });
    xRend.grid.template.setAll({ stroke: am5.color(0xe2e8f0) });
    xRend.labels.template.setAll({ fontSize: 12, fill: am5.color(0x94a3b8) });

    var xAxis = chart.xAxes.push(
      am5xy.CategoryAxis.new(_barRoot, { categoryField: 'month', renderer: xRend })
    );

    var yRend = am5xy.AxisRendererY.new(_barRoot, {});
    yRend.grid.template.setAll({ stroke: am5.color(0xe2e8f0), strokeDasharray: [3, 3] });
    yRend.labels.template.setAll({ fontSize: 11, fill: am5.color(0x94a3b8) });

    chart.yAxes.push(
      am5xy.ValueAxis.new(_barRoot, { renderer: yRend, min: 0, strictMinMax: true })
    );

    var series = chart.series.push(
      am5xy.ColumnSeries.new(_barRoot, {
        xAxis: xAxis,
        yAxis: chart.yAxes.getIndex(0),
        valueYField: 'value',
        categoryXField: 'month',
        tooltip: am5.Tooltip.new(_barRoot, { labelText: '{categoryX}: [bold]{valueY}[/] đăng ký' }),
      })
    );
    series.columns.template.setAll({
      cornerRadiusTL: 6, cornerRadiusTR: 6,
      strokeOpacity: 0, maxWidth: 36,
    });

    var curMonth = new Date().getMonth();
    series.columns.template.adapters.add('fill', function (fill, target) {
      var ctx = target.dataItem && target.dataItem.dataContext;
      if (!ctx) return fill;
      if (ctx.current) return am5.color(0x3b82f6);
      if (!ctx.value)  return am5.color(0xe2e8f0);
      return am5.color(0xbfdbfe);
    });

    var months  = ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12'];
    var barData = MONTHLY.map(function (v, i) {
      return { month: months[i], value: v, current: i === curMonth };
    });

    xAxis.data.setAll(barData);
    series.data.setAll(barData);
    series.appear(1000);
    chart.appear(1000, 100);
  }

  document.addEventListener('DOMContentLoaded', initCharts);
  document.addEventListener('livewire:navigated', initCharts);
})();
</script>
</div>
</div>
</div>