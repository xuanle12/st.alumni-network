<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Segoe UI',system-ui,sans-serif;background:#f7f8fa}
.wrap{max-width:960px;margin:0 auto;padding:2rem 1.5rem}

/* ── FLASH ── */
.flash-s{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px;margin-bottom:1rem}
.flash-e{background:#fef2f2;border:1px solid #fecaca;color:#b91c1c;padding:9px 14px;border-radius:8px;font-size:13px;margin-bottom:1rem}
.flash-i{background:#eff6ff;border:1px solid #bfdbfe;color:#1e40af;padding:9px 14px;border-radius:8px;font-size:13px;margin-bottom:1rem}

/* ── HERO ── */
.hero{background:#1a2035;border-radius:12px;padding:2rem 2.5rem;margin-bottom:1.75rem;position:relative;overflow:hidden}
.hero::before{content:'';position:absolute;top:-40px;right:-40px;width:200px;height:200px;border-radius:50%;background:rgba(59,130,246,.08)}
.hero::after{content:'';position:absolute;bottom:-60px;right:80px;width:140px;height:140px;border-radius:50%;background:rgba(99,102,241,.06)}
.hero-label{font-size:11px;font-weight:600;color:#60a5fa;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:8px}
.hero-title{font-size:24px;font-weight:700;color:#fff;margin-bottom:6px;line-height:1.3}
.hero-sub{font-size:13px;color:#94a3b8;margin-bottom:1.5rem}
.hero-stats{display:flex;gap:2rem;flex-wrap:wrap}
.hs-num{font-size:20px;font-weight:700;color:#fff}
.hs-lbl{font-size:11px;color:#64748b;margin-top:2px}

/* ── FILTER BAR ── */
.filter-bar{display:flex;gap:8px;margin-bottom:1.5rem;flex-wrap:wrap;align-items:center}
.search-box{flex:1;min-width:180px;position:relative}
.search-box input{width:100%;padding:9px 12px 9px 36px;border:1px solid #e2e8f0;border-radius:8px;font-size:13px;background:#fff;color:#111;font-family:inherit}
.search-box input:focus{outline:none;border-color:#3b82f6}
.search-ico{position:absolute;left:11px;top:50%;transform:translateY(-50%)}
.filter-tabs{display:flex;gap:4px;background:#fff;border:1px solid #e2e8f0;border-radius:8px;padding:3px;flex-wrap:wrap}
.ftab{padding:5px 14px;border-radius:6px;font-size:12px;color:#6b7280;cursor:pointer;border:none;background:none;font-family:inherit;transition:all .15s}
.ftab.active{background:#111;color:#fff}
.ftab:hover:not(.active){background:#f3f4f6}

/* ── SECTION TITLE ── */
.section-title{font-size:13px;font-weight:600;color:#374151;margin-bottom:.875rem;display:flex;align-items:center;gap:8px}
.section-title::after{content:'';flex:1;height:1px;background:#e2e8f0}

/* ── EVENTS GRID ── */
.events-grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:1.5rem}
.event-card{background:#fff;border:1px solid #e2e8f0;border-radius:10px;overflow:hidden;transition:all .15s}
.event-card:hover{border-color:#cbd5e1;transform:translateY(-1px)}
.event-card.featured{border-color:#3b82f6;grid-column:1/-1}

/* card header */
.ec-header{padding:1.1rem 1.1rem .75rem;display:flex;gap:12px;align-items:flex-start}
.ec-date{min-width:48px;text-align:center;background:#f8fafc;border-radius:8px;padding:8px 6px;border:1px solid #e2e8f0;flex-shrink:0}
.ec-day{font-size:20px;font-weight:700;color:#111;line-height:1}
.ec-month{font-size:10px;color:#94a3b8;margin-top:1px}
.ec-info{flex:1;min-width:0}
.ec-title{font-size:13px;font-weight:600;color:#111;line-height:1.4;margin-bottom:4px}
.ec-featured .ec-title{font-size:15px}
.ec-loc{font-size:11px;color:#6b7280;display:flex;align-items:center;gap:4px;margin-bottom:6px}
.ec-tags{display:flex;gap:5px;flex-wrap:wrap}

/* tags */
.tag{font-size:10px;font-weight:500;padding:2px 8px;border-radius:20px}
.tag-green{background:#f0fdf4;color:#166634}
.tag-amber{background:#fffbeb;color:#92400e}
.tag-blue{background:#eff6ff;color:#1e40af}
.tag-gray{background:#f3f4f6;color:#6b7280}
.tag-red{background:#fef2f2;color:#b91c1c}

/* card footer */
.ec-footer{padding:.75rem 1.1rem;border-top:1px solid #f3f4f6;display:flex;justify-content:space-between;align-items:center;gap:8px}
.ec-time{font-size:11px;color:#94a3b8;display:flex;align-items:center;gap:4px;flex-shrink:0}

/* featured body */
.featured-body{padding:0 1.1rem .875rem;display:grid;grid-template-columns:1fr 1fr 1fr;gap:.75rem}
.fb-item{background:#f8fafc;border-radius:7px;padding:.625rem .875rem}
.fb-label{font-size:10px;color:#94a3b8;margin-bottom:2px}
.fb-val{font-size:12px;font-weight:600;color:#374151}

/* ── BUTTONS ── */
.btn-reg{padding:5px 14px;background:#111;color:#fff;border:none;border-radius:6px;font-size:11px;font-weight:600;cursor:pointer;font-family:inherit;white-space:nowrap;transition:all .15s}
.btn-reg:hover{background:#333}
.btn-reg.free{background:#166534}
.btn-reg.free:hover{background:#15803d}
.btn-reg.done{background:#f3f4f6;color:#9ca3af;cursor:default}
.btn-reg.registered{background:#eff6ff;color:#1e40af;border:1px solid #bfdbfe}
.btn-reg.registered:hover{background:#dbeafe}

/* ── UPCOMING LIST ── */
.upcoming-list{display:flex;flex-direction:column;gap:8px;margin-bottom:1.5rem}
.up-item{background:#fff;border:1px solid #e2e8f0;border-radius:9px;padding:.875rem 1rem;display:flex;align-items:center;gap:14px;transition:all .15s}
.up-item:hover{border-color:#cbd5e1;background:#fafafa}
.up-date{min-width:40px;text-align:center;flex-shrink:0}
.up-day{font-size:18px;font-weight:700;color:#111;line-height:1}
.up-month{font-size:9px;color:#94a3b8}
.up-divider{width:1px;height:36px;background:#e2e8f0;flex-shrink:0}
.up-info{flex:1;min-width:0}
.up-title{font-size:13px;font-weight:500;color:#111;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.up-meta{font-size:11px;color:#94a3b8;margin-top:2px}
.up-right{flex-shrink:0;display:flex;align-items:center;gap:8px}

/* ── EMPTY ── */
.empty{text-align:center;padding:3rem;color:#94a3b8;font-size:13px}

/* ── LOADING ── */
.spin{display:inline-block;width:12px;height:12px;border:2px solid rgba(255,255,255,.3);border-top-color:#fff;border-radius:50%;animation:spin .6s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}

/* ═══════════════════
   RESPONSIVE
═══════════════════ */
@media(max-width:768px){
  .wrap{padding:1.25rem 1rem}
  .hero{padding:1.5rem 1.25rem}
  .hero-title{font-size:20px}
  .hero-stats{gap:1.25rem}
  .events-grid{grid-template-columns:1fr}
  .event-card.featured{grid-column:1}
  .featured-body{grid-template-columns:1fr 1fr}
  .filter-bar{flex-direction:column;align-items:stretch}
  .search-box{width:100%}
  .filter-tabs{justify-content:center}
}

@media(max-width:480px){
  .wrap{padding:1rem .875rem}
  .hero{padding:1.25rem 1rem}
  .hero-title{font-size:18px}
  .hero-stats{gap:1rem}
  .hs-num{font-size:17px}
  .featured-body{grid-template-columns:1fr}
  .up-item{flex-wrap:wrap;gap:8px}
  .up-right{width:100%;justify-content:flex-end}
  .up-divider{display:none}
  .ftab{padding:5px 10px;font-size:11px}
}
</style>

<div class="wrap">

  {{-- Flash --}}
  @if(session('success'))
    <div class="flash-s">✓ {{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="flash-e">✕ {{ session('error') }}</div>
  @endif
  @if(session('info'))
    <div class="flash-i">ℹ {{ session('info') }}</div>
  @endif

  {{-- ── HERO ── --}}
  <div class="hero">
    <div class="hero-label">Sự kiện & Hoạt động</div>
    <div class="hero-title">Kết nối — Chia sẻ — Phát triển</div>
    <div class="hero-sub">Tham gia các sự kiện kết nối cựu sinh viên, hội thảo nghề nghiệp và hoạt động cộng đồng của Học viện.</div>
    <div class="hero-stats">
      <div>
        <div class="hs-num">{{ $stats['year_total'] }}</div>
        <div class="hs-lbl">Sự kiện năm nay</div>
      </div>
      <div>
        <div class="hs-num">{{ $stats['upcoming'] }}</div>
        <div class="hs-lbl">Sắp diễn ra</div>
      </div>
      <div>
        <div class="hs-num">{{ number_format($stats['total_regs']) }}+</div>
        <div class="hs-lbl">Lượt đăng ký</div>
      </div>
    </div>
  </div>

  {{-- ── FILTER BAR ── --}}
  <div class="filter-bar">
    <div class="search-box">
      <svg class="search-ico" width="14" height="14" viewBox="0 0 16 16" fill="none">
        <circle cx="7" cy="7" r="5" stroke="#94a3b8" stroke-width="1.5"/>
        <path d="M11 11l3 3" stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round"/>
      </svg>
      <input wire:model.live.debounce.300ms="search" type="text" placeholder="Tìm sự kiện...">
    </div>
    <div class="filter-tabs">
      <button wire:click="setTab('all')"      class="ftab {{ $activeTab === 'all'      ? 'active' : '' }}">Tất cả</button>
      <button wire:click="setTab('upcoming')" class="ftab {{ $activeTab === 'upcoming' ? 'active' : '' }}">Sắp tới</button>
      <button wire:click="setTab('free')"     class="ftab {{ $activeTab === 'free'     ? 'active' : '' }}">Miễn phí</button>
      <button wire:click="setTab('past')"     class="ftab {{ $activeTab === 'past'     ? 'active' : '' }}">Đã qua</button>
    </div>
  </div>

  {{-- ── SỰ KIỆN NỔI BẬT ── --}}
  @if($featured && $activeTab === 'all' && !$search)
  <div class="section-title">Sự kiện nổi bật</div>
  <div class="events-grid" style="margin-bottom:1.5rem">
    @php $isReg = in_array($featured->id, $registeredIds); @endphp
    <a href="{{ route('event.show', $featured->id) }}" class="event-card featured" style="text-decoration:none;color:inherit">
      <div class="ec-header ec-featured">
        <div class="ec-date" style="background:#eff6ff;border-color:#bfdbfe">
          <div class="ec-day" style="color:#1d4ed8">{{ $featured->day }}</div>
          <div class="ec-month">{{ $featured->month_label }}</div>
        </div>
        <div class="ec-info">
          <div class="ec-title">{{ $featured->title }}</div>
          <div class="ec-loc">
            <svg width="11" height="11" viewBox="0 0 16 16" fill="none"><path d="M8 1C5.24 1 3 3.24 3 6c0 4.25 5 9 5 9s5-4.75 5-9c0-2.76-2.24-5-5-5z" stroke="#94a3b8" stroke-width="1.5"/><circle cx="8" cy="6" r="1.5" stroke="#94a3b8" stroke-width="1.5"/></svg>
            {{ $featured->location }}
          </div>
          <div class="ec-tags">
            @if($featured->is_free)<span class="tag tag-green">Miễn phí</span>@endif
            <span class="tag tag-blue">{{ $featured->format_label }}</span>
            @foreach(($featured->tags ?? []) as $tag)
              <span class="tag tag-gray">{{ $tag }}</span>
            @endforeach
          </div>
        </div>
      </div>
      <div class="featured-body">
        <div class="fb-item">
          <div class="fb-label">Thời gian</div>
          <div class="fb-val">{{ $featured->time_range }}</div>
        </div>
        <div class="fb-item">
          <div class="fb-label">Hình thức</div>
          <div class="fb-val">{{ $featured->format_label }}</div>
        </div>
        <div class="fb-item">
          <div class="fb-label">Đối tượng</div>
          <div class="fb-val">{{ $featured->target_audience ?: 'Tất cả' }}</div>
        </div>
      </div>
      <div class="ec-footer">
        <div class="ec-time">
          <svg width="11" height="11" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="#94a3b8" stroke-width="1.5"/><path d="M8 5v3.5l2 2" stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round"/></svg>
          {{ $featured->days_until_label }}
        </div>
        @if($isReg)
          <button wire:click="unregister({{ $featured->id }})" class="btn-reg registered">
            <span wire:loading.remove wire:target="unregister({{ $featured->id }})">✓ Đã đăng ký</span>
            <span wire:loading wire:target="unregister({{ $featured->id }})"><span class="spin"></span></span>
          </button>
        @elseif($featured->registration_status === 'open')
          <button wire:click="register({{ $featured->id }})" class="btn-reg free">
            <span wire:loading.remove wire:target="register({{ $featured->id }})">Đăng ký ngay →</span>
            <span wire:loading wire:target="register({{ $featured->id }})"><span class="spin"></span></span>
          </button>
        @else
          <button class="btn-reg done" disabled>Đã đóng</button>
        @endif
      </div>
    </a>
  </div>
  @endif

  {{-- ── EVENTS GRID ── --}}
  <div class="section-title">
    {{ $activeTab === 'past' ? 'Sự kiện đã qua' : 'Sự kiện ' . ($search ? 'tìm thấy' : 'sắp diễn ra') }}
  </div>

  @if($gridEvents->count())
  <div class="events-grid">
    @foreach($gridEvents as $event)
    @php
      $isReg = in_array($event->id, $registeredIds);
      $btnClass = match(true) {
        $isReg                               => 'registered',
        $event->registration_status !== 'open' => 'done',
        $event->is_free                      => 'free',
        default                              => '',
      };
      $btnText = match(true) {
        $isReg                               => '✓ Đã đăng ký',
        $event->registration_status === 'closed' => 'Đã đóng',
        $event->registration_status === 'full'   => 'Hết chỗ',
        default                              => 'Đăng ký',
      };
    @endphp
    <a href="{{ route('event.show', $event->id) }}" class="event-card">
      <div class="ec-header">
        <div class="ec-date">
          <div class="ec-day">{{ $event->day }}</div>
          <div class="ec-month">{{ $event->month_label }}</div>
        </div>
        <div class="ec-info">
          <div class="ec-title">{{ $event->title }}</div>
          <div class="ec-loc">
            <svg width="11" height="11" viewBox="0 0 16 16" fill="none"><path d="M8 1C5.24 1 3 3.24 3 6c0 4.25 5 9 5 9s5-4.75 5-9c0-2.76-2.24-5-5-5z" stroke="#94a3b8" stroke-width="1.5"/><circle cx="8" cy="6" r="1.5" stroke="#94a3b8" stroke-width="1.5"/></svg>
            {{ $event->location ?: 'TBA' }}
          </div>
          <div class="ec-tags">
            @if($event->is_free)<span class="tag tag-green">Miễn phí</span>@endif
            @if($event->is_internal)<span class="tag tag-gray">Nội bộ</span>@endif
            @if(!$event->is_free && !$event->is_internal)<span class="tag tag-amber">Có phí</span>@endif
            @foreach(($event->tags ?? []) as $tag)
              <span class="tag tag-blue">{{ $tag }}</span>
            @endforeach
          </div>
        </div>
      </div>
      <div class="ec-footer">
        <div class="ec-time">
          <svg width="11" height="11" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="#94a3b8" stroke-width="1.5"/><path d="M8 5v3.5l2 2" stroke="#94a3b8" stroke-width="1.5" stroke-linecap="round"/></svg>
          {{ $event->time_range }}
        </div>
        @if($isReg)
          <button wire:click="unregister({{ $event->id }})" class="btn-reg registered">
            <span wire:loading.remove wire:target="unregister({{ $event->id }})">✓ Đã đăng ký</span>
            <span wire:loading wire:target="unregister({{ $event->id }})"><span class="spin"></span></span>
          </button>
        @elseif($event->registration_status === 'open' && !$event->is_internal)
          <button wire:click="register({{ $event->id }})" class="btn-reg {{ $event->is_free ? 'free' : '' }}">
            <span wire:loading.remove wire:target="register({{ $event->id }})">Đăng ký</span>
            <span wire:loading wire:target="register({{ $event->id }})"><span class="spin"></span></span>
          </button>
        @else
          <button class="btn-reg done" disabled>{{ $btnText }}</button>
        @endif
      </div>
    </a>
    @endforeach
  </div>
  @else
    <div class="empty">📭 Không tìm thấy sự kiện nào.</div>
  @endif

  {{-- ── SẮP DIỄN RA (list) ── --}}
  @if($upcomingEvents->count() && $activeTab === 'all' && !$search)
  <div class="section-title">Sắp diễn ra</div>
  <div class="upcoming-list">
    @foreach($upcomingEvents as $event)
    @php $isReg = in_array($event->id, $registeredIds); @endphp
    <a href="{{ route('event.show', $event->id) }}" class="up-item" style="text-decoration:none;color:inherit">
      <div class="up-date">
        <div class="up-day">{{ $event->day }}</div>
        <div class="up-month">{{ $event->month_label }}</div>
      </div>
      <div class="up-divider"></div>
      <div class="up-info">
        <div class="up-title">{{ $event->title }}</div>
        <div class="up-meta">📍 {{ $event->location ?: 'TBA' }} · {{ $event->time_range }}</div>
      </div>
      <div class="up-right">
        @if($event->is_internal)
          <span class="tag tag-gray">Nội bộ</span>
          <button class="btn-reg done" disabled>Đã đóng</button>
        @elseif($isReg)
          <span class="tag tag-blue">Đã đăng ký</span>
          <button wire:click="unregister({{ $event->id }})" class="btn-reg registered">Huỷ</button>
        @elseif($event->is_free)
          <span class="tag tag-green">Miễn phí</span>
          <button wire:click="register({{ $event->id }})" class="btn-reg free">Đăng ký</button>
        @elseif($event->registration_status === 'open')
          <span class="tag tag-amber">Có phí</span>
          <button wire:click="register({{ $event->id }})" class="btn-reg">Đăng ký</button>
        @else
          <button class="btn-reg done" disabled>Đã đóng</button>
        @endif
      </div>
    </a>
    @endforeach
  </div>
  @endif
</div>