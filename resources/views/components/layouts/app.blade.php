<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Mạng lưới cựu sinh viên khoa CNTT ' }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
  <style>
    
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
   --green:       #1a56db;  
  --green-light: #1e69f5;   
  --green-pale:  #e8f0fe; 
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
.menu-icon-btn:hover { background: var(--green-pale); border-color: #abc5ea; }
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
    header {
  position: sticky;
  top: 0;
  z-index: 200;
  background: rgba(255,255,255,0.95);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-bottom: 1px solid var(--border);
}

.header-inner {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 24px;
  height: 66px;
  display: flex;
  align-items: center;
  gap: 28px;
}

.logo {
  display: flex;
  align-items: center;
  gap: 11px;
  text-decoration: none;
  flex-shrink: 0;
}
.logo img { height: 38px; width: auto; }
.logo-text { line-height: 1.25; }
.logo-text strong {
  display: block;
  font-size: 13.5px;
  font-weight: 700;
  color: var(--green);
  letter-spacing: -0.2px;
}
.logo-text span { font-size: 11px; color: var(--text-muted); }

nav { display: flex; align-items: center; gap: 2px; }
nav a {
  padding: 6px 13px;
  border-radius: 7px;
  font-size: 13.5px;
  font-weight: 500;
  color: var(--text-muted);
  text-decoration: none;
  transition: .15s;
  white-space: nowrap;
}
nav a:hover { color: var(--text); background: #f1f5f2; }
nav a.active{
    color:#1d4ed8;
    background:#dbeafe;
    font-weight:700;
    border-radius:8px;
}

.header-right {
  margin-left: auto;
  display: flex;
  align-items: center;
  gap: 8px;
  flex-shrink: 0;
}
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
/* ── FOOTER ─────────────────────────────── */
footer { background: #0f2218; padding: 48px 24px 28px; }
.footer-inner { max-width: 1200px; margin: 0 auto; }
.footer-top {
  display: grid;
  grid-template-columns: 1.6fr repeat(3, 1fr);
  gap: 40px;
  margin-bottom: 40px;
}
.footer-logo {
  display: flex; align-items: center; gap: 10px;
  text-decoration: none; margin-bottom: 14px;
}
.footer-logo img {
  height: 32px; width: auto;
  filter: brightness(0) invert(1); opacity: .85;
}
.footer-logo-text strong { display: block; font-size: 13px; font-weight: 700; color: rgba(255,255,255,.85); }
.footer-logo-text span { font-size: 11px; color: rgba(255,255,255,.4); }
.footer-desc { font-size: 13px; color: rgba(255,255,255,.4); line-height: 1.7; max-width: 230px; }
.footer-col h4 {
  font-size: 11px; font-weight: 700;
  letter-spacing: 1px; text-transform: uppercase;
  color: rgba(255,255,255,.35); margin-bottom: 14px;
}
.footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 9px; }
.footer-col ul a { font-size: 13.5px; color: rgba(255,255,255,.55); text-decoration: none; transition: .15s; }
.footer-col ul a:hover { color: rgba(255,255,255,.9); }
.footer-bottom {
  border-top: 1px solid rgba(255,255,255,.08);
  padding-top: 22px;
  display: flex; align-items: center; justify-content: space-between;
  gap: 16px;
}
.footer-copy { font-size: 12.5px; color: rgba(255,255,255,.3); }
.footer-links { display: flex; gap: 18px; }
.footer-links a { font-size: 12.5px; color: rgba(255,255,255,.3); text-decoration: none; transition: .15s; }
.footer-links a:hover { color: rgba(255,255,255,.6); }


@keyframes fadeUp {
  from { opacity: 0; transform: translateY(24px); }
  to   { opacity: 1; transform: translateY(0); }
}
.fade-up   { animation: fadeUp .6s ease both; }
.delay-1   { animation-delay: .1s; }
.delay-2   { animation-delay: .2s; }
.delay-3   { animation-delay: .3s; }



@media (max-width: 1024px) {
  .hero-inner {
    grid-template-columns: 1fr;
    text-align: center;
  }
  .hero p { margin-left: auto; margin-right: auto; }
  .hero-actions { justify-content: center; }
  .hero-card { display: none; }

  .features-grid { grid-template-columns: repeat(2, 1fr); }
  .alumni-grid   { grid-template-columns: repeat(3, 1fr); }

  .footer-top { grid-template-columns: 1fr 1fr; gap: 32px; }
  .footer-brand { grid-column: 1 / -1; }
  .footer-desc  { max-width: 100%; }
}

@media (max-width: 768px) {
  nav { display: none; }
  .header-right .btn-ghost,
  .header-right .btn-primary { display: none; }
  .menu-icon-btn { display: flex; }

  section { padding: 52px 20px; }
  .hero { padding: 60px 20px; }

  .features-grid { grid-template-columns: repeat(2, 1fr); gap: 14px; }
  .alumni-grid   { grid-template-columns: repeat(2, 1fr); gap: 14px; }
  .jobs-grid     { grid-template-columns: 1fr; }

  .section-header { flex-direction: column; align-items: flex-start; gap: 12px; }

  .event-item { flex-wrap: wrap; gap: 14px; }
  .event-div  { display: none; }
  .event-badge { order: -1; }

  .footer-top { grid-template-columns: 1fr 1fr; gap: 28px; }
}

/* ── MOBILE (≤ 480px) ──────────────────── */
@media (max-width: 480px) {
  .header-inner { padding: 0 16px; gap: 12px; }
  .logo-text span { display: none; }

  .hero { padding: 48px 16px 52px; }
  .hero h1 { font-size: 28px; }
  .hero p  { font-size: 14px; }
  .hero-tag { font-size: 11px; }
  .hero-actions { flex-direction: column; }
  .btn-hero { justify-content: center; }

  section { padding: 44px 16px; }

  .features-grid { grid-template-columns: 1fr; }
  .alumni-grid   { grid-template-columns: 1fr; }
  .jobs-grid     { grid-template-columns: 1fr; }

  .job-card { flex-wrap: wrap; }
  .job-salary { width: 100%; margin-top: 8px; }

  .event-item { padding: 14px 16px; }
  .event-date { display: flex; align-items: center; gap: 6px; width: auto; }
  .event-date .day { font-size: 20px; }
  .event-info h4 { font-size: 13.5px; }
  .event-meta { flex-direction: column; gap: 4px; }

  .cta { padding: 52px 16px; }
  .cta-actions { flex-direction: column; align-items: stretch; }
  .cta-actions .btn-hero { justify-content: center; }

  .footer-top { grid-template-columns: 1fr; gap: 24px; }
  .footer-bottom { flex-direction: column; text-align: center; gap: 10px; }
  .footer-links { justify-content: center; }

  .container { padding: 0 16px; }
}

/* ── A11Y: Skip link ────────────────────── */
.skip-link {
  position: absolute;
  left: -999px;
  top: 8px;
  background: var(--green);
  color: #fff;
  padding: 8px 14px;
  border-radius: 8px;
  font-size: 13px;
  font-weight: 600;
  z-index: 1000;
}
.skip-link:focus { left: 16px; outline: 3px solid var(--gold-light); outline-offset: 2px; }

a:focus-visible, button:focus-visible {
  outline: 2px solid var(--green);
  outline-offset: 2px;
  border-radius: 6px;
}

/* ── Flash toast ────────────────────────── */
.flash-toast {
  position: fixed;
  top: 84px;
  right: 16px;
  z-index: 400;
  display: flex;
  align-items: center;
  gap: 10px;
  background: #fff;
  border: 1px solid var(--border);
  border-left: 4px solid var(--green);
  box-shadow: var(--shadow-md);
  border-radius: 10px;
  padding: 12px 16px;
  font-size: 13.5px;
  color: var(--text);
  max-width: calc(100vw - 32px);
  animation: flashIn .3s ease both;
}
.flash-toast.is-info  { border-left-color: #2563eb; }
.flash-toast.is-error { border-left-color: #dc2626; }
.flash-toast button {
  background: transparent;
  border: none;
  cursor: pointer;
  font-size: 16px;
  color: var(--text-muted);
  line-height: 1;
}
@keyframes flashIn {
  from { transform: translateY(-8px); opacity: 0; }
  to   { transform: translateY(0);    opacity: 1; }
}
@media (max-width: 480px) {
  .flash-toast { left: 16px; right: 16px; top: 76px; }
}
  </style>
 </head>
<body>

<a href="#main-content" class="skip-link">Bỏ qua tới nội dung chính</a>

@if(session('success') || session('info') || session('error'))
  @php
    $flashType = session('error') ? 'is-error' : (session('info') ? 'is-info' : '');
    $flashMsg  = session('error') ?? session('info') ?? session('success');
  @endphp
  <div class="flash-toast {{ $flashType }}" role="status" aria-live="polite" id="flashToast">
    <span>{{ $flashMsg }}</span>
    <button type="button" aria-label="Đóng thông báo" onclick="this.parentNode.remove()">✕</button>
  </div>
  <script>setTimeout(() => { const t=document.getElementById('flashToast'); if(t) t.remove(); }, 4000);</script>
@endif

<!-- ── HEADER ── -->
<header>
  <div class="header-inner">  

    <a href="{{ route('home') }}" class="logo" wire:navigate>
      <img src="https://cdn.haitrieu.com/wp-content/uploads/2021/10/Logo-Hoc-Vien-Nong-Nghiep-Viet-Nam-VNUA-1024x1024.png" alt="{{ config('app.name') }}" loading="lazy">
      <div class="logo-text">
        <strong>Mạng lưới cựu sinh viên khoa CNTT</strong>
        <span>Học viện Nông nghiệp Việt Nam</span>
      </div>
    </a>

    <nav>
        @auth
        <a href="{{ route('csv') }}" class="{{ request()->routeIs('csv') ? 'active' : '' }}" wire:navigate>Trang chủ</a>
        <a href="{{ route('job') }}" class="{{ request()->routeIs('job*') ? 'active' : '' }}" wire:navigate>Tuyển dụng</a>
        <a href="{{ route('event') }}" class="{{ request()->routeIs('event*') ? 'active' : '' }}" wire:navigate>Sự kiện</a>
       @endauth
    </nav>

    <div class="header-right">
      @auth
        @if(auth()->user()->isAdmin())
          <a href="{{ route('admin') }}" class="btn btn-primary" wire:navigate>Dashboard</a>
        @else
          <a href="{{ route('profile') }}" class="btn btn-primary" wire:navigate>Hồ sơ</a>
        @endif
      @else
        <a href="{{ route('login') }}" class="btn btn-ghost" wire:navigate>Đăng nhập</a>
        <a href="{{ route('register') }}" class="btn btn-primary" wire:navigate>Đăng ký</a>
      @endauth
      <button class="menu-icon-btn" id="menuBtn" aria-label="Mở menu" aria-expanded="false" aria-controls="sidebarDrawer">
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
    <a href="{{ route('home') }}" class="sidebar-drawer-logo" wire:navigate>
      <img src="https://cdn.haitrieu.com/wp-content/uploads/2021/10/Logo-Hoc-Vien-Nong-Nghiep-Viet-Nam-VNUA-1024x1024.png" alt="{{ config('app.name') }}" loading="lazy">
      <span>Alumni Network</span>
    </a>
    <button class="sidebar-close" id="sidebarClose" aria-label="Đóng menu">✕</button>
  </div>
<div class="sidebar-drawer-body">
  @guest
    {{-- Chưa đăng nhập: không hiện menu, chỉ hiện nút ở footer --}}
    <p style="font-size:13px;color:var(--text-muted);padding:12px 10px;line-height:1.6;">
      Vui lòng đăng nhập để truy cập đầy đủ tính năng.
    </p>
  @endguest

  @auth
    <div class="sidebar-nav-label">Menu chính</div>
    <a href="{{ route('csv') }}" class="sidebar-nav-item {{ request()->routeIs('csv') ? 'active' : '' }}" wire:navigate>
      <div class="nav-icon"><i class="fa-solid fa-house"></i></div> Trang chủ
    </a>
    <a href="{{ route('job') }}" class="sidebar-nav-item {{ request()->routeIs('job*') ? 'active' : '' }}" wire:navigate>
      <div class="nav-icon"><i class="fa-solid fa-briefcase"></i></div> Tuyển dụng
    </a>
    <a href="{{ route('event') }}" class="sidebar-nav-item {{ request()->routeIs('event*') ? 'active' : '' }}" wire:navigate>
      <div class="nav-icon"><i class="fa-solid fa-calendar-days"></i></div> Sự kiện
    </a>
    <a href="{{ route('profile') }}" class="sidebar-nav-item" wire:navigate>
      <div class="nav-icon"><i class="fa-solid fa-user"></i></div> Hồ Sơ
    </a>
    @if(auth()->user()->isAdmin())
      <div class="sidebar-divider"></div>
      <div class="sidebar-nav-label">Quản trị</div>
      <a href="{{ route('admin') }}" class="sidebar-nav-item {{ request()->routeIs('admin') ? 'active' : '' }}" wire:navigate>
        <div class="nav-icon"><i class="fa-solid fa-gauge"></i></div> Dashboard
      </a>
      <a href="{{ route('admin.thongk') }}" class="sidebar-nav-item {{ request()->routeIs('admin.thongk') ? 'active' : '' }}" wire:navigate>
        <div class="nav-icon"><i class="fa-solid fa-chart-bar"></i></div> Thống kê & Báo cáo
      </a>
    @endif
  @endauth
</div>

  <div class="sidebar-drawer-footer">
    @auth
      @if(auth()->user()->isAdmin())
        <a href="{{ route('admin') }}" class="btn btn-primary" wire:navigate>Dashboard</a>
      @else
        <a href="{{ route('profile') }}" class="btn btn-primary" wire:navigate>Hồ sơ của tôi</a>
      @endif
      <form action="{{ route('logout') }}" method="POST" style="margin:0;">
        @csrf
        <button type="submit" class="btn btn-ghost" style="width:100%;justify-content:center;background:transparent;cursor:pointer;">
          Đăng xuất
        </button>
      </form>
    @else
      <a href="{{ route('login') }}" class="btn btn-ghost" wire:navigate>Đăng nhập</a>
      <a href="{{ route('register') }}" class="btn btn-primary" wire:navigate>Đăng ký ngay</a>
    @endauth
  </div>
</div>


<main id="main-content">
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
    if (!drawer || !overlay || !menuBtn) return;
    drawer.classList.add('open');
    overlay.classList.add('open');
    menuBtn.classList.add('open');
    menuBtn.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  }
  function closeSidebar() {
    if (!drawer || !overlay || !menuBtn) return;
    drawer.classList.remove('open');
    overlay.classList.remove('open');
    menuBtn.classList.remove('open');
    menuBtn.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  if (menuBtn) {
    menuBtn.addEventListener('click', () => {
      drawer.classList.contains('open') ? closeSidebar() : openSidebar();
    });
  }
  if (sidebarClose) sidebarClose.addEventListener('click', closeSidebar);
  if (overlay) overlay.addEventListener('click', closeSidebar);
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeSidebar();
  });

  // Close drawer after Livewire SPA navigation
  document.addEventListener('livewire:navigated', closeSidebar);
</script>

</body>
</html>
