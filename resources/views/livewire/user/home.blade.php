<div>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0;}
@keyframes fadeUp{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
@keyframes blink{0%,100%{opacity:1}50%{opacity:.3}}

:root{
  --blue:   #16a34a;
  --blue2:  #22c55e;
  --navy:   #043a6e;
  --pale:   #e8f0fe;
  --pale2:  #f4f8fd;
  --gold:   #F6A309;
  --border: #e2e8f0;
  --text:   #0f172a;
  --muted:  #64748b;
  --bg:     #f8fafc;
  --white:  #ffffff;
}

body{font-family:'Barlow',system-ui,sans-serif;color:var(--text);background:var(--bg);}

.lp{max-width:1200px;margin:0 auto;padding:0 24px;}
.hero{
  background:linear-gradient(135deg,#043a6e 0%,#16a34a 55%,#22c55e 100%);
  padding:80px 24px 0;
  position:relative;overflow:hidden;
}
.hero::before{
  content:'';position:absolute;inset:0;
  background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none'%3E%3Ccircle cx='30' cy='30' r='20' fill='%23ffffff' fill-opacity='0.025'/%3E%3C/g%3E%3C/svg%3E");
  pointer-events:none;
}

.hero-inner{
  max-width:1200px;margin:0 auto;
  display:grid;grid-template-columns:1fr 440px;
  gap:60px;align-items:flex-end;
  position:relative;
}

.hero-badge{
  display:inline-flex;align-items:center;gap:8px;
  background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);
  border-radius:100px;padding:5px 14px 5px 10px;
  font-size:12.5px;color:rgba(255,255,255,.85);
  font-weight:500;margin-bottom:22px;
  animation:fadeUp .5s ease both;
}
.hero-badge-dot{
  width:7px;height:7px;border-radius:50%;
  background:var(--gold);animation:blink 2s infinite;flex-shrink:0;
}

.hero h1{
  font-family:'Barlow Condensed','Barlow',sans-serif;
  font-size:clamp(36px,4.5vw,58px);font-weight:800;
  color:#fff;line-height:1.07;
  text-transform:uppercase;letter-spacing:-0.5px;
  margin-bottom:20px;
  animation:fadeUp .55s .05s ease both;
}
.hero h1 em{color:var(--gold);font-style:normal;}

.hero-desc{
  font-size:15.5px;color:rgba(255,255,255,.72);
  line-height:1.8;margin-bottom:32px;max-width:480px;
  animation:fadeUp .6s .1s ease both;
}

.hero-btns{
  display:flex;gap:12px;flex-wrap:wrap;margin-bottom:48px;
  animation:fadeUp .65s .15s ease both;
}
.btn-hero-w{
  padding:13px 26px;border-radius:10px;
  font-family:'Barlow',sans-serif;font-size:14px;font-weight:700;
  background:#fff;color:var(--green);border:none;
  cursor:pointer;text-decoration:none;
  transition:.18s;display:inline-flex;align-items:center;gap:8px;
}
.btn-hero-w:hover{opacity:.92;transform:translateY(-2px);box-shadow:0 6px 20px rgba(0,0,0,.15);}

.btn-hero-o{
  padding:13px 26px;border-radius:10px;
  font-family:'Barlow',sans-serif;font-size:14px;font-weight:600;
  background:rgba(255,255,255,.08);color:#fff;
  border:1.5px solid rgba(255,255,255,.3);
  cursor:pointer;text-decoration:none;
  transition:.18s;display:inline-flex;align-items:center;gap:8px;
}
.btn-hero-o:hover{background:rgba(255,255,255,.15);border-color:rgba(255,255,255,.6);}
.hero-stats-bar{
  display:flex;gap:0;background:rgba(255,255,255,.07);
  border-top:1px solid rgba(255,255,255,.12);
  animation:fadeUp .7s .2s ease both;
}
.hero-stat{
  flex:1;padding:20px 24px;
  border-right:1px solid rgba(255,255,255,.1);
  transition:background .18s;
}
.hero-stat:hover{background:rgba(255,255,255,.06);}
.hero-stat:last-child{border-right:none;}
.hero-stat-val{
  font-family:'Barlow Condensed',sans-serif;
  font-size:30px;font-weight:800;color:#fff;line-height:1;margin-bottom:4px;
}
.hero-stat-val span{font-size:18px;color:var(--gold);}
.hero-stat-lbl{font-size:12px;color:rgba(255,255,255,.5);font-weight:500;}
.hero-card{
  background:rgba(255,255,255,.08);
  backdrop-filter:blur(20px);
  border:1px solid rgba(255,255,255,.15);
  border-radius:20px;padding:28px;
  margin-bottom:0;
  animation:fadeUp .6s .1s ease both;
  align-self:center;
}
.hero-card-title{
  font-size:10.5px;font-weight:700;
  color:rgba(255,255,255,.45);
  letter-spacing:1.2px;text-transform:uppercase;
  margin-bottom:18px;
}
.hc-item{
  display:flex;align-items:center;gap:12px;
  padding:12px 0;border-bottom:1px solid rgba(255,255,255,.08);
}
.hc-item:last-child{border-bottom:none;padding-bottom:0;}
.hc-ico{
  width:38px;height:38px;border-radius:10px;
  background:rgba(255,255,255,.1);
  display:flex;align-items:center;justify-content:center;
  font-size:16px;color:rgba(255,255,255,.8);flex-shrink:0;
}
.hc-name{font-size:13.5px;font-weight:600;color:#fff;margin-bottom:2px;}
.hc-sub{font-size:11.5px;color:rgba(255,255,255,.5);}
.hc-tag{
  margin-left:auto;
  padding:3px 9px;border-radius:100px;
  font-size:11px;font-weight:600;white-space:nowrap;flex-shrink:0;
}
.hc-tag.new{background:rgba(246,163,9,.2);color:var(--gold);}
.hc-tag.hot{background:rgba(239,68,68,.2);color:#f87171;}
.hc-tag.open{background:rgba(16,185,129,.2);color:#34d399;}
section{padding:72px 24px;}
.sec-tag{
  font-size:11.5px;font-weight:700;
  letter-spacing:1.2px;text-transform:uppercase;
  color:var(--green);margin-bottom:10px;display:block;
}
.sec-title{
  font-family:'Barlow Condensed','Barlow',sans-serif;
  font-size:clamp(24px,3vw,36px);font-weight:800;
  color:var(--text);line-height:1.15;
  text-transform:uppercase;letter-spacing:.2px;margin-bottom:14px;
}
.sec-desc{font-size:15px;color:var(--muted);line-height:1.75;max-width:520px;}
.sec-hd{
  display:flex;align-items:flex-end;
  justify-content:space-between;
  margin-bottom:36px;gap:16px;
}
.sec-link{
  font-size:13.5px;font-weight:600;color:var(--green);
  text-decoration:none;display:flex;align-items:center;gap:5px;
  white-space:nowrap;flex-shrink:0;transition:.15s;
}
.sec-link:hover{color:var(--green-light);}
.feat-bg{background:var(--white);}
.feat-grid{
  display:grid;grid-template-columns:repeat(3,1fr);gap:20px;
}
.feat-card{
  background:var(--white);border:1px solid var(--border);
  border-radius:14px;padding:28px 26px;
  transition:.22s;cursor:default;
}
.feat-card:hover{
  border-color:#abc5ea;
  transform:translateY(-4px);
  box-shadow:0 8px 28px rgba(9,97,170,.08);
}
.feat-ic{
  width:46px;height:46px;border-radius:12px;
  background:var(--green-pale);border:1px solid #abc5ea;
  display:flex;align-items:center;justify-content:center;
  font-size:15px;color:var(--green);margin-bottom:16px;
  transition:.2s;
}
.feat-card:hover .feat-ic{background:var(--green);color:#fff;border-color:var(--green);}
.feat-title{font-size:14.5px;font-weight:700;color:var(--text);margin-bottom:8px;}
.feat-desc{font-size:13.5px;color:var(--muted);line-height:1.7;}
.jobs-bg{background:var(--bg);}
.jobs-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:14px;}
.job-card{
  background:var(--white);border:1px solid var(--border);
  border-radius:14px;padding:20px 22px;
  display:flex;gap:14px;align-items:flex-start;
  transition:.2s;text-decoration:none;
}
.job-card:hover{
  border-color:#abc5ea;
  box-shadow:0 4px 20px rgba(9,97,170,.08);
  transform:translateY(-2px);
}
.job-logo{
  width:46px;height:46px;border-radius:10px;
  background:var(--green-pale);border:1px solid var(--border);
  display:flex;align-items:center;justify-content:center;
  color:var(--green);flex-shrink:0;
  font-weight:700;font-size:14px;
}
.job-info{flex:1;min-width:0;}
.job-title{font-size:14.5px;font-weight:700;color:var(--text);margin-bottom:3px;}
.job-company{font-size:13px;color:var(--muted);margin-bottom:10px;}
.job-tags{display:flex;gap:6px;flex-wrap:wrap;}
.jtag{
  padding:3px 9px;border-radius:100px;
  font-size:11.5px;font-weight:500;
}
.jtag-blue{background:var(--green-pale);color:var(--green);}
.jtag-gold{background:#fdf3e0;color:#b87400;}
.jtag-gray{background:#f1f5f9;color:#64748b;}
.job-salary{
  font-size:13px;font-weight:700;color:var(--green);
  white-space:nowrap;flex-shrink:0;margin-top:2px;
}
.events-bg{background:var(--white);}
.events-list{display:flex;flex-direction:column;gap:12px;}
.ev-card{
  display:flex;align-items:center;gap:20px;
  background:var(--white);border:1px solid var(--border);
  border-radius:14px;padding:18px 22px;
  transition:.18s;text-decoration:none;
}
.ev-card:hover{
  border-color:#abc5ea;
  box-shadow:0 3px 16px rgba(9,97,170,.07);
  transform:translateY(-2px);
}
.ev-date{text-align:center;flex-shrink:0;width:52px;}
.ev-day{
  font-family:'Barlow Condensed',sans-serif;
  font-size:30px;font-weight:800;color:var(--green);line-height:1;
}
.ev-month{
  font-size:11px;font-weight:700;
  color:var(--muted);text-transform:uppercase;letter-spacing:.5px;
}
.ev-sep{width:1px;height:44px;background:var(--border);flex-shrink:0;}
.ev-info{flex:1;min-width:0;}
.ev-title{font-size:14.5px;font-weight:700;color:var(--text);margin-bottom:5px;}
.ev-meta{display:flex;gap:14px;flex-wrap:wrap;}
.ev-meta span{
  font-size:12.5px;color:var(--muted);
  display:flex;align-items:center;gap:5px;
}
.ev-badge{
  padding:4px 12px;border-radius:100px;
  font-size:11.5px;font-weight:600;flex-shrink:0;
}
.ev-badge-blue{background:var(--green-pale);color:var(--green);}
.ev-badge-gold{background:#fdf3e0;color:#b87400;}
.posts-bg{background:var(--bg);}
.posts-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;}
.post-card{
  background:var(--white);border:1px solid var(--border);
  border-radius:14px;overflow:hidden;
  transition:.2s;text-decoration:none;display:flex;flex-direction:column;
}
.post-card:hover{
  border-color:#abc5ea;
  box-shadow:0 6px 24px rgba(9,97,170,.08);
  transform:translateY(-3px);
}
.post-img{
  height:160px;background:linear-gradient(135deg,#16a34a,#22c55e);
  display:flex;align-items:center;justify-content:center;
  font-size:40px;flex-shrink:0;position:relative;overflow:hidden;
}
.post-img img{width:100%;height:100%;object-fit:cover;position:absolute;inset:0;}
.post-body{padding:20px;flex:1;display:flex;flex-direction:column;}
.post-cat{
  display:inline-block;padding:3px 10px;border-radius:100px;
  font-size:11.5px;font-weight:600;
  background:var(--green-pale);color:var(--green);
  margin-bottom:10px;
}
.post-title{
  font-size:14.5px;font-weight:700;color:var(--text);
  line-height:1.45;margin-bottom:10px;
}
.post-title:hover{color:var(--green);}
.post-excerpt{font-size:13px;color:var(--muted);line-height:1.65;flex:1;margin-bottom:14px;}
.post-foot{
  display:flex;align-items:center;gap:8px;
  padding-top:14px;border-top:1px solid var(--border);
  font-size:12px;color:var(--muted);
}
.post-ava{
  width:26px;height:26px;border-radius:50%;
  background:var(--green);color:#fff;
  font-size:10px;font-weight:700;
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
.post-date{margin-left:auto;}
.steps-bg{background:var(--white);}
.steps-grid{
  display:grid;grid-template-columns:repeat(3,1fr);
  gap:0;margin-top:40px;position:relative;
}
.steps-grid::before{
  content:'';position:absolute;
  top:22px;left:16.5%;right:16.5%;
  height:1px;background:#abc5ea;z-index:0;
}
.step-item{text-align:center;padding:0 20px;position:relative;z-index:1;}
.step-num{
  width:46px;height:46px;border-radius:50%;
  background:var(--white);border:2px solid #abc5ea;
  display:flex;align-items:center;justify-content:center;
  font-family:'Barlow Condensed',sans-serif;
  font-size:16px;font-weight:800;color:var(--green);
  margin:0 auto 18px;
  transition:.2s;
}
.step-item:hover .step-num{
  background:var(--green);color:#fff;border-color:var(--green);
  transform:scale(1.1);box-shadow:0 4px 14px rgba(9,97,170,.25);
}
.step-title{font-size:15px;font-weight:700;color:var(--text);margin-bottom:8px;}
.step-desc{font-size:13.5px;color:var(--muted);line-height:1.7;}
.cta-bg{background:var(--bg);}
.cta-box{
  background:linear-gradient(135deg,#043a6e,#16a34a);
  border-radius:20px;padding:64px 48px;
  text-align:center;position:relative;overflow:hidden;
}
.cta-box::before{
  content:'';position:absolute;inset:0;
  background:url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='30' cy='30' r='20' fill='%23ffffff' fill-opacity='0.025'/%3E%3C/svg%3E");
  pointer-events:none;
}
.cta-box h2{
  font-family:'Barlow Condensed','Barlow',sans-serif;
  font-size:clamp(26px,3.5vw,44px);font-weight:800;
  text-transform:uppercase;color:#fff;
  margin-bottom:14px;position:relative;
}
.cta-box h2 em{color:var(--gold);font-style:normal;}
.cta-box p{
  font-size:15.5px;color:rgba(255,255,255,.7);
  margin-bottom:32px;position:relative;
}
.cta-btns{display:flex;gap:12px;justify-content:center;flex-wrap:wrap;position:relative;}
.lp-div{height:1px;background:var(--border);}


.reveal{opacity:0;transform:translateY(20px);transition:opacity .5s ease,transform .5s ease;}
.reveal.visible{opacity:1;transform:translateY(0);}
@media(max-width:1024px){
  .hero-inner{grid-template-columns:1fr;gap:0;}
  .hero-card{display:none;}
  .feat-grid{grid-template-columns:repeat(2,1fr);}
  .posts-grid{grid-template-columns:repeat(2,1fr);}
}
@media(max-width:768px){
  section{padding:52px 20px;}
  .hero{padding:60px 20px 0;}
  .hero-stats-bar{flex-wrap:wrap;}
  .feat-grid{grid-template-columns:1fr;}
  .jobs-grid{grid-template-columns:1fr;}
  .posts-grid{grid-template-columns:1fr;}
  .steps-grid{grid-template-columns:1fr;gap:28px;}
  .steps-grid::before{display:none;}
  .sec-hd{flex-direction:column;align-items:flex-start;gap:12px;}
  .cta-box{padding:40px 24px;}
  .ev-sep{display:none;}
}
@media(max-width:480px){
  .hero h1{font-size:32px;}
  .hero-btns{flex-direction:column;}
  .btn-hero-w,.btn-hero-o{justify-content:center;}
  .cta-btns{flex-direction:column;align-items:stretch;}
}
</style>

<div class="hero">
  <div class="hero-inner">
    <div>
      <div class="hero-badge">
        <span class="hero-badge-dot"></span>
        Mạng lưới cựu sinh viên khoa CNTT — VNUA
      </div>
      <h1>Kết nối.<br><em>Chia sẻ.</em><br>Phát triển.</h1>
      <p class="hero-desc">Nền tảng kết nối cộng đồng cựu sinh viên Học viện Nông nghiệp Việt Nam — cơ hội nghề nghiệp, tri thức chuyên môn và mạng lưới bền vững.</p>
      <div class="hero-btns">
        <a href="{{ route('register') }}" class="btn-hero-w" wire:navigate>
          <i class="fa-solid fa-user-plus"></i> Tham gia miễn phí
        </a>
        <a href="{{ route('login') }}" class="btn-hero-o" wire:navigate>
          Đăng nhập <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>
    </div>

    <div class="hero-card">
      <div class="hero-card-title">Hoạt động gần đây</div>
      @foreach(($recentJobs ?? collect())->take(3) as $job)
      <div class="hc-item">
        <div class="hc-ico"><i class="fa-solid fa-briefcase"></i></div>
        <div>
          <div class="hc-name">{{ Str::limit($job->title ?? 'Vị trí tuyển dụng', 28) }}</div>
          <div class="hc-sub">{{ $job->company ?? 'Doanh nghiệp' }}</div>
        </div>
        <div class="hc-tag new">Mới</div>
      </div>
      @endforeach
      @foreach(($upcomingEvents ?? collect())->take(2) as $ev)
      <div class="hc-item">
        <div class="hc-ico"><i class="fa-solid fa-calendar"></i></div>
        <div>
          <div class="hc-name">{{ Str::limit($ev->title ?? 'Sự kiện sắp tới', 28) }}</div>
          <div class="hc-sub">{{ isset($ev->start_date) ? \Carbon\Carbon::parse($ev->start_date)->format('d/m/Y') : '' }}</div>
        </div>
        <div class="hc-tag open">Sắp diễn ra</div>
      </div>
      @endforeach
    </div>
  </div>

  <div style="max-width:1200px;margin:0 auto;">
    <div class="hero-stats-bar">
      <div class="hero-stat">
        <div class="hero-stat-val">{{ number_format($stats['alumni'] ?? 0) }}<span>+</span></div>
        <div class="hero-stat-lbl">Cựu sinh viên</div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-val">{{ number_format($stats['companies'] ?? 0) }}<span>+</span></div>
        <div class="hero-stat-lbl">Doanh nghiệp đối tác</div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-val">{{ number_format($stats['jobs'] ?? 0) }}<span>+</span></div>
        <div class="hero-stat-lbl">Tin tuyển dụng</div>
      </div>
      <div class="hero-stat">
        <div class="hero-stat-val">{{ number_format($stats['events'] ?? 0) }}<span>+</span></div>
        <div class="hero-stat-lbl">Sự kiện đã tổ chức</div>
      </div>
    </div>
  </div>
</div>

<section class="feat-bg">
  <div class="lp">
    <div class="sec-hd">
      <div>
        <span class="sec-tag">Tính năng</span>
        <div class="sec-title">Mọi thứ bạn cần<br>trong một nền tảng</div>
      </div>
    </div>
    <div class="feat-grid">
      <div class="feat-card reveal">
        <div class="feat-ic"><i class="fa-solid fa-handshake"></i></div>
        <div class="feat-title">Mạng lưới chuyên gia</div>
        <div class="feat-desc">Kết nối với cựu sinh viên đang làm việc tại hàng trăm doanh nghiệp trong và ngoài nước.</div>
      </div>
      <div class="feat-card reveal">
        <div class="feat-ic"><i class="fa-solid fa-briefcase"></i></div>
        <div class="feat-title">Cơ hội việc làm</div>
        <div class="feat-desc">Tin tuyển dụng chất lượng cao từ doanh nghiệp đối tác, ưu tiên cựu sinh viên VNUA.</div>
      </div>
      <div class="feat-card reveal">
        <div class="feat-ic"><i class="fa-solid fa-calendar-days"></i></div>
        <div class="feat-title">Sự kiện & Hội thảo</div>
        <div class="feat-desc">Cập nhật lịch hội thảo, workshop, buổi gặp mặt alumni thường xuyên trong và ngoài trường.</div>
      </div>
      <div class="feat-card reveal">
        <div class="feat-ic"><i class="fa-solid fa-pen-to-square"></i></div>
        <div class="feat-title">Chia sẻ bài viết</div>
        <div class="feat-desc">Đăng bài, chia sẻ kinh nghiệm, kiến thức chuyên môn với cộng đồng cựu sinh viên.</div>
      </div>
      <div class="feat-card reveal">
        <div class="feat-ic"><i class="fa-solid fa-building"></i></div>
        <div class="feat-title">Hồ sơ doanh nghiệp</div>
        <div class="feat-desc">Doanh nghiệp đăng tin tuyển dụng, tiếp cận trực tiếp nguồn nhân lực chất lượng từ VNUA.</div>
      </div>
      <div class="feat-card reveal">
        <div class="feat-ic"><i class="fa-solid fa-shield-halved"></i></div>
        <div class="feat-title">Xác minh cựu sinh viên</div>
        <div class="feat-desc">Hệ thống xác minh danh tính, đảm bảo cộng đồng chất lượng và tin cậy.</div>
      </div>
    </div>
  </div>
</section>

<div class="lp-div"></div>

<section class="jobs-bg">
  <div class="lp">
    <div class="sec-hd">
      <div>
        <span class="sec-tag">Tuyển dụng</span>
        <div class="sec-title">Việc làm mới nhất</div>
        <div class="sec-desc">Cơ hội nghề nghiệp từ các doanh nghiệp đối tác, ưu tiên cựu sinh viên VNUA.</div>
      </div>
      <a href="{{ route('job') }}" class="sec-link" wire:navigate>Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="jobs-grid">
      @forelse(($latestJobs ?? collect())->take(6) as $job)
      <a href="{{ route('job.show', $job->id) }}" class="job-card reveal" wire:navigate>
        <div class="job-logo">{{ strtoupper(substr($job->company ?? 'C', 0, 2)) }}</div>
        <div class="job-info">
          <div class="job-title">{{ $job->title }}</div>
          <div class="job-company">{{ $job->company ?? '—' }}</div>
          <div class="job-tags">
            @if($job->type ?? null)
              <span class="jtag jtag-blue">{{ $job->type }}</span>
            @endif
            @if($job->location ?? null)
              <span class="jtag jtag-gray"><i class="fa-solid fa-location-dot"></i> {{ $job->location }}</span>
            @endif
          </div>
        </div>
        @if($job->salary ?? null)
          <div class="job-salary">{{ $job->salary }}</div>
        @endif
      </a>
      @empty
      @foreach([
        ['Lập trình viên Backend','FPT Software','Full-time','Hà Nội','20-30tr'],
        ['Mobile Developer','VNG Corporation','Full-time','TP.HCM','25-35tr'],
        ['Data Analyst','Viettel','Part-time','Hà Nội','15-22tr'],
        ['Frontend Engineer','Shopee','Full-time','TP.HCM','28-40tr'],
      ] as $j)
      <div class="job-card reveal">
        <div class="job-logo">{{ strtoupper(substr($j[1],0,2)) }}</div>
        <div class="job-info">
          <div class="job-title">{{ $j[0] }}</div>
          <div class="job-company">{{ $j[1] }}</div>
          <div class="job-tags">
            <span class="jtag jtag-blue">{{ $j[2] }}</span>
            <span class="jtag jtag-gray"><i class="fa-solid fa-location-dot"></i> {{ $j[3] }}</span>
          </div>
        </div>
        <div class="job-salary">{{ $j[4] }}</div>
      </div>
      @endforeach
      @endforelse
    </div>
  </div>
</section>

<div class="lp-div"></div>

<section class="events-bg">
  <div class="lp">
    <div class="sec-hd">
      <div>
        <span class="sec-tag">Sự kiện</span>
        <div class="sec-title">Sắp diễn ra</div>
        <div class="sec-desc">Tham gia các hội thảo, workshop và buổi gặp mặt alumni.</div>
      </div>
      <a href="{{ route('event') }}" class="sec-link" wire:navigate>Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="events-list">
      @forelse(($upcomingEvents ?? collect())->take(4) as $ev)
      <a href="{{ route('event.show', $ev->id) }}" class="ev-card reveal" wire:navigate>
        <div class="ev-date">
          <div class="ev-day">{{ \Carbon\Carbon::parse($ev->start_date)->format('d') }}</div>
          <div class="ev-month">Th{{ \Carbon\Carbon::parse($ev->start_date)->format('n') }}</div>
        </div>
        <div class="ev-sep"></div>
        <div class="ev-info">
          <div class="ev-title">{{ $ev->title }}</div>
          <div class="ev-meta">
            @if($ev->location ?? null)
              <span><i class="fa-solid fa-location-dot"></i> {{ $ev->location }}</span>
            @endif
            @if($ev->start_date ?? null)
              <span><i class="fa-solid fa-clock"></i> {{ \Carbon\Carbon::parse($ev->start_date)->format('H:i') }}</span>
            @endif
          </div>
        </div>
        <span class="ev-badge ev-badge-blue">Sắp diễn ra</span>
      </a>
      @empty
      @foreach([
        ['Hội thảo Công nghệ AI 2025','15','5','Hội trường A1, VNUA','14:00','blue'],
        ['Gặp mặt Alumni khóa 67','22','5','Khoa CNTT, VNUA','09:00','gold'],
        ['Workshop: DevOps & Cloud','08','6','Online - Zoom','19:00','blue'],
        ['Ngày hội Tuyển dụng VNUA 2025','20','6','Sân vận động VNUA','08:00','gold'],
      ] as $e)
      <div class="ev-card reveal">
        <div class="ev-date">
          <div class="ev-day">{{ $e[1] }}</div>
          <div class="ev-month">Th{{ $e[2] }}</div>
        </div>
        <div class="ev-sep"></div>
        <div class="ev-info">
          <div class="ev-title">{{ $e[0] }}</div>
          <div class="ev-meta">
            <span><i class="fa-solid fa-location-dot"></i> {{ $e[3] }}</span>
            <span><i class="fa-solid fa-clock"></i> {{ $e[4] }}</span>
          </div>
        </div>
        <span class="ev-badge ev-badge-{{ $e[5] }}">Sắp diễn ra</span>
      </div>
      @endforeach
      @endforelse
    </div>
  </div>
</section>

<div class="lp-div"></div>

<section class="posts-bg">
  <div class="lp">
    <div class="sec-hd">
      <div>
        <span class="sec-tag">Cộng đồng</span>
        <div class="sec-title">Bài viết nổi bật</div>
        <div class="sec-desc">Chia sẻ kinh nghiệm, kiến thức từ cộng đồng cựu sinh viên VNUA.</div>
      </div>
      <a href="{{ route('csv') }}" class="sec-link" wire:navigate>Xem tất cả <i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <div class="posts-grid">
      @forelse(($latestPosts ?? collect())->take(3) as $post)
      <a href="{{ route('post') }}" class="post-card reveal" wire:navigate>
        <div class="post-img">
          @if($post->image ?? null)
            <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->title }}">
          @else
            <i class="fa-solid fa-newspaper" style="color:rgba(255,255,255,.3)"></i>
          @endif
        </div>
        <div class="post-body">
          <span class="post-cat">{{ $post->category ?? 'Chia sẻ' }}</span>
          <div class="post-title">{{ $post->title }}</div>
          <div class="post-excerpt">{{ Str::limit(strip_tags($post->content ?? ''), 90) }}</div>
          <div class="post-foot">
            <div class="post-ava">{{ strtoupper(substr($post->author->name ?? 'U', 0, 1)) }}</div>
            <span>{{ $post->author->name ?? 'Alumni' }}</span>
            <span class="post-date">{{ $post->created_at->format('d/m/Y') }}</span>
          </div>
        </div>
      </a>
      @empty
      @foreach([
        ['Kinh nghiệm phỏng vấn tại FPT Software','Chia sẻ những tips hữu ích khi phỏng vấn vào các công ty công nghệ lớn tại Việt Nam và cách chuẩn bị portfolio ấn tượng.','Nguyễn Văn An','12/05/2025'],
        ['Lộ trình học Data Science từ Zero','Hướng dẫn chi tiết lộ trình học Data Science cho người mới bắt đầu, từ Python cơ bản đến Machine Learning thực tế.','Trần Thị Mai','08/05/2025'],
        ['Review môi trường làm việc tại Shopee','Chia sẻ thực tế về môi trường làm việc, văn hóa công ty và cơ hội phát triển tại Shopee Việt Nam sau 2 năm làm việc.','Lê Minh Đức','05/05/2025'],
      ] as $p)
      <div class="post-card reveal">
        <div class="post-img"><i class="fa-solid fa-newspaper" style="color:rgba(255,255,255,.3)"></i></div>
        <div class="post-body">
          <span class="post-cat">Chia sẻ</span>
          <div class="post-title">{{ $p[0] }}</div>
          <div class="post-excerpt">{{ $p[1] }}</div>
          <div class="post-foot">
            <div class="post-ava">{{ strtoupper(substr($p[2],0,1)) }}</div>
            <span>{{ $p[2] }}</span>
            <span class="post-date">{{ $p[3] }}</span>
          </div>
        </div>
      </div>
      @endforeach
      @endforelse
    </div>
  </div>
</section>

<div class="lp-div"></div>

<section class="steps-bg">
  <div class="lp">
    <div class="sec-hd">
      <div>
        <span class="sec-tag">Bắt đầu</span>
        <div class="sec-title">Chỉ 3 bước để tham gia</div>
      </div>
    </div>
    <div class="steps-grid">
      <div class="step-item reveal">
        <div class="step-num">1</div>
        <div class="step-title">Đăng ký tài khoản</div>
        <div class="step-desc">Tạo tài khoản miễn phí bằng email cá nhân. Chỉ mất 2 phút để hoàn thành.</div>
      </div>
      <div class="step-item reveal">
        <div class="step-num">2</div>
        <div class="step-title">Xác minh & Hoàn thiện hồ sơ</div>
        <div class="step-desc">Xác minh là cựu sinh viên VNUA, cập nhật thông tin học vấn và kinh nghiệm làm việc.</div>
      </div>
      <div class="step-item reveal">
        <div class="step-num">3</div>
        <div class="step-title">Kết nối & Khám phá</div>
        <div class="step-desc">Tìm kiếm việc làm, tham gia sự kiện và kết nối với cộng đồng hàng nghìn alumni.</div>
      </div>
    </div>
  </div>
</section>

<section class="cta-bg">
  <div class="lp">
    <div class="cta-box">
      <h2>Sẵn sàng tham gia<br><em>cộng đồng alumni?</em></h2>
      <p>Đăng ký miễn phí — kết nối ngay với hàng nghìn cựu sinh viên VNUA.</p>
      <div class="cta-btns">
        <a href="{{ route('register') }}" class="btn-hero-w" wire:navigate>
          <i class="fa-solid fa-user-plus"></i> Đăng ký ngay
        </a>
        <a href="{{ route('login') }}" class="btn-hero-o" wire:navigate>
          Đã có tài khoản <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
</section>

<script>
const obs = new IntersectionObserver(
  els => els.forEach(e => e.isIntersecting && e.target.classList.add('visible')),
  {threshold:.12}
);
document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
</script>
</div>