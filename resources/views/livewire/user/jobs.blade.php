<div>
<style>
:root{
  --jb-blue:#2563eb; --jb-blue-d:#1d4ed8;
  --jb-ink:#0f172a; --jb-muted:#64748b; --jb-line:#e5e7eb;
  --jb-bg:#f1f5f9; --font:'Be Vietnam Pro',system-ui,sans-serif;
}
.jb-page{font-family:var(--font);background:var(--jb-bg);min-height:70vh;padding-bottom:56px;}

/* ── HERO ── */
.jb-hero{background:#0b1120;color:#fff;padding:44px 0 64px;position:relative;overflow:hidden;}
.jb-hero-inner{max-width:1180px;margin:0 auto;padding:0 24px;position:relative;z-index:2;}
.jb-hero h1{font-size:clamp(26px,4vw,40px);font-weight:800;letter-spacing:-.5px;display:flex;align-items:center;gap:12px;margin:0 0 24px;}
.jb-hero h1 .spark{color:#60a5fa;font-size:.8em;}
.jb-searchbar{display:flex;align-items:center;background:#fff;border-radius:16px;padding:10px 10px 10px 4px;gap:4px;box-shadow:0 12px 40px rgba(0,0,0,.35);max-width:960px;}
.jb-sfield{flex:1;display:flex;align-items:center;gap:10px;padding:8px 14px;min-width:0;}
.jb-sfield svg{width:20px;height:20px;color:#94a3b8;flex-shrink:0;}
.jb-sfield input{flex:1;border:none;outline:none;font-size:14.5px;font-family:var(--font);color:var(--jb-ink);background:transparent;min-width:0;}
.jb-sfield input::placeholder{color:#94a3b8;}
.jb-sdiv{width:1px;height:30px;background:#e5e7eb;flex-shrink:0;}
.jb-sbtn{background:var(--jb-blue);color:#fff;border:none;border-radius:12px;padding:13px 30px;font-size:14px;font-weight:700;
  cursor:pointer;font-family:var(--font);transition:background .15s;flex-shrink:0;}
.jb-sbtn:hover{background:var(--jb-blue-d);}

/* ── BODY ── */
.jb-body{max-width:1180px;margin:0 auto;padding:0 24px;margin-top:-28px;position:relative;z-index:3;}
.jb-head{display:flex;align-items:center;justify-content:space-between;gap:12px;margin:0 0 20px;flex-wrap:wrap;
  background:transparent;}
.jb-head h2{font-size:24px;font-weight:800;color:var(--jb-ink);letter-spacing:-.4px;margin:0;}
.jb-sort{display:flex;align-items:center;gap:8px;background:#fff;border:1px solid var(--jb-line);border-radius:24px;padding:8px 16px;}
.jb-sort select{border:none;outline:none;background:transparent;font-size:13px;font-weight:600;color:var(--jb-ink);font-family:var(--font);cursor:pointer;}
.jb-sort svg{width:15px;height:15px;color:var(--jb-muted);}

.jb-layout{display:grid;grid-template-columns:236px 1fr;gap:26px;align-items:flex-start;}

/* ── SIDEBAR ── */
.jb-filters{display:flex;flex-direction:column;gap:8px;}
.jb-fgroup{padding:6px 2px 18px;border-bottom:1px solid var(--jb-line);}
.jb-fgroup:last-child{border-bottom:none;}
.jb-fhead{display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;}
.jb-fhead h4{font-size:14.5px;font-weight:700;color:var(--jb-ink);margin:0;}
.jb-clear{background:none;border:none;color:#ef4444;font-size:12.5px;font-weight:600;cursor:pointer;font-family:var(--font);padding:0;}
.jb-clear:hover{text-decoration:underline;}
.jb-check{display:flex;align-items:center;gap:10px;font-size:13.5px;color:#475569;cursor:pointer;padding:5px 0;transition:color .12s;}
.jb-check:hover{color:var(--jb-ink);}
.jb-check input{width:17px;height:17px;accent-color:var(--jb-blue);cursor:pointer;flex-shrink:0;border-radius:5px;}
.jb-check .cnt{margin-left:auto;font-size:12px;color:#94a3b8;}
.jb-range{width:100%;accent-color:var(--jb-blue);margin:6px 0 4px;cursor:pointer;}
.jb-range-lbl{display:flex;justify-content:space-between;font-size:12.5px;color:var(--jb-muted);font-weight:600;}

/* ── CARDS GRID ── */
.jb-cards{display:grid;grid-template-columns:repeat(auto-fill,minmax(268px,1fr));gap:18px;}
.jb-card{background:#fff;border:1px solid var(--jb-line);border-radius:16px;padding:20px;display:flex;flex-direction:column;
  transition:box-shadow .18s,transform .12s,border-color .18s;position:relative;text-decoration:none;color:inherit;}
.jb-card:hover{box-shadow:0 10px 30px rgba(15,23,42,.10);transform:translateY(-2px);border-color:#cbd5e1;}
.jb-card-top{display:flex;align-items:flex-start;gap:12px;margin-bottom:14px;}
.jb-logo{width:42px;height:42px;border-radius:11px;object-fit:cover;flex-shrink:0;background:#f1f5f9;}
.jb-logo-df{display:flex;align-items:center;justify-content:center;background:#eff6ff;color:var(--jb-blue);font-weight:800;font-size:15px;}
.jb-card-hd{flex:1;min-width:0;}
.jb-card-title{font-size:15.5px;font-weight:700;color:var(--jb-ink);line-height:1.3;margin:0 0 3px;
  white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.jb-card-sub{font-size:12.5px;color:var(--jb-muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.jb-heart{position:absolute;top:16px;right:16px;width:32px;height:32px;border-radius:50%;border:1px solid var(--jb-line);
  background:#fff;display:flex;align-items:center;justify-content:center;color:#cbd5e1;cursor:pointer;transition:.15s;}
.jb-heart:hover{color:#ef4444;border-color:#fecaca;background:#fef2f2;}
.jb-heart svg{width:15px;height:15px;}
.jb-tags{display:flex;flex-wrap:wrap;gap:7px;margin-bottom:12px;}
.jb-tag{font-size:11px;font-weight:600;padding:3px 11px;border-radius:20px;white-space:nowrap;}
.jb-tag.t-blue{background:#eff6ff;color:#2563eb;}
.jb-tag.t-purple{background:#f5f3ff;color:#7c3aed;}
.jb-tag.t-green{background:#ecfdf5;color:#059669;}
.jb-tag.t-orange{background:#fff7ed;color:#ea580c;}
.jb-tag.t-gray{background:#f1f5f9;color:#475569;}
.jb-tag.t-new{background:#ecfdf5;color:#059669;}
.jb-loc{display:flex;align-items:center;gap:6px;font-size:12.5px;color:#64748b;margin-bottom:14px;}
.jb-loc svg{width:14px;height:14px;flex-shrink:0;color:#94a3b8;}
.jb-desc{font-size:12.5px;color:var(--jb-muted);line-height:1.6;margin:0 0 16px;
  display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;flex:1;}
.jb-card-foot{display:flex;align-items:center;justify-content:space-between;gap:8px;margin-top:auto;}
.jb-salary{font-size:16px;font-weight:800;color:var(--jb-ink);}
.jb-salary small{font-size:12px;font-weight:500;color:var(--jb-muted);}
.jb-posted{display:flex;align-items:center;gap:5px;font-size:11.5px;color:#94a3b8;white-space:nowrap;}
.jb-posted svg{width:13px;height:13px;}

.jb-empty{grid-column:1/-1;background:#fff;border:1px dashed var(--jb-line);border-radius:16px;padding:56px 24px;text-align:center;color:#94a3b8;}
.jb-empty svg{width:48px;height:48px;color:#cbd5e1;margin:0 auto 12px;display:block;}
.jb-empty button{color:var(--jb-blue);background:none;border:none;cursor:pointer;font-family:var(--font);font-weight:600;text-decoration:underline;margin-top:6px;}

.jb-skillwarn{background:#fffbeb;border:1px solid #fde68a;border-radius:12px;padding:12px 16px;margin-bottom:18px;
  display:flex;align-items:center;gap:12px;}
.jb-skillwarn i{color:#f59e0b;font-size:16px;}
.jb-skillwarn .t{flex:1;font-size:13px;color:#92400e;}
.jb-skillwarn a{font-size:12px;font-weight:700;color:#fff;background:#f59e0b;padding:7px 14px;border-radius:8px;text-decoration:none;white-space:nowrap;}

.jb-pgn{margin-top:24px;}
.jb-cta{margin-top:20px;background:#0b1120;color:#fff;border-radius:16px;padding:20px;}
.jb-cta p{font-size:13px;color:#cbd5e1;line-height:1.6;margin:0 0 12px;}
.jb-cta a{display:block;text-align:center;background:var(--jb-blue);color:#fff;padding:10px;border-radius:10px;font-size:13px;font-weight:700;text-decoration:none;}
.jb-cta a:hover{background:var(--jb-blue-d);}

@media(max-width:900px){
  .jb-layout{grid-template-columns:1fr;}
  .jb-filters{order:-1;flex-direction:row;flex-wrap:wrap;gap:16px;background:#fff;border:1px solid var(--jb-line);border-radius:14px;padding:16px;}
  .jb-fgroup{border-bottom:none;padding:0;flex:1;min-width:150px;}
}
@media(max-width:560px){
  .jb-searchbar{flex-direction:column;align-items:stretch;padding:12px;gap:8px;}
  .jb-sdiv{display:none;}
  .jb-sbtn{width:100%;}
}
</style>

<div class="jb-page">

  {{-- ── HERO ── --}}
  <div class="jb-hero">
    <div class="jb-hero-inner">
      <h1>Tìm công việc mơ ước của bạn <span class="spark">✦</span></h1>
      <div class="jb-searchbar">
        <div class="jb-sfield">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" wire:model.live.debounce.400ms="search" placeholder="Chức danh hoặc từ khoá">
        </div>
        <div class="jb-sdiv"></div>
        <div class="jb-sfield">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          <input type="text" wire:model.live.debounce.400ms="locationSearch" placeholder="Thêm tỉnh / thành phố">
        </div>
        <button type="button" class="jb-sbtn">Tìm kiếm</button>
      </div>
    </div>
  </div>

  {{-- ── BODY ── --}}
  <div class="jb-body">
    <div class="jb-head">
      <h2>Việc làm gợi ý</h2>
      <div class="jb-sort">
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 6h18M6 12h12M10 18h4"/></svg>
        <select wire:model.live="sort">
          <option value="latest">Mới nhất</option>
          <option value="salary">Lương cao nhất</option>
        </select>
      </div>
    </div>

    <div class="jb-layout">

      {{-- SIDEBAR --}}
      <aside class="jb-filters">
        <div class="jb-fgroup">
          <div class="jb-fhead">
            <h4>Loại công việc</h4>
            <button class="jb-clear" wire:click="resetFilters">Xóa tất cả</button>
          </div>
          @foreach($jobTypes as $val => $label)
            <label class="jb-check">
              <input type="checkbox" wire:model.live="types" value="{{ $val }}">
              <span>{{ $label }}</span>
            </label>
          @endforeach
        </div>

        <div class="jb-fgroup">
          <div class="jb-fhead"><h4>Mức lương tối thiểu</h4></div>
          <input type="range" class="jb-range" min="0" max="50" step="5" wire:model.live="salaryMin">
          <div class="jb-range-lbl">
            <span>{{ $salaryMin > 0 ? 'Từ '.$salaryMin.' triệu' : 'Tất cả' }}</span>
            <span>50 triệu+</span>
          </div>
        </div>

        <div class="jb-fgroup">
          <div class="jb-fhead"><h4>Kinh nghiệm</h4></div>
          <label class="jb-check">
            <input type="checkbox" wire:model.live="expLevels" value="entry">
            <span>Mới đi làm</span><span class="cnt">{{ $expCounts['entry'] }}</span>
          </label>
          <label class="jb-check">
            <input type="checkbox" wire:model.live="expLevels" value="intermediate">
            <span>Trung cấp</span><span class="cnt">{{ $expCounts['intermediate'] }}</span>
          </label>
          <label class="jb-check">
            <input type="checkbox" wire:model.live="expLevels" value="expert">
            <span>Chuyên gia</span><span class="cnt">{{ $expCounts['expert'] }}</span>
          </label>
        </div>

        @if($locationOptions->count())
        <div class="jb-fgroup">
          <div class="jb-fhead"><h4>Địa điểm</h4></div>
          @foreach($locationOptions->take(6) as $loc)
            <label class="jb-check">
              <input type="checkbox" wire:model.live="locations" value="{{ $loc->location_key }}">
              <span>{{ $loc->location }}</span>
            </label>
          @endforeach
        </div>
        @endif

        <div class="jb-cta">
          <p>Đăng tin miễn phí, tiếp cận trực tiếp sinh viên &amp; cựu sinh viên VNUA.</p>
          @auth
            @if(in_array(auth()->user()->role, ['admin','company','alumni']))
              <a href="{{ route('job.create') }}" wire:navigate>+ Đăng tin tuyển dụng</a>
            @endif
          @endauth
        </div>
      </aside>

      {{-- MAIN --}}
      <div class="jb-main">

        @if(!$hasSkills)
          <div class="jb-skillwarn">
            <i class="fa-solid fa-circle-info"></i>
            <span class="t"><strong>Bạn chưa cập nhật kỹ năng</strong> — bổ sung để nhận gợi ý việc làm phù hợp.</span>
            <a href="{{ route('profile') }}" wire:navigate>Cập nhật</a>
          </div>
        @endif

        <div class="jb-cards">
          @forelse($jobs as $job)
            @php
              $isNew = $job->created_at && $job->created_at->diffInDays(now()) <= 3;
              $expLabel = ($job->experience_required ?? 0) >= 5 ? 'Chuyên gia'
                        : (($job->experience_required ?? 0) >= 2 ? 'Trung cấp' : 'Mới đi làm');
              $palette = ['#2563eb','#7c3aed','#0891b2','#059669','#d97706','#db2777','#4f46e5','#0d9488'];
              $avc = $palette[ crc32(mb_strtolower($job->company ?? 'c')) % count($palette) ];
            @endphp
            <a href="{{ route('job.show', $job->id) }}" wire:navigate class="jb-card">
              <div class="jb-heart" onclick="event.preventDefault();event.stopPropagation();this.classList.toggle('on')">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z"/></svg>
              </div>

              <div class="jb-card-top">
                @if(!empty($job->companyProfile?->logo))
                  <img src="{{ asset('storage/'.$job->companyProfile->logo) }}" class="jb-logo" alt="">
                @else
                  <div class="jb-logo jb-logo-df" style="background:{{ $avc }}1a;color:{{ $avc }}">{{ mb_strtoupper(mb_substr($job->company ?? 'C', 0, 1)) }}</div>
                @endif
                <div class="jb-card-hd">
                  <div class="jb-card-title">{{ $job->title }}</div>
                  <div class="jb-card-sub">{{ $job->company }} · {{ $job->applications_count }} ứng viên</div>
                </div>
              </div>

              <div class="jb-tags">
                @if($isNew)<span class="jb-tag t-new">● Mới</span>@endif
                <span class="jb-tag t-purple">{{ $expLabel }}</span>
                @if($job->type_label ?? $job->type)
                  <span class="jb-tag t-blue">{{ $job->type_label ?? $job->type }}</span>
                @endif
              </div>

              @if($job->description)
                <p class="jb-desc">{{ $job->description }}</p>
              @endif

              @if($job->location)
                <div class="jb-loc">
                  <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                  {{ $job->location }}
                </div>
              @endif

              <div class="jb-card-foot">
                <div class="jb-salary">
                  @if($job->min_salary || $job->max_salary)
                    {{ $job->salary_range }}
                  @else
                    <small>Thỏa thuận</small>
                  @endif
                </div>
                <div class="jb-posted">
                  <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
                  {{ $job->created_at?->diffForHumans() }}
                </div>
              </div>
            </a>
          @empty
            <div class="jb-empty">
              <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
              <p>Không tìm thấy tin tuyển dụng phù hợp.</p>
              <button wire:click="resetFilters">Xóa bộ lọc</button>
            </div>
          @endforelse
        </div>

        @if($jobs->hasPages())
          <div class="jb-pgn">{{ $jobs->links() }}</div>
        @endif
      </div>

    </div>
  </div>
</div>
</div>
