<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Alumni Network' }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
  @livewireStyles
 </head>
<body>

<!-- ── HEADER ── -->
<header>
  <div class="header-inner">  

    <a href="#" class="logo" wire:navigate>
      <img src="https://cdn.haitrieu.com/wp-content/uploads/2021/10/Logo-Hoc-Vien-Nong-Nghiep-Viet-Nam-VNUA-1024x1024.png" alt="{{ config('app.name') }}">
      <div class="logo-text">
        <strong>Alumni Network</strong>
        <span>Học viện Nông nghiệp Việt Nam</span>
      </div>
    </a>

    <nav>
        @auth
        <a href="{{ route('csv') }}" wire:navigate class="{{ request()->routeIs('home') ? 'active' : '' }}">Trang chủ</a>
        <a href="{{ route('job') }}" wire:navigate class="{{ request()->routeIs('jobs*') ? 'active' : '' }}">Tuyển dụng</a>
        <a href="{{ route('event') }}" wire:navigate class="{{ request()->routeIs('events*') ? 'active' : '' }}">Sự kiện</a>
       @endauth
    </nav>

    <div class="header-right">
      @auth
        <a href="{{ route('admin') }}" class="btn btn-primary" wire:navigate>Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="btn btn-ghost" wire:navigate>Đăng nhập</a>
        <a href="#" class="btn btn-primary" wire:navigate>Đăng ký</a>
      @endauth
      <button class="menu-icon-btn" id="menuBtn" aria-label="Mở menu">
        <span></span><span></span><span></span>
      </button>
    </div>

  </div>
</header>

<!-- Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar Drawer -->
<div class="sidebar-drawer" id="sidebarDrawer">
  <div class="sidebar-drawer-header">
    <a href="#" class="sidebar-drawer-logo" wire:navigate>
      <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
      <span>Alumni Network</span>
    </a>
    <button class="sidebar-close" id="sidebarClose">✕</button>
  </div>

  <div class="sidebar-drawer-body">
    <div class="sidebar-nav-label">Menu chính</div>
    <a href="#" class="sidebar-nav-item {{ request()->routeIs('home') ? 'active' : '' }}" wire:navigate>
      <div class="nav-icon">🏠</div> Trang chủ
    </a>
    <a href="#" class="sidebar-nav-item {{ request()->routeIs('alumni*') ? 'active' : '' }}" wire:navigate>
      <div class="nav-icon">👥</div> Cựu sinh viên
    </a>
    <a href="#" class="sidebar-nav-item {{ request()->routeIs('jobs*') ? 'active' : '' }}" wire:navigate>
      <div class="nav-icon">💼</div> Tuyển dụng
    </a>
    <a href="#" class="sidebar-nav-item {{ request()->routeIs('events*') ? 'active' : '' }}" wire:navigate>
      <div class="nav-icon">📅</div> Sự kiện
    </a>
    <a href="#" class="sidebar-nav-item {{ request()->routeIs('contact') ? 'active' : '' }}" wire:navigate>
      <div class="nav-icon">✉️</div> Liên hệ
    </a>

    <div class="sidebar-divider"></div>
    <div class="sidebar-nav-label">Khám phá</div>
    <a href="#" class="sidebar-nav-item" wire:navigate>
      <div class="nav-icon">📊</div> Thống kê & Báo cáo
    </a>
    <a href="#" class="sidebar-nav-item" wire:navigate>
      <div class="nav-icon">🔔</div> Thông báo
    </a>
    <a href="#" class="sidebar-nav-item" wire:navigate>
      <div class="nav-icon">❓</div> FAQ
    </a>
  </div>

  <div class="sidebar-drawer-footer">
    @auth
      <a href="#" class="btn btn-primary" wire:navigate>Dashboard</a>
    @else
      <a href="#" class="btn btn-ghost" wire:navigate>Đăng nhập</a>
      <a href="#" class="btn btn-primary" wire:navigate>Đăng ký ngay</a>
    @endauth
  </div>
</div>


<main>
  {{ $slot }}
</main>

<!-- FOOTER  -->
<footer>
  <div class="footer-inner">
    <div class="footer-top">
      <div class="footer-brand">
        <a href="#" class="logo" wire:navigate>
          <img src="https://cdn.haitrieu.com/wp-content/uploads/2021/10/Logo-Hoc-Vien-Nong-Nghiep-Viet-Nam-VNUA-1024x1024.png" alt="{{ config('app.name') }}">
          <div class="footer-logo-text">
            <strong>Alumni Network</strong>
            <span>Học viện Nông nghiệp Việt Nam</span>
          </div>
        </a>
        <p class="footer-desc">Nền tảng kết nối sinh viên, cựu sinh viên và doanh nghiệp.</p>
      </div>
      <div class="footer-col">
        <h4>Hệ thống</h4>
        <ul>
          <li><a href="#" wire:navigate>Trang chủ</a></li>
          <li><a href="#" wire:navigate>Cựu sinh viên</a></li>
          <li><a href="#" wire:navigate>Tuyển dụng</a></li>
          <li><a href="#" wire:navigate>Sự kiện</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Tài khoản</h4>
        <ul>
          <li><a href="#" wire:navigate>Đăng ký</a></li>
          <li><a href="#" wire:navigate>Đăng nhập SSO</a></li>
          <li><a href="#" wire:navigate>Hồ sơ cá nhân</a></li>
          <li><a href="#" wire:navigate>Cài đặt</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Hỗ trợ</h4>
        <ul>
          <li><a href="#" wire:navigate>Hướng dẫn sử dụng</a></li>
          <li><a href="#" wire:navigate>Câu hỏi thường gặp</a></li>
          <li><a href="#" wire:navigate>Liên hệ Khoa CNTT</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="footer-copy">© {{ date('Y') }} Alumni Network — Học viện Nông nghiệp Việt Nam. All rights reserved.</p>
      <div class="footer-links">
        <a href="#">Chính sách bảo mật</a>
        <a href="#">Điều khoản sử dụng</a>
      </div>
    </div>
  </div>
</footer>

@livewireScripts

<script>
  const menuBtn      = document.getElementById('menuBtn');
  const sidebarClose = document.getElementById('sidebarClose');
  const drawer       = document.getElementById('sidebarDrawer');
  const overlay      = document.getElementById('sidebarOverlay');

  function openSidebar() {
    drawer.classList.add('open');
    overlay.classList.add('open');
    menuBtn.classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function closeSidebar() {
    drawer.classList.remove('open');
    overlay.classList.remove('open');
    menuBtn.classList.remove('open');
    document.body.style.overflow = '';
  }

  menuBtn.addEventListener('click', () => {
    drawer.classList.contains('open') ? closeSidebar() : openSidebar();
  });
  sidebarClose.addEventListener('click', closeSidebar);
  overlay.addEventListener('click', closeSidebar);
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeSidebar();
  });
</script>

</body>
</html>
