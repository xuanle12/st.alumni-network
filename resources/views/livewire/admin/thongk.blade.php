<div>
<style>
.dash{padding:1.75rem}
.topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;flex-wrap:wrap;gap:10px}
.ptitle{font-size:20px;font-weight:600;color:#111;letter-spacing:-.3px}
.psub{font-size:12px;color:#9ca3af;margin-top:3px}
.filter-row{display:flex;gap:8px}
.f-sel{padding:6px 10px;border:1px solid #d1d5db;border-radius:7px;font-size:12px;color:#374151;background:#fff}
.f-sel:focus{outline:none;border-color:#3b82f6}
 
/* Stats */
.stats4{display:grid;grid-template-columns:repeat(4,1fr);gap:10px;margin-bottom:1.25rem}
.sc{background:#fff;border:1px solid #eaecf0;border-radius:8px;padding:1rem 1.1rem}
.sc-top{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:10px}
.sc-label{font-size:11px;color:#9ca3af;font-weight:500}
.sc-ico{width:30px;height:30px;border-radius:7px;display:flex;align-items:center;justify-content:center}
.sc-val{font-size:24px;font-weight:700;color:#111;line-height:1;margin-bottom:4px}
.sc-sub{font-size:11px}
.up{color:#16a34a}.muted{color:#9ca3af}
 
/* Layout rows */
.row2{display:grid;grid-template-columns:1.5fr 1fr;gap:10px;margin-bottom:10px}
.row3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;margin-bottom:10px}
.card{background:#fff;border:1px solid #eaecf0;border-radius:8px;padding:1rem 1.1rem}
.card-title{font-size:11px;font-weight:600;color:#6b7280;text-transform:uppercase;letter-spacing:.05em;margin-bottom:1rem}
.card-hd{display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem}
 
/* Bar chart */
.bar-wrap{height:130px;display:flex;align-items:flex-end;gap:4px}
.bc{flex:1;display:flex;flex-direction:column;align-items:center;gap:3px}
.bar{width:100%;border-radius:3px 3px 0 0;cursor:pointer;transition:opacity .15s}
.bar:hover{opacity:.75}
.bl{font-size:9px;color:#9ca3af}
 
/* Donut */
.donut-row{display:flex;align-items:center;gap:1.25rem}
.leg{display:flex;flex-direction:column;gap:9px;flex:1}
.leg-row{display:flex;align-items:center;gap:7px;font-size:12px;color:#374151}
.leg-dot{width:8px;height:8px;border-radius:2px;flex-shrink:0}
.leg-pct{margin-left:auto;font-weight:600;font-size:13px;color:#111}
 
/* Horizontal bars */
.hbar-list{display:flex;flex-direction:column;gap:10px}
.hbar-top{display:flex;justify-content:space-between;font-size:12px;color:#374151;margin-bottom:4px}
.hbar-val{font-weight:600;color:#111}
.hbar-bg{height:6px;background:#f3f4f6;border-radius:3px;overflow:hidden}
.hbar-fill{height:100%;border-radius:3px}
 
/* Table */
table{width:100%;border-collapse:collapse}
thead th{font-size:10px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;color:#9ca3af;padding:8px 10px;text-align:left;border-bottom:1px solid #eaecf0;background:#fafafa}
tbody tr{border-bottom:1px solid #f3f4f6;transition:background .1s}
tbody tr:last-child{border-bottom:none}
tbody tr:hover{background:#fafafa}
td{padding:9px 10px;font-size:12px;color:#374151;vertical-align:middle}
.badge{display:inline-block;font-size:10px;font-weight:500;padding:2px 8px;border-radius:4px}
.bg{background:#f0fdf4;color:#166534}
.by{background:#fef9c3;color:#92400e}
.bc2{background:#eff6ff;color:#1e40af}
 
/* Sparkline */
.spark{display:flex;align-items:flex-end;gap:2px;height:28px}
.sp{width:6px;border-radius:2px 2px 0 0;background:#bfdbfe}
.sp.hi{background:#3b82f6}
 
@media(max-width:1024px){.stats4{grid-template-columns:1fr 1fr}.row3{grid-template-columns:1fr 1fr}}
@media(max-width:768px){.row2,.row3{grid-template-columns:1fr}}
</style>
<div>
    <div class="dash">
  <div class="topbar">
    <div>
      <div class="ptitle">Thống kê</div>
      <div class="psub">Tổng quan hoạt động hệ thống</div>
    </div>
    <div class="filter-row">
      <select class="f-sel" wire:model.live="year">
        @foreach(range(now()->year, now()->year - 3) as $y)
          <option value="{{ $y }}">Năm {{ $y }}</option>
        @endforeach
      </select>
      <select class="f-sel" wire:model.live="khoa">
        <option value="">Tất cả khoa</option>
        @foreach($khoaList as $k => $l)
          <option value="{{ $k }}">{{ $l }}</option>
        @endforeach
      </select>
    </div>
  </div>
 
  {{-- Stats 4 --}}
  <div class="stats4">
    <div class="sc">
      <div class="sc-top">
        <div class="sc-label">Tổng cựu sinh viên</div>
        <div class="sc-ico" style="background:#eff6ff">
          <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5" r="3" stroke="#3b82f6" stroke-width="1.5"/><path d="M2 13c0-3 2.7-5 6-5s6 2 6 5" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
      </div>
      <div class="sc-val">{{ number_format($this->totalAlumni) }}</div>
      <div class="sc-sub up">↑ Đang hoạt động</div>
    </div>
    <div class="sc">
      <div class="sc-top">
        <div class="sc-label">Tin tuyển dụng</div>
        <div class="sc-ico" style="background:#f0fdf4">
          <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="10" rx="1.5" stroke="#16a34a" stroke-width="1.5"/><path d="M5 7h6M5 10h4" stroke="#16a34a" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
      </div>
      <div class="sc-val">{{ $this->totalJobs }}</div>
      <div class="sc-sub up">↑ Đang hiển thị</div>
    </div>
    <div class="sc">
      <div class="sc-top">
        <div class="sc-label">Sự kiện đã tổ chức</div>
        <div class="sc-ico" style="background:#faf5ff">
          <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="11" rx="1.5" stroke="#9333ea" stroke-width="1.5"/><path d="M5 1v4M11 1v4M2 7h12" stroke="#9333ea" stroke-width="1.5" stroke-linecap="round"/></svg>
        </div>
      </div>
      <div class="sc-val">{{ $this->totalEvents }}</div>
      <div class="sc-sub muted">Tổng sự kiện</div>
    </div>
    <div class="sc">
      <div class="sc-top">
        <div class="sc-label">Tỉ lệ có việc làm</div>
        <div class="sc-ico" style="background:#fffbeb">
          <svg width="15" height="15" viewBox="0 0 16 16" fill="none"><path d="M2 12L6 8l3 3 5-6" stroke="#d97706" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
      </div>
      <div class="sc-val">{{ $this->jobRate }}%</div>
      <div class="sc-sub up">↑ Đã cập nhật địa chỉ</div>
    </div>
  </div>
 
  {{-- Biểu đồ cột + Donut --}}
  <div class="row2">
    <div class="card">
      <div class="card-hd">
        <div class="card-title">Cựu sinh viên đăng ký theo tháng ({{ $year }})</div>
      </div>
      <div class="bar-wrap"
           id="bar-chart"
           data-vals="{{ json_encode($this->monthlyStats) }}">
      </div>
    </div>
    <div class="card">
      <div class="card-hd"><div class="card-title">Trạng thái hồ sơ</div></div>
      @php
        $s = $this->statusStats;
        $total = array_sum($s);
        $active = $total > 0 ? round($s['active'] / $total * 238) : 0;
        $pending = $total > 0 ? round($s['pending'] / $total * 238) : 0;
      @endphp
      <div class="donut-row">
        <svg width="100" height="100" viewBox="0 0 100 100">
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
          <div class="leg-row"><div class="leg-dot" style="background:#3b82f6"></div>Hoạt động<span class="leg-pct">{{ number_format($s['active']) }}</span></div>
          <div class="leg-row"><div class="leg-dot" style="background:#f59e0b"></div>Chờ duyệt<span class="leg-pct">{{ number_format($s['pending']) }}</span></div>
          <div class="leg-row"><div class="leg-dot" style="background:#e5e7eb"></div>Không HĐ<span class="leg-pct">{{ number_format($s['inactive']) }}</span></div>
        </div>
      </div>
    </div>
  </div>
 
  {{-- 3 cột biểu đồ ngang --}}
  <div class="row3">
    {{-- CSV theo khoa --}}
    <div class="card">
      <div class="card-title">CSV theo khoa</div>
      @php $maxKhoa = collect($this->byKhoa)->max('total') ?: 1; @endphp
      <div class="hbar-list">
        @forelse($this->byKhoa as $item)
        <div>
          <div class="hbar-top"><span>{{ \App\Models\Job::KHOA_LIST[$item['khoa']] ?? $item['khoa'] }}</span><span class="hbar-val">{{ $item['total'] }}</span></div>
          <div class="hbar-bg"><div class="hbar-fill" style="width:{{ round($item['total']/$maxKhoa*100) }}%;background:#3b82f6"></div></div>
        </div>
        @empty
          <p style="font-size:12px;color:#9ca3af;text-align:center;padding:1rem">Chưa có dữ liệu</p>
        @endforelse
      </div>
    </div>
 
    {{-- Khu vực làm việc --}}
    <div class="card">
      <div class="card-title">Khu vực làm việc</div>
      @php $maxLoc = collect($this->byLocation)->max('total') ?: 1; @endphp
      <div class="hbar-list">
        @forelse($this->byLocation as $item)
        <div>
          <div class="hbar-top"><span>{{ $item['label'] }}</span><span class="hbar-val">{{ $item['total'] }}</span></div>
          <div class="hbar-bg"><div class="hbar-fill" style="width:{{ round($item['total']/$maxLoc*100) }}%;background:#6d28d9"></div></div>
        </div>
        @empty
          <p style="font-size:12px;color:#9ca3af;text-align:center;padding:1rem">Chưa có dữ liệu</p>
        @endforelse
      </div>
    </div>
 
    {{-- Lĩnh vực việc làm --}}
    <div class="card">
      <div class="card-title">Lĩnh vực tuyển dụng</div>
      @php
        $fields = \App\Models\Job::selectRaw('field, count(*) as total')
            ->whereNotNull('field')->where('is_active', true)
            ->groupBy('field')->orderByDesc('total')->take(6)->get();
        $maxField = $fields->max('total') ?: 1;
        $colors = ['#10b981','#f59e0b','#3b82f6','#ef4444','#8b5cf6','#9ca3af'];
      @endphp
      <div class="hbar-list">
        @forelse($fields as $i => $f)
        <div>
          <div class="hbar-top"><span>{{ $f->field }}</span><span class="hbar-val">{{ $f->total }}</span></div>
          <div class="hbar-bg"><div class="hbar-fill" style="width:{{ round($f->total/$maxField*100) }}%;background:{{ $colors[$i % count($colors)] }}"></div></div>
        </div>
        @empty
          <p style="font-size:12px;color:#9ca3af;text-align:center;padding:1rem">Chưa có dữ liệu</p>
        @endforelse
      </div>
    </div>
  </div>
 
  {{-- Bảng top doanh nghiệp --}}
  <div class="card">
    <div class="card-hd">
      <div class="card-title">Top doanh nghiệp tuyển dụng</div>
    </div>
    <table>
      <thead>
        <tr><th>#</th><th>Doanh nghiệp</th><th>Lĩnh vực</th><th>Số tin</th><th>Xu hướng</th></tr>
      </thead>
      <tbody>
        @forelse($this->topCompanies as $i => $c)
        <tr>
          <td style="color:#9ca3af;font-weight:600">{{ $i + 1 }}</td>
          <td>
            <div style="font-weight:500;color:#111">{{ $c['company'] }}</div>
            <div style="font-size:11px;color:#9ca3af">{{ $c['location'] }}</div>
          </td>
          <td><span class="badge bc2">{{ $c['field'] }}</span></td>
          <td style="font-weight:600">{{ $c['total'] }}</td>
          <td>
            <div class="spark">
              @for($j = 0; $j < 5; $j++)
                <div class="sp {{ $j === 4 ? 'hi' : '' }}" style="height:{{ rand(30, 90) }}%"></div>
              @endfor
            </div>
          </td>
        </tr>
        @empty
          <tr><td colspan="5" style="text-align:center;color:#9ca3af;padding:2rem">Chưa có dữ liệu</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
 
<script>
document.addEventListener('DOMContentLoaded', function () {
  function drawChart() {
    const wrap = document.getElementById('bar-chart');
    if (!wrap) return;
    wrap.innerHTML = '';
    const vals = JSON.parse(wrap.dataset.vals || '[]');
    const months = ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12'];
    const max = Math.max(...vals, 1);
    const cur = new Date().getMonth();
    months.forEach((m, i) => {
      const col = document.createElement('div');
      col.className = 'bc';
      const h = vals[i] ? Math.round((vals[i] / max) * 110) : 3;
      const clr = i === cur ? '#3b82f6' : vals[i] === 0 ? '#eaecf0' : '#bfdbfe';
      col.innerHTML = `<div class="bar" style="height:${h}px;background:${clr}" title="${vals[i]} đăng ký"></div><div class="bl">${m}</div>`;
      wrap.appendChild(col);
    });
  }
  drawChart();
  document.addEventListener('livewire:updated', drawChart);
});
</script>
</div>
</div>
