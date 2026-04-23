<div>
<style>
.ep-wrap{max-width:920px;margin:0 auto;padding:2rem 1.5rem}
.back-btn{display:inline-flex;align-items:center;gap:6px;font-size:13px;color:#6b7280;cursor:pointer;background:none;border:none;font-family:inherit;text-decoration:none;margin-bottom:1.25rem}
.back-btn:hover{color:#111}
.flash-ok{background:#f0fdf4;border:1px solid #86efac;color:#166534;padding:9px 14px;border-radius:8px;font-size:13px;margin-bottom:1rem}
.ep-layout{display:grid;grid-template-columns:1fr 280px;gap:1.25rem}
 
/* Cover */
.cover-box{width:100%;height:260px;border-radius:12px;overflow:hidden;position:relative;margin-bottom:1.25rem;background:linear-gradient(135deg,#1a2035,#1e3a5f);}
.cover-box img{width:100%;height:100%;object-fit:cover;}
.cover-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.7) 0%,transparent 60%);}
.cover-date{position:absolute;top:14px;left:14px;background:rgba(0,0,0,.5);backdrop-filter:blur(8px);border-radius:8px;padding:8px 12px;text-align:center;}
.cover-day{font-size:22px;font-weight:700;color:#fff;line-height:1;}
.cover-month{font-size:10px;color:#94a3b8;margin-top:1px;}
.cover-badge{position:absolute;top:14px;right:14px;padding:4px 12px;border-radius:20px;font-size:11px;font-weight:600;}
.cb-free{background:#dcfce7;color:#166534;}
.cb-reg{background:#fef9c3;color:#92400e;}
.cb-paid{background:#fce7f3;color:#9d174d;}
.cover-title{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);text-align:center;font-size:22px;font-weight:700;color:#fff;width:80%;line-height:1.3;}    
/* Main card */
.main-card{background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:1.5rem;margin-bottom:10px;}
.ev-title{font-size:20px;font-weight:700;color:#111;margin-bottom:.75rem;line-height:1.3;}
.tag-row{display:flex;gap:6px;flex-wrap:wrap;margin-bottom:1.25rem;}
.tag{font-size:11px;font-weight:500;padding:3px 10px;border-radius:20px;}
.tg{background:#f0fdf4;color:#166534;}.tb{background:#eff6ff;color:#1e40af;}.tgr{background:#f3f4f6;color:#6b7280;}
 
/* Info grid */
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:.75rem;margin-bottom:1.5rem;}
.ig-item{display:flex;align-items:flex-start;gap:10px;padding:.875rem;background:#f8fafc;border-radius:8px;}
.ig-ico{width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.ig-label{font-size:10px;color:#9ca3af;margin-bottom:2px;}
.ig-val{font-size:13px;font-weight:600;color:#111;}
 
/* Content */
.sec-title{font-size:14px;font-weight:600;color:#111;margin-bottom:.75rem;padding-top:1.25rem;border-top:1px solid #f3f4f6;}
.sec-title:first-of-type{border-top:none;padding-top:0;}
.ev-content{font-size:13px;color:#374151;line-height:1.8;}
.ev-content p{margin-bottom:.875rem;}
.ev-content ul{padding-left:1.25rem;margin-bottom:.875rem;}
.ev-content li{margin-bottom:3px;}
.ev-content strong{color:#111;font-weight:600;}
 
/* Sidebar */
.side-card{background:#fff;border:1px solid #e2e8f0;border-radius:10px;padding:1.1rem;margin-bottom:10px;}
.side-title{font-size:12px;font-weight:600;color:#374151;margin-bottom:.875rem;}
.countdown{background:#f8fafc;border:1px solid #e2e8f0;border-radius:8px;padding:1rem;text-align:center;margin-bottom:.875rem;}
.cd-label{font-size:11px;color:#9ca3af;margin-bottom:.5rem;}
.cd-nums{display:flex;justify-content:center;gap:8px;}
.cd-item{background:#fff;border:1px solid #e2e8f0;border-radius:6px;padding:6px 10px;min-width:48px;}
.cd-num{font-size:18px;font-weight:700;color:#111;line-height:1;}
.cd-unit{font-size:9px;color:#9ca3af;margin-top:1px;}
.reg-btn{width:100%;padding:11px;background:#111;color:#fff;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;margin-bottom:8px;transition:background .15s;}
.reg-btn:hover{background:#333;}
.reg-btn.done{background:#166534;}
.reg-btn.done:hover{background:#15803d;}
.save-btn{width:100%;padding:9px;background:#fff;color:#374151;border:1px solid #e2e8f0;border-radius:8px;font-size:13px;cursor:pointer;font-family:inherit;display:flex;align-items:center;justify-content:center;gap:6px;transition:all .15s;}
.save-btn:hover{background:#f9fafb;}
.save-btn.saved{border-color:#fca5a5;color:#dc2626;background:#fef2f2;}
.meta-row{display:flex;justify-content:space-between;padding:7px 0;border-bottom:1px solid #f3f4f6;font-size:12px;}
.meta-row:last-child{border-bottom:none;}
.meta-key{color:#6b7280;}.meta-val{color:#111;font-weight:500;}
.progress-bar{height:6px;background:#f3f4f6;border-radius:3px;overflow:hidden;margin-top:6px;}
.progress-fill{height:100%;background:#3b82f6;border-radius:3px;transition:width .5s;}
.att-list{display:flex;margin-bottom:.5rem;}
.att-av{width:28px;height:28px;border-radius:50%;border:2px solid #fff;margin-left:-8px;display:flex;align-items:center;justify-content:center;font-size:10px;font-weight:700;flex-shrink:0;}
.att-av:first-child{margin-left:0;}
.att-more{background:#f3f4f6;color:#6b7280;}
.att-count{font-size:12px;color:#6b7280;}
.share-row{display:flex;gap:6px;}
.share-btn{flex:1;padding:7px;border:1px solid #e2e8f0;border-radius:7px;background:#fff;font-size:11px;color:#374151;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:4px;font-family:inherit;}
.share-btn:hover{background:#f9fafb;}
.rel-item{display:flex;gap:10px;padding:.75rem 0;border-bottom:1px solid #f3f4f6;cursor:pointer;transition:opacity .15s;}
.rel-item:last-child{border-bottom:none;}
.rel-item:hover{opacity:.75;}
.rel-date{min-width:36px;text-align:center;flex-shrink:0;}
.rel-day{font-size:16px;font-weight:700;color:#111;line-height:1;}
.rel-month{font-size:9px;color:#9ca3af;}
.rel-title{font-size:12px;font-weight:500;color:#111;line-height:1.4;}
.rel-meta{font-size:11px;color:#9ca3af;margin-top:2px;}
.past-event{opacity:.6;}
 
@media(max-width:768px){
  .ep-layout{grid-template-columns:1fr;}
  .info-grid{grid-template-columns:1fr 1fr;}
  .ep-wrap{padding:1rem;}
  .cover-box{height:200px;}
  .cover-title{font-size:16px;}
}
@media(max-width:480px){
  .info-grid{grid-template-columns:1fr;}
  .cd-nums{gap:5px;}
}
</style>
 
<div class="ep-wrap">
 
  <a href="{{ route('event') }}" class="back-btn">
    <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M10 4L6 8l4 4" stroke="#6b7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
    Quay lại sự kiện
  </a>
 
  @if(session('success'))
    <div class="flash-ok"><i class="fa-solid fa-check"></i>{{ session('success') }}</div>
  @endif
 
  <div class="ep-layout">
 
    
    <div>
     
      <div class="cover-box">
        @if($event->cover_image ?? false)
          <img src="{{ asset('storage/'.$event->cover_image) }}" alt="{{ $event->title }}">
        @endif
        <div class="cover-overlay"></div>
        <div class="cover-date">
          <div class="cover-day">{{ $event->event_date->format('d') }}</div>
          <div class="cover-month">Tháng {{ $event->event_date->format('n') }}, {{ $event->event_date->format('Y') }}</div>
        </div>
        <span class="cover-badge {{ $event->badge === 'free' ? 'cb-free' : ($event->badge === 'register' ? 'cb-reg' : 'cb-paid') }}">
          {{ $event->badge_label }}
        </span>
        <div class="cover-title">{{ $event->title }}</div>
      </div>
 
      <div class="main-card">
        <div class="ev-title">{{ $event->title }}</div>
        <div class="tag-row">
          <span class="tag tg">{{ $event->badge_label }}</span>
          @if($event->khoa ?? false)
            <span class="tag tb">{{ $event->khoa }}</span>
          @endif
          <span class="tag tgr">Trực tiếp</span>
        </div>
 
        
        <div class="info-grid">
          <div class="ig-item">
            <div class="ig-ico" style="background:#eff6ff">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><rect x="2" y="3" width="12" height="11" rx="1.5" stroke="#3b82f6" stroke-width="1.5"/><path d="M5 1v4M11 1v4M2 7h12" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round"/></svg>
            </div>
            <div>
              <div class="ig-label">Ngày diễn ra</div>
              <div class="ig-val">{{ $event->event_date->isoFormat('dddd, DD/MM/YYYY') }}</div>
            </div>
          </div>
          <div class="ig-item">
            <div class="ig-ico" style="background:#faf5ff">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="8" r="6" stroke="#9333ea" stroke-width="1.5"/><path d="M8 5v3.5l2 2" stroke="#9333ea" stroke-width="1.5" stroke-linecap="round"/></svg>
            </div>
            <div>
              <div class="ig-label">Thời gian</div>
              <div class="ig-val">{{ $event->time_range ?: 'Chưa cập nhật' }}</div>
            </div>
          </div>
          <div class="ig-item">
            <div class="ig-ico" style="background:#fef9c3">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M8 1C5.24 1 3 3.24 3 6c0 4.25 5 9 5 9s5-4.75 5-9c0-2.76-2.24-5-5-5z" stroke="#d97706" stroke-width="1.5"/><circle cx="8" cy="6" r="1.5" stroke="#d97706" stroke-width="1.5"/></svg>
            </div>
            <div>
              <div class="ig-label">Địa điểm</div>
              <div class="ig-val">{{ $event->location ?? 'Chưa cập nhật' }}</div>
            </div>
          </div>
          <div class="ig-item">
            <div class="ig-ico" style="background:#f0fdf4">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><circle cx="8" cy="5" r="3" stroke="#16a34a" stroke-width="1.5"/><path d="M2 13c0-3 2.7-5 6-5s6 2 6 5" stroke="#16a34a" stroke-width="1.5" stroke-linecap="round"/></svg>
            </div>
            <div>
              <div class="ig-label">Loại vé</div>
              <div class="ig-val">{{ $event->badge_label }}</div>
            </div>
          </div>
        </div>
 
        
        @if($event->description ?? false)
          <div class="sec-title">Giới thiệu sự kiện</div>
          <div class="ev-content">{!! nl2br(e($event->description)) !!}</div>
        @else
          <div class="sec-title">Giới thiệu sự kiện</div>
          <div class="ev-content">
            <p>{{ $event->title }} là sự kiện được tổ chức bởi Học viện Nông nghiệp Việt Nam, dành cho toàn thể sinh viên và cựu sinh viên.</p>
            <p>Vui lòng liên hệ Ban tổ chức để biết thêm thông tin chi tiết về chương trình sự kiện.</p>
          </div>
        @endif
      </div>
    </div>
 
   
    <div>
 
   
      <div class="side-card">
        @if($event->event_date->isFuture())
          <div class="countdown">
            <div class="cd-label">Sự kiện diễn ra sau</div>
            <div class="cd-nums">
              <div class="cd-item"><div class="cd-num">{{ str_pad($countdown['days'], 2, '0', STR_PAD_LEFT) }}</div><div class="cd-unit">Ngày</div></div>
              <div class="cd-item"><div class="cd-num">{{ str_pad($countdown['hours'], 2, '0', STR_PAD_LEFT) }}</div><div class="cd-unit">Giờ</div></div>
              <div class="cd-item"><div class="cd-num">{{ str_pad($countdown['minutes'], 2, '0', STR_PAD_LEFT) }}</div><div class="cd-unit">Phút</div></div>
            </div>
          </div>
          <button wire:click="register" class="reg-btn {{ $registered ? 'done' : '' }}">
            <span wire:loading wire:target="register">Đang xử lý...</span>
            <span wire:loading.remove wire:target="register">
              {{ $registered ? '✓ Đã đăng ký' : '🎟 Đăng ký tham dự' }}
            </span>
          </button>
        @else
          <div style="text-align:center;padding:.875rem;background:#f8fafc;border-radius:8px;font-size:13px;color:#9ca3af;margin-bottom:.875rem;">
            Sự kiện đã kết thúc
          </div>
        @endif
        <button wire:click="toggleSave" class="save-btn {{ $saved ? 'saved' : '' }}">
          <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M8 13l-6-6a3 3 0 014-4l2 2 2-2a3 3 0 014 4l-6 6z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>
          {{ $saved ? 'Đã lưu' : 'Lưu sự kiện' }}
        </button>
      </div>
 
      <div class="side-card">
        <div class="side-title">Thông tin chi tiết</div>
        <div class="meta-row"><span class="meta-key">Hình thức</span><span class="meta-val">Trực tiếp</span></div>
        <div class="meta-row">
          <span class="meta-key">Loại vé</span>
          <span class="meta-val" style="{{ $event->badge === 'free' ? 'color:#166534' : '' }}">{{ $event->badge_label }}</span>
        </div>
        <div class="meta-row">
          <span class="meta-key">Ngày đăng</span>
          <span class="meta-val">{{ $event->created_at->format('d/m/Y') }}</span>
        </div>
      </div>
 
      
      <div class="side-card">
        <div class="side-title">Chia sẻ sự kiện</div>
        <div class="share-row">
          <button class="share-btn" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(window.location.href))">
            <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><rect x="1" y="1" width="14" height="14" rx="3" stroke="#1877f2" stroke-width="1.3"/><path d="M9 8h2.5L12 6H9V4.5C9 4 9.5 3.5 10 3.5h2V1.5h-2C8.1 1.5 7 2.6 7 4.5V6H5v2h2v5h2V8z" fill="#1877f2"/></svg>
            Facebook
          </button>
          <button class="share-btn" wire:click="copyLink">
            <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><path d="M6 10l4-4M5 7l-1 1a3 3 0 004 4l1-1M11 9l1-1a3 3 0 00-4-4L7 5" stroke="#6b7280" stroke-width="1.5" stroke-linecap="round"/></svg>
            Copy link
          </button>
        </div>
      </div>
 
     
      @if($relatedEvents->count() > 0)
      <div class="side-card">
        <div class="side-title">Sự kiện khác</div>
        @foreach($relatedEvents as $rel)
        <a href="{{ route('event.show', $rel->id) }}" style="text-decoration:none">
          <div class="rel-item {{ $rel->event_date->isPast() ? 'past-event' : '' }}">
            <div class="rel-date">
              <div class="rel-day">{{ $rel->event_date->format('d') }}</div>
              <div class="rel-month">Tháng {{ $rel->event_date->format('n') }}</div>
            </div>
            <div>
              <div class="rel-title">{{ Str::limit($rel->title, 50) }}</div>
              <div class="rel-meta"><i class="fa-solid fa-location-dot"></i> {{ Str::limit($rel->location ?? '—', 30) }} · {{ $rel->badge_label }}</div>
            </div>
          </div>
        </a>
        @endforeach
      </div>
      @endif
 
    </div>
  </div>
</div>
</div>
 