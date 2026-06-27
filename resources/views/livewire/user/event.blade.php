<div>
<style>
@import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800&display=swap');
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --fita:      #16a34a;
  --fita2:     #22c55e;
  --fita-pale: #e8f0fe;
  --gold:      #F6A309;
  --green:     #066140;
  --brown:     #4E3636;
  --text:      #1a1f2e;
  --muted:     #5c6470;
  --border:    #e2e8f0;
  --bg:        #f8fafc;
}

body { font-family: var(--font); background: var(--bg); color: var(--text); }

/* ── stripe VNUA ── */
.stripe { display: flex; flex-direction: column; margin-bottom: 0; }
.stripe-gold  { height: 5px; background: var(--gold); }
.stripe-green { height: 5px; background: var(--green); }
.stripe-brown { height: 5px; background: var(--brown); box-shadow: 0 0 5px var(--brown); }

/* ── BREADCRUMB ── */
.breadcrumb {
  background: #fff;
  border-bottom: 1px solid var(--border);
  padding: 10px 0;
}
.breadcrumb-inner {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 24px;
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
  color: var(--muted);
}
.breadcrumb-inner a { color: var(--fita); text-decoration: none; font-weight: 500; }
.breadcrumb-inner a:hover { text-decoration: underline; }
.breadcrumb-inner span { color: var(--muted); }

/* ── PAGE TITLE BANNER ── */
.page-banner {
  background: #fff;
  padding: 22px 0 0;
  border-bottom: 1px solid var(--border);
  margin-bottom: 0;
}
.page-banner-inner {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 24px 18px;
}
.page-banner-title {
  font-size: 26px;
  font-weight: 800;
  color: var(--fita);
  text-transform: uppercase;
  letter-spacing: 0.3px;
  font-family: var(--font);
  margin-bottom: 4px;
}
.page-banner-sub { font-size: 14px; color: var(--muted); }

/* ── MAIN CONTAINER ── */
.page-wrap {
  max-width: 1200px;
  margin: 0 auto;
  padding: 28px 24px 48px;
  display: grid;
  grid-template-columns: 1fr 280px;
  gap: 28px;
  align-items: start;
}

/* ── MAIN CONTENT ── */
.main-col { min-width: 0; }

/* Flash */
.flash-e { background: #fef2f2; border: 1px solid #fecaca; color: #b91c1c; padding: 10px 14px; border-radius: 10px; font-size: 13px; margin-bottom: 16px; }



/* Filter tabs */
.filter-row {
  display: flex;
  gap: 4px;
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 10px;
  padding: 4px;
  margin-bottom: 22px;
  width: fit-content;
}
.ftab {
  padding: 7px 18px;
  border-radius: 8px;
  font-size: 13px;
  font-weight: 600;
  color: var(--muted);
  cursor: pointer;
  border: none;
  background: none;
  font-family: var(--font);
  transition: .15s;
  letter-spacing: .01em;
}
.ftab:hover:not(.active) { background: #f1f5f9; color: var(--text); }
.ftab.active { background: var(--fita); color: #fff; }

/* Section heading (giống fita: uppercase + gạch chân xanh) */
.sec-heading {
  font-size: 16px;
  font-weight: 800;
  color: var(--fita);
  text-transform: uppercase;
  letter-spacing: 0.4px;
  margin-bottom: 14px;
  padding-bottom: 8px;
  border-bottom: 2px solid var(--fita);
  display: inline-block;
}

/* ── FEATURED EVENT ── */
.featured-card {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 2px 12px rgba(0,0,0,0.07);
  margin-bottom: 8px;
  transition: .15s;
  text-decoration: none;
  color: inherit;
  display: block;
}
.featured-card:hover { border-color: var(--fita2); box-shadow: 0 6px 24px rgba(22,163,74,0.12); transform: translateY(-2px); }
.featured-img {
  width: 100%; height: 220px; background: var(--fita-pale);
  display: flex; align-items: center; justify-content: center;
  color: var(--fita2); font-size: 48px; position: relative; overflow: hidden;
}
.featured-img img { width: 100%; height: 100%; object-fit: cover; }
.featured-badge {
  position: absolute; top: 12px; left: 12px;
  background: var(--gold); color: #fff;
  font-size: 11px; font-weight: 700;
  padding: 4px 10px; border-radius: 20px; letter-spacing: .03em;
}
.featured-date-box {
  position: absolute; top: 12px; right: 12px;
  background: rgba(255,255,255,.95);
  border-radius: 10px; padding: 8px 12px;
  text-align: center; min-width: 52px;
  box-shadow: 0 2px 8px rgba(0,0,0,.1);
}
.featured-date-box .day { font-size: 22px; font-weight: 800; color: var(--fita); line-height: 1; }
.featured-date-box .mon { font-size: 10px; color: var(--muted); font-weight: 600; text-transform: uppercase; margin-top: 2px; }
.featured-body { padding: 18px 20px; }
.featured-title {
  font-size: 15px; font-weight: 700; color: var(--text);
  margin-bottom: 8px; line-height: 1.45;
}
.featured-title:hover { color: var(--fita); }
.featured-meta { display: flex; flex-wrap: wrap; gap: 14px; margin-bottom: 14px; }
.meta-item { display: flex; align-items: center; gap: 5px; font-size: 13px; color: var(--muted); }
.meta-item i { font-size: 13px; color: var(--fita2); }
.featured-footer {
  padding: 12px 20px;
  border-top: 1px solid #f1f5f9;
  display: flex; align-items: center; justify-content: space-between;
  background: #fafcff;
}
.tag-pill {
  display: inline-flex; align-items: center;
  font-size: 11px; font-weight: 600;
  padding: 3px 10px; border-radius: 20px;
}
.tag-free   { background: #f0fdf4; color: #166534; border: 1px solid #86efac; }
.tag-paid   { background: #fffbeb; color: #92400e; border: 1px solid #fcd34d; }
.tag-online { background: var(--fita-pale); color: var(--fita); border: 1px solid #dcfce7; }
.tag-gray   { background: #f3f4f6; color: #6b7280; border: 1px solid #e2e8f0; }

/* ── EVENT LIST (post-style giống fita) ── */
.events-list {
  background: #fff;
  border-radius: 16px;
  border: 1px solid var(--border);
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
  overflow: hidden;
  margin-bottom: 22px;
}
.event-row {
  display: flex;
  gap: 16px;
  padding: 16px 18px;
  border-bottom: 1px solid #f1f5f9;
  text-decoration: none;
  color: inherit;
  transition: .15s;
  align-items: flex-start;
}
.event-row:last-child { border-bottom: none; }
.event-row:hover { background: #f8fbff; }
.event-row:first-child { border-radius: 16px 16px 0 0; }
.event-row:last-child:hover { border-radius: 0 0 16px 16px; }

/* Thumbnail giống post fita: w-44 h-28 */
.event-thumb {
  width: 140px; min-width: 140px; height: 96px;
  border-radius: 10px; overflow: hidden; position: relative;
  background: var(--fita-pale); flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
  color: var(--fita2); font-size: 28px;
}
.event-thumb img { width: 100%; height: 100%; object-fit: cover; transition: transform .3s; }
.event-row:hover .event-thumb img { transform: scale(1.05); }
.thumb-date {
  position: absolute; bottom: 6px; left: 6px;
  background: rgba(22,163,74,.92); color: #fff;
  font-size: 10px; font-weight: 700;
  padding: 2px 7px; border-radius: 6px;
}
.thumb-new {
  position: absolute; top: 0; left: 0;
  background: var(--gold); color: #fff;
  font-size: 9px; font-weight: 700;
  padding: 2px 7px; border-radius: 0 0 7px 0;
}

.event-content { flex: 1; min-width: 0; }
.event-cats { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 6px; }
.cat-badge {
  background: var(--fita); color: #fff;
  font-size: 11px; font-weight: 600;
  padding: 2px 8px; border-radius: 4px;
}
.event-title {
  font-size: 15px; font-weight: 700;
  color: var(--text); line-height: 1.4;
  margin-bottom: 5px;
  display: -webkit-box; -webkit-line-clamp: 2;
  -webkit-box-orient: vertical; overflow: hidden;
}
.event-row:hover .event-title { color: var(--fita); }
.event-desc {
  font-size: 13px; color: var(--muted);
  line-height: 1.6; margin-bottom: 7px;
  display: -webkit-box; -webkit-line-clamp: 2;
  -webkit-box-orient: vertical; overflow: hidden;
}
.event-info-row { display: flex; flex-wrap: wrap; gap: 12px; font-size: 12px; color: var(--muted); }
.ei { display: flex; align-items: center; gap: 4px; }
.ei i { color: var(--fita2); font-size: 12px; }

/* Register button */
.btn-reg {
  padding: 6px 16px; border-radius: 8px;
  font-size: 12px; font-weight: 700;
  border: none; cursor: pointer; white-space: nowrap;
  font-family: var(--font); transition: .15s;
  flex-shrink: 0; align-self: center;
}
.btn-reg-prim  { background: var(--fita); color: #fff; }
.btn-reg-prim:hover { background: #15803d; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(22,163,74,.3); }
.btn-reg-done  { background: #f3f4f6; color: #9ca3af; cursor: default; }
.btn-reg-ok    { background: var(--fita-pale); color: var(--fita); border: 1px solid #dcfce7; }
.btn-reg-ok:hover { background: #dcfce7; }
.btn-reg-free  { background: #f0fdf4; color: #166534; border: 1px solid #86efac; }
.btn-reg-free:hover { background: #dcfce7; }

/* Spinning loader */
.spin { display: inline-block; width: 11px; height: 11px; border: 2px solid rgba(255,255,255,.3); border-top-color: #fff; border-radius: 50%; animation: spin .6s linear infinite; }
@keyframes spin { to { transform: rotate(360deg); } }

/* Empty */
.empty { text-align: center; padding: 48px 20px; color: var(--muted); font-size: 14px; background: #fff; border-radius: 16px; border: 1px solid var(--border); }

/* ── RIGHT SIDEBAR ── */
.sidebar-col { display: flex; flex-direction: column; gap: 20px; }

.sb-card {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 14px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
.sb-card-head {
  padding: 13px 16px;
  border-bottom: 1px solid var(--border);
  font-size: 14px; font-weight: 800;
  color: var(--fita); text-transform: uppercase;
  letter-spacing: .04em; font-family: var(--font);
}
.sb-card-body { padding: 12px 14px; display: flex; flex-direction: column; gap: 3px; }


.sb-search {
  padding: 9px 12px 9px 36px;
  border: 1px solid var(--border); border-radius: 9px;
  font-size: 13px; color: var(--text);
  font-family: var(--font); width: 100%; transition: .15s;
}
.sb-search:focus { outline: none; border-color: var(--fita2); box-shadow: 0 0 0 3px rgba(22,163,74,.1); }
.sb-search-wrap { position: relative; }
.sb-search-wrap i { position: absolute; left: 11px; top: 50%; transform: translateY(-50%); font-size: 13px; color: var(--muted); }

/* Category list */
.cat-btn {
  width: 100%; text-align: left;
  padding: 9px 12px; border-radius: 8px;
  border: none; background: transparent;
  font-size: 13px; font-weight: 500;
  color: var(--muted); cursor: pointer;
  font-family: var(--font); transition: .15s;
  display: flex; justify-content: space-between; align-items: center;
}
.cat-btn:hover { background: #f1f5f9; color: var(--text); }
.cat-btn.active { background: var(--fita); color: #fff; font-weight: 700; }
.cat-btn .cnt { font-size: 11px; opacity: .7; }


.mini-ev {
  display: flex; gap: 10px; padding: 9px 0;
  border-bottom: 1px solid #f1f5f9; text-decoration: none; color: inherit; transition: .15s;
}
.mini-ev:last-child { border-bottom: none; }
.mini-ev:hover .mini-ev-title { color: var(--fita); }
.mini-date {
  width: 38px; height: 38px; border-radius: 9px;
  background: var(--fita-pale); border: 1px solid #dcfce7;
  display: flex; flex-direction: column; align-items: center;
  justify-content: center; flex-shrink: 0;
}
.mini-date .d { font-size: 14px; font-weight: 800; color: var(--fita); line-height: 1; }
.mini-date .m { font-size: 9px; color: var(--muted); font-weight: 600; text-transform: uppercase; }
.mini-ev-title { font-size: 12px; font-weight: 600; color: var(--text); line-height: 1.4; margin-bottom: 2px; }
.mini-ev-loc { font-size: 11px; color: var(--muted); }

 .btn-reset {
  width: 100%; padding: 8px; border-radius: 8px;
  border: 1px solid var(--border); background: #f8fafc;
  font-size: 12px; font-weight: 600; color: var(--muted);
  cursor: pointer; font-family: var(--font); transition: .15s;
  margin-top: 6px;
}
.btn-reset:hover { background: #fee2e2; border-color: #fca5a5; color: #dc2626; }

.pagination { margin-top: 8px; }

/* ── RESPONSIVE ── */
@media(max-width: 900px) {
  .page-wrap { grid-template-columns: 1fr; }
  .sidebar-col { order: -1; }
  .stats-row { grid-template-columns: 1fr 1fr 1fr; }
}
@media(max-width: 640px) {
  .page-wrap { padding: 16px; }
  .stats-row { grid-template-columns: 1fr 1fr; }
  .filter-row { flex-wrap: wrap; }
  .event-thumb { width: 90px; min-width: 90px; height: 72px; }
  .featured-img { height: 160px; }
}
</style>
<div class="page-banner">
  <div class="page-banner-inner" style="display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:12px">
    <div>
      <div class="page-banner-title">Sự kiện &amp; Hoạt động</div>
      <div class="page-banner-sub">Các sự kiện kết nối cựu sinh viên, hội thảo nghề nghiệp và hoạt động cộng đồng</div>
    </div>
    <a href="{{ route('event.create') }}"
      style="display:inline-flex;align-items:center;gap:7px;padding:9px 18px;background:#16a34a;color:#fff;border-radius:10px;font-size:13.5px;font-weight:700;text-decoration:none;transition:background .15s;white-space:nowrap"
      onmouseover="this.style.background='#15803d'" onmouseout="this.style.background='#16a34a'">
      <i class="fa-solid fa-plus"></i> Đăng sự kiện
    </a>
  </div>
</div>


<div class="page-wrap">

  <div class="main-col">

  
    @if(session('error'))
      <div class="flash-e"><i class="fa-solid fa-times"></i> {{ session('error') }}</div>
    @endif

    <div class="filter-row">
      <button wire:click="setTab('all')"      class="ftab {{ $activeTab === 'all'      ? 'active' : '' }}">Tất cả</button>
      <button wire:click="setTab('upcoming')" class="ftab {{ $activeTab === 'upcoming' ? 'active' : '' }}">Sắp tới</button>
      <button wire:click="setTab('free')"     class="ftab {{ $activeTab === 'free'     ? 'active' : '' }}">Miễn phí</button>
      <button wire:click="setTab('past')"     class="ftab {{ $activeTab === 'past'     ? 'active' : '' }}">Đã qua</button>
    </div>

     
    @if($featured && $activeTab === 'all' && !$search)
    <div style="margin-bottom: 24px;">
      <div class="sec-heading">Sự kiện nổi bật</div>
      <a href="{{ route('event.show', $featured->id) }}" class="featured-card" wire:navigate>
        <div class="featured-img">
          @if($featured->image)
            <img src="{{ asset('storage/'.$featured->image) }}" alt="{{ $featured->title }}">
          @else
            <i class="fa-solid fa-calendar-star"></i>
          @endif
          <div class="featured-badge"><i class="fa-solid fa-star"></i> Nổi bật</div>
          <div class="featured-date-box">
            <div class="day">{{ $featured->day }}</div>
            <div class="mon">{{ $featured->month_label }}</div>
          </div>
        </div>
        <div class="featured-body">
          <div class="featured-title">{{ $featured->title }}</div>
          <div class="featured-meta">
            <div class="meta-item"><i class="fa-solid fa-location-dot"></i> {{ $featured->location ?: 'TBA' }}</div>
            <div class="meta-item"><i class="fa-regular fa-clock"></i> {{ $featured->time_range }}</div>
            <div class="meta-item"><i class="fa-solid fa-users"></i> {{ $featured->target_audience ?: 'Tất cả' }}</div>
            <div class="meta-item"><i class="fa-solid fa-tag"></i> {{ $featured->format_label }}</div>
          </div>
          @if($featured->description)
            <p style="font-size:13px;color:#5c6470;line-height:1.7;">{{ Str::limit(strip_tags($featured->description), 160) }}</p>
          @endif
        </div>
        <div class="featured-footer">
          <div style="display:flex;gap:6px;flex-wrap:wrap;">
            @if($featured->is_free)
              <span class="tag-pill tag-free">Miễn phí</span>
            @else
              <span class="tag-pill tag-paid">Có phí</span>
            @endif
            <span class="tag-pill tag-online">{{ $featured->format_label }}</span>
            @foreach(($featured->tags ?? []) as $tag)
              <span class="tag-pill tag-gray">{{ $tag }}</span>
            @endforeach
          </div>
          <span style="font-size:12.5px;font-weight:700;color:var(--fita);">Xem chi tiết →</span>
        </div>
      </a>
    </div>
    @endif

     
    <div class="sec-heading">
      {{ $activeTab === 'past' ? 'Sự kiện đã qua' : ($search ? 'Kết quả tìm kiếm' : 'Danh sách sự kiện') }}
    </div>

    @if($gridEvents->count())
      <div class="events-list">
        @foreach($gridEvents as $event)
        <a href="{{ route('event.show', $event->id) }}" class="event-row" wire:navigate>

        
          <div class="event-thumb">
            @if($event->image)
              <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->title }}">
            @else
              <i class="fa-solid fa-calendar-days"></i>
            @endif
            <div class="thumb-date">{{ $event->day }} {{ $event->month_label }}</div>
            @if($event->is_new ?? false)
              <div class="thumb-new">Mới</div>
            @endif
          </div>

          
          <div class="event-content">
            <div class="event-cats">
              @if($event->is_free)
                <span class="tag-pill tag-free" style="font-size:10px;padding:2px 7px;">Miễn phí</span>
              @else
                <span class="tag-pill tag-paid" style="font-size:10px;padding:2px 7px;">Có phí</span>
              @endif
              @if($event->is_internal ?? false)
                <span class="tag-pill tag-gray" style="font-size:10px;padding:2px 7px;">Nội bộ</span>
              @endif
              @if($event->category)
                <span class="cat-badge">{{ $event->category }}</span>
              @endif
            </div>

            <div class="event-title">{{ $event->title }}</div>

            @if($event->description)
              <div class="event-desc">{{ Str::limit(strip_tags($event->description), 120) }}</div>
            @endif

            <div class="event-info-row">
              <span class="ei"><i class="fa-solid fa-location-dot"></i>{{ $event->location ?: 'TBA' }}</span>
              <span class="ei"><i class="fa-regular fa-clock"></i>{{ $event->time_range }}</span>
              <span class="ei"><i class="fa-solid fa-tag"></i>{{ $event->format_label ?? 'Trực tiếp' }}</span>
            </div>
          </div>

        </a>
        @endforeach
      </div>

      
      @if($gridEvents->hasPages())
        <div class="pgn-row">{{ $gridEvents->links() }}</div>
      @endif

    @else
      <div class="empty">
        <i class="fa-solid fa-calendar-xmark" style="font-size:36px;color:#cbd5e1;margin-bottom:12px;display:block;"></i>
        Không tìm thấy sự kiện nào.
      </div>
    @endif

  </div> 

  <aside class="sidebar-col">

    <div class="sb-card">
      <div class="sb-card-head">Tìm kiếm</div>
      <div class="sb-card-body">
        <div class="sb-search-wrap">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input class="sb-search" wire:model.live.debounce.300ms="search" type="text" placeholder="Tìm sự kiện...">
        </div>
      </div>
    </div>

    <div class="sb-card">
      <div class="sb-card-head">Danh mục</div>
      <div class="sb-card-body">
        <button wire:click="setTab('all')" class="cat-btn {{ $activeTab === 'all' ? 'active' : '' }}">
          Tất cả sự kiện <span class="cnt">{{ $stats['year_total'] }}</span>
        </button>
        <button wire:click="setTab('upcoming')" class="cat-btn {{ $activeTab === 'upcoming' ? 'active' : '' }}">
          Sắp diễn ra <span class="cnt">{{ $stats['upcoming'] }}</span>
        </button>
        <button wire:click="setTab('free')" class="cat-btn {{ $activeTab === 'free' ? 'active' : '' }}">
          Miễn phí
        </button>
        <button wire:click="setTab('past')" class="cat-btn {{ $activeTab === 'past' ? 'active' : '' }}">
          Đã qua
        </button>
        @if($search)
          <button wire:click="$set('search', '')" class="btn-reset">✕ Xoá tìm kiếm</button>
        @endif
      </div>
    </div>

    @if($upcomingEvents->count())
    <div class="sb-card">
      <div class="sb-card-head">Sắp diễn ra</div>
      <div class="sb-card-body" style="padding:12px 16px;">
        @foreach($upcomingEvents->take(5) as $ev)
        <a href="{{ route('event.show', $ev->id) }}" class="mini-ev" wire:navigate>
          <div class="mini-date">
            <div class="d">{{ $ev->day }}</div>
            <div class="m">{{ $ev->month_label }}</div>
          </div>
          <div>
            <div class="mini-ev-title">{{ Str::limit($ev->title, 52) }}</div>
            <div class="mini-ev-loc"><i class="fa-solid fa-location-dot" style="color:var(--fita2);margin-right:3px;"></i>{{ $ev->location ?: 'TBA' }}</div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @endif

  </aside>

</div>

</div>