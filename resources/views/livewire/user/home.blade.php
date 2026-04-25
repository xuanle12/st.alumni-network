
<div>
  @php
  use Illuminate\Support\Str;
  @endphp
  <style>
    
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --green:       #1a6b3a;
  --green-light: #2d8a50;
  --green-pale:  #e8f5ee;
  --gold:        #c8912a;
  --gold-light:  #f0c050;
  --text:        #1a1f2e;
  --text-muted:  #5c6470;
  --border:      #e2e8f0;
  --bg:          #ffffff;
  --bg2:         #f8faf9;
  --radius:      12px;
  --shadow-sm:   0 2px 8px rgba(0,0,0,0.06);
  --shadow-md:   0 6px 24px rgba(0,0,0,0.08);
}

html, body {
  font-family: 'Be Vietnam Pro', sans-serif;
  background: var(--bg);
  color: var(--text);
  scroll-behavior: smooth;
}

/* ── UTILITIES ──────────────────────────── */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 24px;
}

/* ── BUTTONS ────────────────────────────── */
.btn {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 8px 18px;
  border-radius: 8px;
  font-family: inherit;
  font-size: 13.5px;
  font-weight: 600;
  cursor: pointer;
  text-decoration: none;
  border: 1px solid transparent;
  transition: .15s;
  white-space: nowrap;
}
.btn-ghost {
  background: transparent;
  color: var(--text-muted);
  border-color: var(--border);
}
.btn-ghost:hover { background: #f1f5f2; color: var(--text); }
.btn-primary { background: var(--green); color: #fff; }
.btn-primary:hover {
  background: var(--green-light);
  transform: translateY(-1px);
  box-shadow: 0 4px 14px rgba(26,107,58,0.25);
}

.btn-hero {
  padding: 12px 26px;
  border-radius: 9px;
  font-family: inherit;
  font-size: 14px;
  font-weight: 700;
  cursor: pointer;
  text-decoration: none;
  border: none;
  transition: .2s;
  white-space: nowrap;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}
.btn-hero-primary { background: var(--gold); color: #fff; }
.btn-hero-primary:hover {
  background: #d4a040;
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(200,145,42,0.4);
}
.btn-hero-outline {
  background: transparent;
  color: #fff;
  border: 2px solid rgba(255,255,255,0.35);
}
.btn-hero-outline:hover {
  background: rgba(255,255,255,0.1);
  border-color: rgba(255,255,255,0.6);
}
/* ── MENU ICON BTN ──────────────────────── */
.menu-icon-btn {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 5px;
  width: 38px;
  height: 38px;
  border: 1px solid var(--border);
  border-radius: 9px;
  background: transparent;
  cursor: pointer;
  flex-shrink: 0;
  transition: .15s;
}
.menu-icon-btn:hover { background: var(--green-pale); border-color: #b0d4bc; }
.menu-icon-btn span {
  display: block;
  height: 2px;
  border-radius: 2px;
  background: var(--text);
  transition: .25s;
}
.menu-icon-btn span:nth-child(1) { width: 18px; }
.menu-icon-btn span:nth-child(2) { width: 13px; }
.menu-icon-btn span:nth-child(3) { width: 18px; }
.menu-icon-btn.open span:nth-child(1) { width: 18px; transform: translateY(7px) rotate(45deg); }
.menu-icon-btn.open span:nth-child(2) { opacity: 0; }
.menu-icon-btn.open span:nth-child(3) { width: 18px; transform: translateY(-7px) rotate(-45deg); }

/* ── SIDEBAR OVERLAY ────────────────────── */
.sidebar-overlay {
  position: fixed;
  inset: 0;
  background: rgba(15, 34, 24, 0.45);
  backdrop-filter: blur(3px);
  z-index: 298;
  opacity: 0;
  pointer-events: none;
  transition: opacity .3s ease;
}
.sidebar-overlay.open { opacity: 1; pointer-events: all; }

/* ── SIDEBAR DRAWER ─────────────────────── */
.sidebar-drawer {
  position: fixed;
  top: 0; right: 0;
  width: 320px;
  height: 100dvh;
  background: #fff;
  z-index: 299;
  display: flex;
  flex-direction: column;
  transform: translateX(100%);
  transition: transform .35s cubic-bezier(0.4, 0, 0.2, 1);
  box-shadow: -8px 0 40px rgba(0,0,0,0.12);
}
.sidebar-drawer.open { transform: translateX(0); }

.sidebar-drawer-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 22px;
  border-bottom: 1px solid var(--border);
  flex-shrink: 0;
}
.sidebar-drawer-logo {
  display: flex;
  align-items: center;
  gap: 9px;
  text-decoration: none;
}
.sidebar-drawer-logo img { height: 30px; width: auto; }
.sidebar-drawer-logo span { font-size: 13px; font-weight: 700; color: var(--green); }

.sidebar-close {
  width: 32px; height: 32px;
  border-radius: 8px;
  border: 1px solid var(--border);
  background: transparent;
  cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  color: var(--text-muted);
  font-size: 18px;
  transition: .15s;
  line-height: 1;
}
.sidebar-close:hover { background: #fee2e2; border-color: #fca5a5; color: #dc2626; }

.sidebar-drawer-body {
  flex: 1;
  overflow-y: auto;
  padding: 16px 14px;
}

.sidebar-nav-label {
  font-size: 10.5px;
  font-weight: 700;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  color: #9ca3af;
  padding: 0 10px;
  margin: 16px 0 6px;
}
.sidebar-nav-label:first-child { margin-top: 4px; }

.sidebar-nav-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 10px 12px;
  border-radius: 9px;
  font-size: 14px;
  font-weight: 500;
  color: var(--text-muted);
  text-decoration: none;
  transition: .15s;
}
.sidebar-nav-item:hover { background: var(--green-pale); color: var(--green); }
.sidebar-nav-item.active { background: var(--green-pale); color: var(--green); font-weight: 600; }
.sidebar-nav-item .nav-icon {
  width: 34px; height: 34px;
  border-radius: 9px;
  background: #f3f4f6;
  display: flex; align-items: center; justify-content: center;
  font-size: 16px;
  flex-shrink: 0;
  transition: .15s;
}
.sidebar-nav-item:hover .nav-icon,
.sidebar-nav-item.active .nav-icon { background: rgba(26,107,58,0.12); }

.sidebar-divider { height: 1px; background: var(--border); margin: 10px 0; }

.sidebar-drawer-footer {
  padding: 16px 14px 24px;
  border-top: 1px solid var(--border);
  display: flex;
  flex-direction: column;
  gap: 8px;
  flex-shrink: 0;
}
.sidebar-drawer-footer .btn { justify-content: center; }

/* menu icon — ẩn trên desktop, hiện trên mobile */
.menu-icon-btn { display: none; }

/* old hamburger */
.hamburger { display: none; }

/* ── HERO ───────────────────────────────── */
.hero {
  background: linear-gradient(135deg, #0f3d22 0%, #1a6b3a 50%, #1e7a43 100%);
  position: relative;
  overflow: hidden;
  padding: 90px 24px 80px;
}
.hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='30' cy='30' r='20'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.hero-inner {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 420px;
  gap: 60px;
  align-items: center;
  position: relative;
}

.hero-tag {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.2);
  border-radius: 100px;
  padding: 5px 14px 5px 10px;
  font-size: 12.5px;
  color: rgba(255,255,255,0.85);
  margin-bottom: 22px;
}
.hero-tag span {
  width: 6px; height: 6px;
  border-radius: 50%;
  background: var(--gold-light);
  animation: blink 2s infinite;
  flex-shrink: 0;
}

@keyframes blink { 0%,100%{opacity:1} 50%{opacity:.3} }

.hero h1 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(32px, 4vw, 52px);
  font-weight: 800;
  color: #fff;
  line-height: 1.15;
  letter-spacing: -1px;
  margin-bottom: 20px;
}
.hero h1 em { color: var(--gold-light); font-style: normal; }
.hero p {
  font-size: 15.5px;
  color: rgba(255,255,255,0.75);
  line-height: 1.75;
  max-width: 480px;
  margin-bottom: 34px;
}
.hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }

/* Hero card */
.hero-card {
  background: rgba(255,255,255,0.08);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255,255,255,0.15);
  border-radius: 20px;
  padding: 32px;
}
.hero-card-title {
  font-size: 13px;
  font-weight: 600;
  color: rgba(255,255,255,0.5);
  letter-spacing: 0.8px;
  text-transform: uppercase;
  margin-bottom: 22px;
}
.stats-grid-hero {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}
.stat-item { text-align: center; }
.stat-num {
  font-family: 'Playfair Display', serif;
  font-size: 34px;
  font-weight: 700;
  color: #fff;
  line-height: 1;
  margin-bottom: 5px;
}
.stat-num span { font-size: 20px; color: var(--gold-light); }
.stat-label { font-size: 12px; color: rgba(255,255,255,0.55); }
.stat-divider {
  grid-column: 1/-1;
  height: 1px;
  background: rgba(255,255,255,0.1);
}
.hero-card-sso {
  margin-top: 22px;
  padding-top: 20px;
  border-top: 1px solid rgba(255,255,255,0.1);
  display: flex;
  align-items: center;
  gap: 10px;
}
.sso-badge {
  display: flex;
  align-items: center;
  gap: 6px;
  background: rgba(200,145,42,0.2);
  border: 1px solid rgba(200,145,42,0.3);
  border-radius: 6px;
  padding: 5px 10px;
  font-size: 11.5px;
  font-weight: 600;
  color: var(--gold-light);
  flex-shrink: 0;
}
.hero-card-sso p { font-size: 12px; color: rgba(255,255,255,0.5); line-height: 1.4; }

/* ── SECTIONS ───────────────────────────── */
section { padding: 72px 24px; }
.section-inner { max-width: 1200px; margin: 0 auto; }

.section-tag {
  display: inline-block;
  font-size: 11.5px;
  font-weight: 700;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  color: var(--green);
  margin-bottom: 10px;
}
.section-title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(24px, 3vw, 36px);
  font-weight: 700;
  color: var(--text);
  line-height: 1.25;
  letter-spacing: -0.5px;
  margin-bottom: 14px;
}
.section-desc {
  font-size: 15px;
  color: var(--text-muted);
  line-height: 1.75;
  max-width: 560px;
}
.section-header {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  margin-bottom: 32px;
  gap: 16px;
}

/* ── FEATURES ───────────────────────────── */
.features-bg { background: var(--bg2); }
.features-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-top: 48px;
}
.feature-card {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 28px 26px;
  transition: .2s;
}
.feature-card:hover {
  border-color: #b0d4bc;
  transform: translateY(-3px);
  box-shadow: 0 8px 30px rgba(26,107,58,0.08);
}
.feature-icon {
  width: 46px; height: 46px;
  border-radius: 12px;
  display: flex; align-items: center; justify-content: center;
  font-size: 22px;
  margin-bottom: 18px;
}
.ic-green { background: var(--green-pale); }
.ic-gold  { background: #fdf3e0; }
.ic-blue  { background: #e8f0fe; }
.feature-card h3 { font-size: 15.5px; font-weight: 700; color: var(--text); margin-bottom: 8px; }
.feature-card p  { font-size: 13.5px; color: var(--text-muted); line-height: 1.7; }

/* ── JOBS ───────────────────────────────── */
.jobs-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 16px;
}
.job-card {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 22px 24px;
  display: flex;
  gap: 16px;
  align-items: flex-start;
  transition: .2s;
  cursor: pointer;
}
.job-card:hover {
  border-color: #b0d4bc;
  box-shadow: 0 4px 20px rgba(26,107,58,0.07);
  transform: translateY(-2px);
}
.job-logo {
  width: 44px; height: 44px;
  border-radius: 10px;
  background: var(--green-pale);
  flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
  font-size: 18px;
}
.job-info  { flex: 1; min-width: 0; }
.job-title { font-size: 14.5px; font-weight: 700; color: var(--text); margin-bottom: 4px; }
.job-company { font-size: 13px; color: var(--text-muted); margin-bottom: 10px; }
.job-tags { display: flex; gap: 6px; flex-wrap: wrap; }
.tag { padding: 3px 9px; border-radius: 100px; font-size: 11.5px; font-weight: 500; }
.tag-green { background: var(--green-pale); color: var(--green); }
.tag-gold  { background: #fdf3e0; color: var(--gold); }
.tag-gray  { background: #f1f5f9; color: #64748b; }
.job-salary {
  font-size: 13px; font-weight: 700;
  color: var(--green);
  white-space: nowrap;
  flex-shrink: 0;
  margin-top: 2px;
}

.alumni-bg { background: var(--bg2); }
.alumni-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-top: 48px;
}
.alumni-card {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 26px;
  text-align: center;
  transition: .2s;
}
.alumni-card:hover {
  border-color: #b0d4bc;
  box-shadow: 0 6px 24px rgba(26,107,58,0.08);
  transform: translateY(-3px);
}
.alumni-avatar {
  width: 68px; height: 68px;
  border-radius: 50%;
  margin: 0 auto 14px;
  display: flex; align-items: center; justify-content: center;
  font-size: 24px; font-weight: 700; color: #fff;
}
.av1 { background: linear-gradient(135deg, #1a6b3a, #2d8a50); }
.av2 { background: linear-gradient(135deg, #c8912a, #e0b040); }
.av3 { background: linear-gradient(135deg, #2563eb, #60a5fa); }
.alumni-name    { font-size: 15px; font-weight: 700; color: var(--text); margin-bottom: 4px; }
.alumni-class   { font-size: 12px; color: var(--text-muted); margin-bottom: 10px; }
.alumni-company {
  display: inline-flex; align-items: center; gap: 5px;
  background: var(--green-pale);
  border-radius: 100px;
  padding: 4px 12px;
  font-size: 12px; font-weight: 600; color: var(--green);
}

/* ── EVENTS ─────────────────────────────── */
.events-list { display: flex; flex-direction: column; gap: 14px; margin-top: 36px; }
.event-item {
  display: flex;
  align-items: center;
  gap: 20px;
  background: #fff;
  border: 1px solid var(--border);
  border-radius: var(--radius);
  padding: 18px 22px;
  transition: .15s;
  cursor: pointer;
}
.event-item:hover {
  border-color: #b0d4bc;
  box-shadow: 0 3px 14px rgba(26,107,58,0.06);
}
.event-date { text-align: center; flex-shrink: 0; width: 50px; }
.event-date .day {
  font-family: 'Playfair Display', serif;
  font-size: 26px; font-weight: 700;
  color: var(--green); line-height: 1;
}
.event-date .month {
  font-size: 11px; font-weight: 600;
  color: var(--text-muted);
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.event-div { width: 1px; height: 40px; background: var(--border); flex-shrink: 0; }
.event-info { flex: 1; min-width: 0; }
.event-info h4 { font-size: 14.5px; font-weight: 700; color: var(--text); margin-bottom: 5px; }
.event-meta { display: flex; gap: 14px; flex-wrap: wrap; }
.event-meta span {
  font-size: 12.5px; color: var(--text-muted);
  display: flex; align-items: center; gap: 4px;
}
.event-badge {
  padding: 4px 12px; border-radius: 100px;
  font-size: 11.5px; font-weight: 600;
  flex-shrink: 0;
}
.eb-green { background: var(--green-pale); color: var(--green); }
.eb-gold  { background: #fdf3e0; color: var(--gold); }

/* ── CTA ────────────────────────────────── */
.cta {
  background: linear-gradient(135deg, #0f3d22, #1a6b3a);
  padding: 80px 24px;
  text-align: center;
}
.cta h2 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(26px, 3.5vw, 44px);
  font-weight: 800; color: #fff;
  margin-bottom: 16px; letter-spacing: -0.5px;
}
.cta h2 em { color: var(--gold-light); font-style: normal; }
.cta p { font-size: 15px; color: rgba(255,255,255,0.7); margin-bottom: 34px; }
.cta-actions { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }


  </style>
  <section class="hero">
  <div class="hero-inner">
    <div class="fade-up">
      <h1>Kết nối <em>cựu sinh viên</em><br>— Mở rộng tương lai</h1>
      <p>Nền tảng tập trung giúp kết nối sinh viên, cựu sinh viên và doanh nghiệp. Đăng nhập một lần — truy cập toàn bộ hệ sinh thái số của Học viện.</p>
      <div class="hero-actions">
        <a href="#" class="btn-hero btn-hero-primary"> Tham gia ngay</a>
        <a href="#" class="btn-hero btn-hero-outline">Xem tuyển dụng →</a>
      </div>
    </div>

    <div class="hero-card fade-up delay-2">
      <div class="hero-card-title">Tổng quan hệ thống</div>
      <div class="stats-grid-hero">
        <div class="stat-item">
          <div class="stat-num">{{ number_format($stats['alumni'] ?? 0) }}<span>+</span></div>
          <div class="stat-label">Cựu sinh viên</div>
        </div>
        <div class="stat-item">
          <div class="stat-num">{{ number_format($stats['companies'] ?? 0) }}<span>+</span></div>
          <div class="stat-label">Doanh nghiệp</div>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
          <div class="stat-num">{{ number_format($stats['jobs'] ?? 0) }}<span>+</span></div>
          <div class="stat-label">Tin tuyển dụng</div>
        </div>
        <div class="stat-item">
          <div class="stat-num">{{ number_format($stats['events'] ?? 0) }}<span>+</span></div>
          <div class="stat-label">Sự kiện / năm</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section class="features-bg">
  <div class="section-inner">
    <div class="section-tag">Tính năng</div>
    <h2 class="section-title">Đầy đủ công cụ cho<br>mọi đối tượng người dùng</h2>
    <p class="section-desc">
      Từ sinh viên, cựu sinh viên cho đến doanh nghiệp — tất cả đều có không gian riêng trên một nền tảng thống nhất.
    </p>

    <div class="features-grid">
      @foreach([
        ['ic-green','fa-solid fa-users','Quản lý hồ sơ cựu sinh viên','Lưu trữ tập trung thông tin cựu sinh viên theo khóa, ngành. Tra cứu và lọc nhanh theo nhiều tiêu chí.'],
        ['ic-gold','fa-solid fa-briefcase','Cổng tuyển dụng nội bộ','Doanh nghiệp đăng tin, sinh viên và cựu sinh viên tìm việc — tất cả ngay trên hệ thống của Học viện.'],
        ['ic-green','fa-solid fa-shield-halved','Đăng nhập một lần (SSO)','Tích hợp SSO giúp người dùng chỉ cần một tài khoản để truy cập toàn bộ dịch vụ số của Học viện.'],
        ['ic-blue','fa-solid fa-calendar-days','Sự kiện & Diễn đàn','Quản lý và thông báo sự kiện kết nối, hội thảo, gặp mặt cựu sinh viên theo khoa và toàn trường.'],
        ['ic-gold','fa-solid fa-chart-column','Thống kê & Báo cáo','Dashboard admin với báo cáo trực quan về tình trạng việc làm, phân bố cựu sinh viên theo khu vực.'],
        ['ic-green','fa-solid fa-bell','Thông báo realtime','Nhận thông báo ngay khi có tin tuyển dụng mới, sự kiện sắp diễn ra hoặc cập nhật từ mạng lưới.'],
      ] as [$cls, $icon, $title, $desc])
        <div class="feature-card">
          <div class="feature-icon {{ $cls }}">
            <i class="{{ $icon }}"></i>
          </div>
          <h3>{{ $title }}</h3>
          <p>{{ $desc }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- JOBS -->
<section>
  <div class="section-inner">
    <div class="jobs-header">
      <div>
        <div class="section-tag">Tuyển dụng</div>
        <h2 class="section-title">Cơ hội việc làm mới nhất</h2>
      </div>
      <a href="#" class="btn btn-ghost">Xem tất cả →</a>
    </div>
    <div class="jobs-grid">
      @forelse($latestJobs as $job)
      <div class="job-card">
        <div class="job-logo">{{ $job->logo_emoji }}</div>
        <div class="job-info">
          <div class="job-title">{{ $job->title }}</div>
          <div class="job-company">{{ $job->company }} — {{ $job->location }}</div>
          <div class="job-tags">
            <span class="tag {{ $job->type_class }}">{{ $job->type_label }}</span>
            @if($job->field)
              <span class="tag tag-gray">{{ $job->field }}</span>
            @endif
          </div>
        </div>
        <div class="job-salary">{{ $job->salary }}</div>
      </div>
      @empty
        <p>Chưa có tin tuyển dụng.</p>
      @endforelse
    </div>
  </div>
</section>


<section class="alumni-bg">
  <div class="section-inner">
    <div class="section-tag">Cựu sinh viên tiêu biểu</div>
    <h2 class="section-title">Những gương mặt thành công</h2>
    <p class="section-desc">Hàng nghìn cựu sinh viên VNUA đang đóng góp tích cực cho xã hội ở nhiều lĩnh vực khác nhau.</p>
    <div class="alumni-grid">
      @forelse($spotlightAlumni as $index => $alumni)
      <div class="alumni-card">
        <div class="alumni-avatar av{{ ($index % 3) + 1 }}">
          {{ strtoupper(substr($alumni->user->name ?? 'NA', 0, 3)) }}
        </div>
        <div class="alumni-name">{{ $alumni->user->name ?? 'Cựu sinh viên' }}</div>
        <div class="alumni-class">{{ $alumni->lop }} · {{ $alumni->nganh ?? $alumni->khoa }}</div>
        <div class="alumni-company"><i class="fa-solid fa-briefcase"></i>{{ Str::limit($alumni->bio, 40) }}</div>
      </div>
      @empty
        <p>Chưa có dữ liệu.</p>
      @endforelse
    </div>
  </div>
</section>

<!-- EVENTS -->
<section>
  <div class="section-inner">
    <div class="jobs-header">
      <div>
        <div class="section-tag">Sự kiện</div>
        <h2 class="section-title">Sắp diễn ra</h2>
      </div>
      <a href="#" class="btn btn-ghost">Xem tất cả →</a>
    </div>
    <div class="events-list">
      @forelse($upcomingEvents as $event)
      <div class="event-item">
        <div class="event-date">
          <div class="day">{{ $event->event_date->format('d') }}</div>
          <div class="month">Tháng {{ $event->event_date->format('n') }}</div>
        </div>
        <div class="event-div"></div>
        <div class="event-info">
          <h4>{{ $event->title }}</h4>
          <div class="event-meta">
            <span><i class="fa-solid fa-location-dot"></i> {{ $event->location }}</span>
            @if($event->time_range)
              <span><i class="fa-solid fa-clock"></i>{{ $event->time_range }}</span>
            @endif
          </div>
        </div>
        <span class="event-badge {{ $event->badge_class }}">{{ $event->badge_label }}</span>
      </div>
      @empty
        <p>Chưa có sự kiện sắp tới.</p>
      @endforelse
    </div>
  </div>
</section>
<section class="cta">
  <h2>Sẵn sàng tham gia<br><em>mạng lưới</em> của chúng tôi?</h2>
  <p>Đăng ký ngay hôm nay để kết nối với hơn {{ number_format($stats['alumni']) }} cựu sinh viên và hàng trăm doanh nghiệp đối tác.</p>
  <div class="cta-actions">
    <a href="#" class="btn-hero btn-hero-primary"> Đăng ký tài khoản</a>
    <a href="#" class="btn-hero btn-hero-outline">Tìm hiểu thêm</a>
  </div>
</section>
</div>