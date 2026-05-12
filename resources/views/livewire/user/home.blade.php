
<div>
  @php
  use Illuminate\Support\Str;
  @endphp
  <style>
    
:root {
  --primary:       #0f4c81;
  --primary-light: #1d6fb8;
  --primary-pale:  #e8f2fb;

  --secondary:     #2563eb;
  --secondary-light:#60a5fa;

  --text:          #1a1f2e;
  --text-muted:    #5c6470;

  --border:        #dbe7f3;

  --bg:            #ffffff;
  --bg-soft:       #f5f9fd;

  --radius:        12px;

  --shadow-sm:     0 2px 8px rgba(15,76,129,0.06);
  --shadow-md:     0 6px 24px rgba(15,76,129,0.12);
}

/* RESET */
*, *::before, *::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html, body {
  font-family: 'Be Vietnam Pro', sans-serif;
  background: var(--bg);
  color: var(--text);
  scroll-behavior: smooth;
}

/* CONTAINER */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 24px;
}

/* BUTTON */
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
  transition: .2s;
  white-space: nowrap;
}

.btn-ghost {
  background: transparent;
  color: var(--text-muted);
  border-color: var(--border);
}

.btn-ghost:hover {
  background: var(--primary-pale);
  color: var(--primary);
}

.btn-primary {
  background: var(--primary);
  color: #fff;
}

.btn-primary:hover {
  background: var(--primary-light);
  transform: translateY(-1px);
  box-shadow: 0 6px 18px rgba(15,76,129,.25);
}

/* HERO BUTTON */
.btn-hero {
  padding: 12px 26px;
  border-radius: 10px;
  font-size: 14px;
  font-weight: 700;
  border: none;
  transition: .2s;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.btn-hero-primary {
  background: var(--secondary);
  color: #fff;
}

.btn-hero-primary:hover {
  background: var(--secondary-light);
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(37,99,235,.3);
}

.btn-hero-outline {
  background: transparent;
  border: 2px solid rgba(255,255,255,.25);
  color: #fff;
}

.btn-hero-outline:hover {
  background: rgba(255,255,255,.08);
  border-color: rgba(255,255,255,.45);
}

/* HERO */
.hero {
  background: linear-gradient(
    135deg,
    #08263d 0%,
    #0f4c81 50%,
    #1d6fb8 100%
  );
  position: relative;
  overflow: hidden;
  padding: 90px 24px 80px;
}

.hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background:
    radial-gradient(circle at top right,
    rgba(255,255,255,.08),
    transparent 40%);
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

.hero h1 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(34px, 4vw, 54px);
  font-weight: 800;
  line-height: 1.15;
  letter-spacing: -1px;
  color: #fff;
  margin-bottom: 20px;
}

.hero h1 em {
  color: #93c5fd;
  font-style: normal;
}

.hero p {
  font-size: 15px;
  line-height: 1.8;
  color: rgba(255,255,255,.78);
  max-width: 520px;
  margin-bottom: 34px;
}

.hero-actions {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}

/* HERO CARD */
.hero-card {
  background: rgba(255,255,255,.08);
  border: 1px solid rgba(255,255,255,.12);
  backdrop-filter: blur(18px);
  border-radius: 22px;
  padding: 32px;
  box-shadow: 0 10px 30px rgba(0,0,0,.15);
}

.hero-card-title {
  font-size: 12px;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: rgba(255,255,255,.6);
  margin-bottom: 24px;
}

.stats-grid-hero {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 18px;
}

.stat-item {
  text-align: center;
}

.stat-num {
  font-size: 34px;
  font-weight: 800;
  color: #fff;
}

.stat-num span {
  color: #93c5fd;
}

.stat-label {
  font-size: 12px;
  color: rgba(255,255,255,.65);
}

.stat-divider {
  grid-column: 1/-1;
  height: 1px;
  background: rgba(255,255,255,.12);
}

/* SECTION */
section {
  padding: 72px 24px;
}

.section-inner {
  max-width: 1200px;
  margin: 0 auto;
}

.section-tag {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  color: var(--primary);
  margin-bottom: 10px;
}

.section-title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(24px,3vw,38px);
  font-weight: 700;
  line-height: 1.25;
  letter-spacing: -.5px;
  margin-bottom: 14px;
}

.section-desc {
  font-size: 15px;
  line-height: 1.8;
  color: var(--text-muted);
  max-width: 620px;
}

/* FEATURES */
.features-bg {
  background: var(--bg-soft);
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(3,1fr);
  gap: 20px;
  margin-top: 48px;
}

.feature-card {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 28px 24px;
  transition: .25s;
}

.feature-card:hover {
  transform: translateY(-4px);
  border-color: #93c5fd;
  box-shadow: var(--shadow-md);
}

.feature-icon {
  width: 50px;
  height: 50px;
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 18px;
  font-size: 22px;
}

.ic-green,
.ic-gold,
.ic-blue {
  background: var(--primary-pale);
  color: var(--primary);
}

.feature-card h3 {
  font-size: 16px;
  font-weight: 700;
  margin-bottom: 8px;
}

.feature-card p {
  font-size: 13.5px;
  line-height: 1.7;
  color: var(--text-muted);
}

/* JOBS */
.jobs-grid {
  display: grid;
  grid-template-columns: repeat(2,1fr);
  gap: 18px;
}

.job-card {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 22px;
  display: flex;
  gap: 16px;
  transition: .2s;
}

.job-card:hover {
  transform: translateY(-3px);
  border-color: #93c5fd;
  box-shadow: var(--shadow-sm);
}

.job-logo {
  width: 46px;
  height: 46px;
  border-radius: 12px;
  background: var(--primary-pale);
  color: var(--primary);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  font-size: 18px;
}

.job-title {
  font-size: 15px;
  font-weight: 700;
  margin-bottom: 4px;
}

.job-company {
  font-size: 13px;
  color: var(--text-muted);
  margin-bottom: 10px;
}

.job-tags {
  display: flex;
  gap: 6px;
  flex-wrap: wrap;
}

.tag {
  padding: 4px 10px;
  border-radius: 999px;
  font-size: 11px;
  font-weight: 600;
}

.tag-green {
  background: #dbeafe;
  color: #1d4ed8;
}

.tag-gold {
  background: #e0f2fe;
  color: #0369a1;
}

.tag-gray {
  background: #f1f5f9;
  color: #64748b;
}

.job-salary {
  font-size: 13px;
  font-weight: 700;
  color: var(--primary);
  margin-left: auto;
  white-space: nowrap;
}

/* ALUMNI */
.alumni-bg {
  background: var(--bg-soft);
}

.alumni-grid {
  display: grid;
  grid-template-columns: repeat(3,1fr);
  gap: 20px;
  margin-top: 48px;
}

.alumni-card {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 16px;
  padding: 26px;
  text-align: center;
  transition: .2s;
}

.alumni-card:hover {
  transform: translateY(-4px);
  border-color: #93c5fd;
  box-shadow: var(--shadow-md);
}

.alumni-avatar {
  width: 70px;
  height: 70px;
  border-radius: 50%;
  margin: 0 auto 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  font-weight: 700;
}

.av1 {
  background: linear-gradient(135deg,#0f4c81,#1d6fb8);
}

.av2 {
  background: linear-gradient(135deg,#2563eb,#60a5fa);
}

.av3 {
  background: linear-gradient(135deg,#0284c7,#38bdf8);
}

/* EVENTS */
.events-list {
  display: flex;
  flex-direction: column;
  gap: 14px;
  margin-top: 36px;
}

.event-item {
  background: #fff;
  border: 1px solid var(--border);
  border-radius: 14px;
  padding: 18px 22px;
  display: flex;
  align-items: center;
  gap: 20px;
  transition: .2s;
}

.event-item:hover {
  border-color: #93c5fd;
  box-shadow: var(--shadow-sm);
}

.event-date .day {
  font-size: 28px;
  font-weight: 800;
  color: var(--primary);
}

.event-date .month {
  font-size: 11px;
  color: var(--text-muted);
}

.event-badge {
  padding: 4px 12px;
  border-radius: 999px;
  font-size: 11px;
  font-weight: 700;
}

.eb-green {
  background: #dbeafe;
  color: #1d4ed8;
}

.eb-gold {
  background: #e0f2fe;
  color: #0369a1;
}

/* CTA */
.cta {
  background: linear-gradient(
    135deg,
    #08263d,
    #0f4c81
  );
  padding: 82px 24px;
  text-align: center;
}

.cta h2 {
  font-size: clamp(28px,4vw,46px);
  color: #fff;
  font-weight: 800;
  margin-bottom: 16px;
}

.cta h2 em {
  color: #93c5fd;
  font-style: normal;
}

.cta p {
  color: rgba(255,255,255,.72);
  margin-bottom: 34px;
}

/* RESPONSIVE */
@media (max-width: 1024px) {

  .hero-inner {
    grid-template-columns: 1fr;
  }

  .features-grid,
  .alumni-grid {
    grid-template-columns: repeat(2,1fr);
  }
}

@media (max-width: 768px) {

  .hero {
    padding: 54px 16px 48px;
  }

  section {
    padding: 52px 16px;
  }

  .hero h1 {
    font-size: 30px;
  }

  .features-grid,
  .jobs-grid,
  .alumni-grid {
    grid-template-columns: 1fr;
  }

  .hero-actions,
  .cta-actions {
    flex-direction: column;
  }

  .btn-hero {
    width: 100%;
    justify-content: center;
  }

  .event-item {
    flex-wrap: wrap;
  }
}

@media (max-width: 480px) {

  .hero h1 {
    font-size: 24px;
  }

  .hero-card {
    padding: 22px 18px;
  }

  .stat-num {
    font-size: 24px;
  }

  .section-title {
    font-size: 22px;
  }
}

  </style>
  <section class="hero">
  <div class="hero-inner">
    <div class="fade-up">
      <h1>Kết nối <em>cựu sinh viên</em><br>— Mở rộng tương lai</h1>
      <p>Nền tảng tập trung giúp kết nối sinh viên, cựu sinh viên và doanh nghiệp. Đăng nhập một lần — truy cập toàn bộ hệ sinh thái số của Học viện.</p>
      <div class="hero-actions">
        @auth
          <a href="{{ route('csv') }}" class="btn-hero btn-hero-primary" wire:navigate>Vào trang chủ</a>
          <a href="{{ route('job') }}" class="btn-hero btn-hero-outline" wire:navigate>Xem tuyển dụng →</a>
        @else
          <a href="{{ route('register') }}" class="btn-hero btn-hero-primary" wire:navigate>Tham gia ngay</a>
          <a href="{{ route('login') }}" class="btn-hero btn-hero-outline" wire:navigate>Đăng nhập →</a>
        @endauth
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
      <a href="{{ route('job') }}" class="btn btn-ghost" wire:navigate>Xem tất cả →</a>
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
        <p class="empty-note">Chưa có tin tuyển dụng. Quay lại sau bạn nhé!</p>
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
        <p class="empty-note">Chưa có dữ liệu cựu sinh viên.</p>
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
      <a href="{{ route('event') }}" class="btn btn-ghost" wire:navigate>Xem tất cả →</a>
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
        <p class="empty-note">Chưa có sự kiện sắp tới.</p>
      @endforelse
    </div>
  </div>
</section>
<section class="cta">
  <h2>Sẵn sàng tham gia<br><em>mạng lưới</em> của chúng tôi?</h2>
  <p>Đăng ký ngay hôm nay để kết nối với hơn {{ number_format($stats['alumni']) }} cựu sinh viên và hàng trăm doanh nghiệp đối tác.</p>
  <div class="cta-actions">
    <a href="{{ route('register') }}" class="btn-hero btn-hero-primary" wire:navigate>Đăng ký tài khoản</a>
    <a href="{{ route('login') }}" class="btn-hero btn-hero-outline" wire:navigate>Đăng nhập</a>
  </div>
</section>
</div>