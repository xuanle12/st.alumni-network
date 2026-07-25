<div>
<style>
:root{ --jb-blue:#2563eb; --jb-blue-d:#1d4ed8; --jb-ink:#0f172a; --jb-muted:#64748b; --jb-line:#e5e7eb; --jb-bg:#f1f5f9; --font:'Be Vietnam Pro',system-ui,sans-serif; }
.ev-page{font-family:var(--font);background:var(--jb-bg);min-height:70vh;padding-bottom:56px;}

/* HERO */
.ev-hero{background:linear-gradient(120deg,#0961aa 0%,#0c83d8 55%,#3b9ae6 100%);color:#fff;padding:44px 0;overflow:hidden;}
.ev-hero-inner{max-width:1180px;margin:0 auto;padding:0 24px;}
.ev-hero h1{font-size:clamp(26px,4vw,40px);font-weight:800;letter-spacing:-.5px;display:flex;align-items:center;gap:12px;margin:0 0 24px;}
.ev-hero h1 .spark{color:#fde047;font-size:.8em;}
.ev-searchbar{display:flex;align-items:center;background:#fff;border-radius:14px;padding:6px 6px 6px 4px;gap:4px;max-width:820px;}
.ev-sfield{flex:1;display:flex;align-items:center;gap:10px;padding:8px 14px;min-width:0;}
.ev-sfield svg{width:20px;height:20px;color:#94a3b8;flex-shrink:0;}
.ev-sfield input{flex:1;border:none;outline:none;font-size:14.5px;font-family:var(--font);color:var(--jb-ink);background:transparent;min-width:0;}
.ev-sfield input::placeholder{color:#94a3b8;}
.ev-sbtn{background:var(--jb-blue);color:#fff;border:none;border-radius:12px;padding:13px 30px;font-size:14px;font-weight:700;cursor:pointer;font-family:var(--font);transition:.15s;flex-shrink:0;}
.ev-sbtn:hover{background:var(--jb-blue-d);}

/* BODY */
.ev-body{max-width:1180px;margin:26px auto 0;padding:0 24px;}
.ev-head{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:0 0 20px;flex-wrap:wrap;}
.ev-head h2{font-size:24px;font-weight:800;color:var(--jb-ink);letter-spacing:-.4px;margin:0;}
.ev-layout{display:grid;grid-template-columns:1fr 250px;gap:26px;align-items:flex-start;}
.ev-main{order:1;min-width:0;}
.ev-filters{display:flex;flex-direction:column;gap:8px;order:2;}

/* CARDS */
.ev-cards{display:grid;grid-template-columns:repeat(auto-fill,minmax(268px,1fr));gap:18px;}
.ev-card{background:#fff;border:1px solid var(--jb-line);border-radius:16px;padding:20px;display:flex;flex-direction:column;
  transition:box-shadow .18s,transform .12s,border-color .18s;text-decoration:none;color:inherit;}
.ev-card:hover{box-shadow:0 10px 30px rgba(15,23,42,.10);transform:translateY(-2px);border-color:#cbd5e1;}
.ev-card-top{display:flex;align-items:flex-start;gap:12px;margin-bottom:14px;}
.ev-date{width:52px;height:52px;border-radius:12px;flex-shrink:0;background:#eff6ff;color:#0961aa;
  display:flex;flex-direction:column;align-items:center;justify-content:center;line-height:1;}
.ev-date .d{font-size:20px;font-weight:800;}
.ev-date .m{font-size:10px;font-weight:600;text-transform:uppercase;margin-top:2px;}
.ev-card-hd{flex:1;min-width:0;}
.ev-card-title{font-size:15.5px;font-weight:700;color:var(--jb-ink);line-height:1.35;margin:0 0 3px;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;}
.ev-card-sub{font-size:12.5px;color:var(--jb-muted);display:flex;align-items:center;gap:5px;}
.ev-tags{display:flex;flex-wrap:wrap;gap:7px;margin-bottom:12px;}
.ev-tag{font-size:11px;font-weight:600;padding:3px 11px;border-radius:20px;white-space:nowrap;}
.ev-tag.t-blue{background:#eff6ff;color:#2563eb;}
.ev-tag.t-green{background:#ecfdf5;color:#059669;}
.ev-tag.t-amber{background:#fff7ed;color:#ea580c;}
.ev-desc{font-size:12.5px;color:var(--jb-muted);line-height:1.6;margin:0 0 14px;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;flex:1;}
.ev-card-foot{display:flex;align-items:center;justify-content:space-between;gap:8px;margin-top:auto;font-size:12px;color:var(--jb-muted);}
.ev-card-foot .more{color:var(--jb-blue);font-weight:700;}
.ev-loc{display:flex;align-items:center;gap:5px;}
.ev-loc svg{width:13px;height:13px;color:#94a3b8;}

.ev-empty{grid-column:1/-1;background:#fff;border:1px dashed var(--jb-line);border-radius:16px;padding:56px 24px;text-align:center;color:#94a3b8;}
.ev-empty i{font-size:40px;color:#cbd5e1;margin-bottom:12px;display:block;}
.ev-pgn{margin-top:24px;}

/* SIDEBAR */
.ev-cta{margin-bottom:16px;background:linear-gradient(135deg,#0961aa,#0c83d8);color:#fff;border-radius:16px;padding:18px;}
.ev-cta p{font-size:13px;color:#e0f2fe;line-height:1.6;margin:0 0 12px;}
.ev-cta a{display:block;text-align:center;background:#fff;color:#0961aa;padding:10px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;transition:.15s;}
.ev-cta a:hover{background:#eff6ff;}
.ev-fgroup{padding:6px 2px 18px;border-bottom:1px solid var(--jb-line);}
.ev-fgroup:last-child{border-bottom:none;}
.ev-fhead{font-size:14.5px;font-weight:700;color:var(--jb-ink);margin:0 0 12px;}
.ev-tabbtn{width:100%;text-align:left;display:flex;justify-content:space-between;align-items:center;
  padding:9px 12px;border-radius:9px;border:none;background:transparent;font-size:13.5px;font-weight:600;
  color:#475569;cursor:pointer;font-family:var(--font);transition:.12s;margin-bottom:2px;}
.ev-tabbtn:hover{background:#f1f5f9;color:var(--jb-ink);}
.ev-tabbtn.active{background:#eff6ff;color:#0961aa;}
.ev-tabbtn .cnt{font-size:12px;color:#94a3b8;}
.ev-mini{display:flex;gap:10px;padding:9px 0;border-bottom:1px solid #f1f5f9;text-decoration:none;color:inherit;}
.ev-mini:last-child{border-bottom:none;}
.ev-mini-date{width:40px;height:40px;border-radius:10px;background:#eff6ff;color:#0961aa;flex-shrink:0;
  display:flex;flex-direction:column;align-items:center;justify-content:center;line-height:1;}
.ev-mini-date .d{font-size:14px;font-weight:800;}
.ev-mini-date .m{font-size:9px;font-weight:600;text-transform:uppercase;}
.ev-mini-title{font-size:12.5px;font-weight:600;color:var(--jb-ink);line-height:1.4;margin-bottom:2px;}
.ev-mini:hover .ev-mini-title{color:#0961aa;}
.ev-mini-loc{font-size:11px;color:var(--jb-muted);}

.flash-e{background:#fef2f2;border:1px solid #fecaca;color:#b91c1c;padding:10px 14px;border-radius:10px;font-size:13px;margin-bottom:16px;}

@media(max-width:900px){
  .ev-layout{grid-template-columns:1fr;}
  .ev-filters{order:-1;flex-direction:row;flex-wrap:wrap;gap:14px;background:#fff;border:1px solid var(--jb-line);border-radius:14px;padding:16px;}
  .ev-fgroup{border-bottom:none;padding:0;flex:1;min-width:150px;}
}
@media(max-width:560px){
  .ev-searchbar{flex-direction:column;align-items:stretch;padding:12px;gap:8px;}
  .ev-sbtn{width:100%;}
}
</style>

<div class="ev-page">

  {{-- HERO --}}
  <div class="ev-hero">
    <div class="ev-hero-inner">
      <h1>Sự kiện &amp; Hoạt động <span class="spark">✦</span></h1>
      <div class="ev-searchbar">
        <div class="ev-sfield">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" wire:model.live.debounce.400ms="search" placeholder="Tìm sự kiện, hội thảo, địa điểm...">
        </div>
        <button type="button" class="ev-sbtn">Tìm kiếm</button>
      </div>
    </div>
  </div>

  {{-- BODY --}}
  <div class="ev-body">
    <div class="ev-head">
      <h2>{{ $activeTab === 'past' ? 'Sự kiện đã qua' : ($search ? 'Kết quả tìm kiếm' : 'Danh sách sự kiện') }}</h2>
    </div>

    @if(session('error'))
      <div class="flash-e"><i class="fa-solid fa-times"></i> {{ session('error') }}</div>
    @endif

    <div class="ev-layout">

      {{-- MAIN --}}
      <div class="ev-main">
        <div class="ev-cards">
          @forelse($gridEvents as $event)
            <a href="{{ route('event.show', $event->id) }}" wire:navigate class="ev-card">
              <div class="ev-card-top">
                <div class="ev-date">
                  <span class="d">{{ $event->day }}</span>
                  <span class="m">{{ $event->month_label }}</span>
                </div>
                <div class="ev-card-hd">
                  <div class="ev-card-title">{{ $event->title }}</div>
                  <div class="ev-card-sub"><i class="fa-regular fa-clock"></i> {{ $event->time_range }}</div>
                </div>
              </div>

              <div class="ev-tags">
                @if($event->is_free)
                  <span class="ev-tag t-green">Miễn phí</span>
                @else
                  <span class="ev-tag t-amber">Có phí</span>
                @endif
                @if($event->format_label)
                  <span class="ev-tag t-blue">{{ $event->format_label }}</span>
                @endif
              </div>

              @if($event->description)
                <p class="ev-desc">{{ \Illuminate\Support\Str::limit(strip_tags($event->description), 110) }}</p>
              @endif

              <div class="ev-card-foot">
                <span class="ev-loc">
                  <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                  {{ $event->location ?: 'TBA' }}
                </span>
                <span class="more">Xem chi tiết →</span>
              </div>
            </a>
          @empty
            <div class="ev-empty">
              <i class="fa-solid fa-calendar-xmark"></i>
              <div>Không tìm thấy sự kiện nào.</div>
            </div>
          @endforelse
        </div>

        @if($gridEvents->hasPages())
          <div class="ev-pgn">{{ $gridEvents->links() }}</div>
        @endif
      </div>

      {{-- SIDEBAR (bên phải) --}}
      <aside class="ev-filters">
        @if(auth()->user()->isAdmin())
          <div class="ev-cta">
            <p>Tổ chức sự kiện kết nối, hội thảo nghề nghiệp cho cựu sinh viên VNUA.</p>
            <a href="{{ route('event.create') }}" wire:navigate>+ Đăng sự kiện</a>
          </div>
        @endif

        <div class="ev-fgroup">
          <div class="ev-fhead">Phân loại</div>
          <button wire:click="setTab('all')" class="ev-tabbtn {{ $activeTab === 'all' ? 'active' : '' }}">
            Tất cả sự kiện <span class="cnt">{{ $stats['year_total'] }}</span>
          </button>
          <button wire:click="setTab('upcoming')" class="ev-tabbtn {{ $activeTab === 'upcoming' ? 'active' : '' }}">
            Sắp diễn ra <span class="cnt">{{ $stats['upcoming'] }}</span>
          </button>
          <button wire:click="setTab('free')" class="ev-tabbtn {{ $activeTab === 'free' ? 'active' : '' }}">
            Miễn phí
          </button>
          <button wire:click="setTab('past')" class="ev-tabbtn {{ $activeTab === 'past' ? 'active' : '' }}">
            Đã qua
          </button>
        </div>

        @if($upcomingEvents->count())
        <div class="ev-fgroup">
          <div class="ev-fhead">Sắp diễn ra</div>
          @foreach($upcomingEvents->take(5) as $ev)
            <a href="{{ route('event.show', $ev->id) }}" wire:navigate class="ev-mini">
              <div class="ev-mini-date">
                <span class="d">{{ $ev->day }}</span>
                <span class="m">{{ $ev->month_label }}</span>
              </div>
              <div>
                <div class="ev-mini-title">{{ \Illuminate\Support\Str::limit($ev->title, 46) }}</div>
                <div class="ev-mini-loc"><i class="fa-solid fa-location-dot" style="color:#0c83d8;margin-right:3px"></i>{{ $ev->location ?: 'TBA' }}</div>
              </div>
            </a>
          @endforeach
        </div>
        @endif
      </aside>

    </div>
  </div>
</div>
</div>
