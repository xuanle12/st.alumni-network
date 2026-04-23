<div>
@php
use Illuminate\Support\Str;
@endphp
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

<!-- ALUMNI SPOTLIGHT -->
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

<!-- CTA -->
<section class="cta">
  <h2>Sẵn sàng tham gia<br><em>mạng lưới</em> của chúng tôi?</h2>
  <p>Đăng ký ngay hôm nay để kết nối với hơn {{ number_format($stats['alumni']) }} cựu sinh viên và hàng trăm doanh nghiệp đối tác.</p>
  <div class="cta-actions">
    <a href="#" class="btn-hero btn-hero-primary"> Đăng ký tài khoản</a>
    <a href="#" class="btn-hero btn-hero-outline">Tìm hiểu thêm</a>
  </div>
</section>
</div>