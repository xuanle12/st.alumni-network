<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Mạng lưới cựu sinh viên khoa CNTT ' }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400;500;600;700;800&family=Barlow+Condensed:wght@600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
  <style>
    
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
   --blue:        #0961AA;  
  --blue-light:  #0c83d8;   
  --blue-pale:   #e8f0fe; 
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
  font-family: 'Barlow', system-ui, sans-serif;
  background: var(--bg);
  color: var(--text);
  scroll-behavior: smooth;
  padding-top: 102px; /* 35 topbar + 67 header */
}

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
  font-size: 15px;
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
.btn-ghost:hover { background: #f1f5f9; color: var(--text); }
.btn-primary { background: var(--blue); color: #fff; }
.btn-primary:hover {
  background: var(--blue-light);
  transform: translateY(-1px);
  box-shadow: 0 4px 14px rgba(9,97,170,0.28);
}

.btn-hero {
  padding: 12px 26px;
  border-radius: 9px;
  font-family: inherit;
  font-size: 30px;
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
.menu-icon-btn:hover { background: var(--blue-pale); border-color: #abc5ea; }
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

/* ===== TOPBAR ===== */
.topbar {
  background: var(--blue);
  color: #fff;
  font-size: 13px;
  height: 35px;
  display: flex;
  align-items: center;
  padding: 0 24px;
  justify-content: space-between;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 300;
  will-change: transform;
}
.topbar-left { font-weight: 500; letter-spacing: 0.2px; opacity: .9; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.topbar-right { display: flex; align-items: center; gap: 16px; flex-shrink: 0; }
.topbar-right a { color: rgba(255,255,255,.75); font-size: 12.5px; text-decoration: none; transition: .15s; white-space: nowrap; }
.topbar-right a:hover { color: #fff; }
.topbar-sep { color: rgba(255,255,255,.3); }

/* ===== HEADER ===== */
header {
  position: fixed;
  top: 35px;
  left: 0;
  right: 0;
  z-index: 299;
  height: 67px;
  background: #fff;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  will-change: transform;
}

.header-inner {
  width: 100%;
  padding: 0 24px 0 8px;
  height: 67px;
  display: flex;
  align-items: center;
  overflow: hidden;
}

.logo {
  display: flex;
  align-items: center;
  gap: 12px;
  text-decoration: none;
  flex-shrink: 0;
}
.logo img { height: 52px; width: auto; flex-shrink: 0; }
.logo-text { line-height: 1.25; }
.logo-text strong {
  display: block;
  font-size: 20px;
  font-weight: 800;
  color: var(--blue);
  letter-spacing: -0.2px;
  line-height: 1.2;
  white-space: nowrap;
}
.logo-text span { font-size: 13px; color: var(--text-muted); font-weight: 500; white-space: nowrap; }

/* ===== NAV — chiều cao khớp với header ===== */
nav { display: flex; align-items: center; gap: 0; height: 67px; margin-left: auto; }
nav a {
  position: relative;
  padding: 0 14px;
  height: 100%;
  display: flex;
  align-items: center;
  font-size: 15px;
  font-weight: 500;
  color: var(--text);
  text-decoration: none;
  transition: color .15s;
  white-space: nowrap;
  text-transform: uppercase;
  letter-spacing: 0.3px;
}
nav a::before {
  content: '';
  position: absolute;
  bottom: 0; left: 0;
  width: 0; height: 3px;
  background: var(--blue-light);
  transition: width .25s;
}
nav a:hover { color: var(--blue-light); }
nav a:hover::before { width: 100%; }
nav a.active {
  color: var(--blue);
  font-weight: 700;
}
nav a.active::before { width: 100%; background: var(--blue); }

.header-right {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-shrink: 0;
  margin-left: 16px;
}

/* ===== SIDEBAR ===== */
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
.sidebar-drawer-logo span { font-size: 13px; font-weight: 700; color: var(--blue); }

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
  font-size: 20px;
  font-weight: 500;
  color: var(--text-muted);
  text-decoration: none;
  transition: .15s;
}
.sidebar-nav-item:hover { background: var(--blue-pale); color: var(--blue); }
.sidebar-nav-item.active { background: var(--blue-pale); color: var(--blue); font-weight: 600; }
.sidebar-nav-item .nav-icon {
  width: 34px; height: 34px;
  border-radius: 9px;
  background: #f3f4f6;
  display: flex; align-items: center; justify-content: center;
  font-size: 20px;
  flex-shrink: 0;
  transition: .15s;
}
.sidebar-nav-item:hover .nav-icon,
.sidebar-nav-item.active .nav-icon { background: rgba(9,97,170,0.1); }

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

.menu-icon-btn { display: none; }
.hamburger { display: none; }

/* ===== FOOTER ===== */
.footer-stripe { display: flex; flex-direction: column; }
.footer-stripe-gold  { height: 6px; background: #F6A309; }
.footer-stripe-green { height: 6px; background: #066140; }
.footer-stripe-brown { height: 6px; background: #4E3636; box-shadow: 0 0 6px #4E3636; }

footer {
  background: var(--blue);
  padding: 48px 16px;
}

.footer-grid {
  grid-template-columns: 3fr 2fr 1fr 2fr !important;
}
@media (max-width: 1024px) {
  .footer-grid { grid-template-columns: 1fr 1fr !important; }
}
@media (max-width: 640px) {
  .footer-grid { grid-template-columns: 1fr !important; }
}

.footer-logo {
  display: flex; align-items: center; gap: 10px;
  text-decoration: none; margin-bottom: 20px;
}
.footer-logo img {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid rgba(255,255,255,.25);
}
.footer-logo strong { display: block; font-size: 14px; font-weight: 700; color: #fff; }
.footer-logo span { font-size: 12px; color: rgba(255,255,255,.5); }

.footer-contact-list { list-style: none; display: flex; flex-direction: column; gap: 12px; }
.footer-contact-list li,
.footer-contact-list a { display: flex; align-items: flex-start; gap: 8px; color: rgba(255,255,255,.65); font-size: 14px; text-decoration: none; transition: .15s; }
.footer-contact-list a:hover { color: #fff; }
.footer-contact-list i { font-size: 14px; margin-top: 2px; flex-shrink: 0; color: rgba(255,255,255,.4); }

.footer-col-links h5,
.footer-col-social h5 { font-size: 18px; font-weight: 600; color: #fff; margin-bottom: 20px; }

.footer-link-list { list-style: none; display: flex; flex-direction: column; gap: 12px; }
.footer-link-list li { transition: transform .2s; }
.footer-link-list li:hover { transform: translateX(4px); }
.footer-link-list a { display: flex; align-items: center; gap: 7px; font-size: 14px; color: rgba(255,255,255,.65); text-decoration: none; transition: color .15s; }
.footer-link-list a:hover { color: #fff; }
.footer-link-list i { font-size: 11px; color: rgba(255,255,255,.35); }

.footer-social-list { list-style: none; display: flex; flex-direction: column; gap: 14px; }
.footer-social-list li { transition: transform .2s; }
.footer-social-list li:hover { transform: translateX(4px); }
.footer-social-list a { display: flex; align-items: center; gap: 10px; font-size: 14px; font-weight: 500; color: rgba(255,255,255,.65); text-decoration: none; transition: color .15s; }
.footer-social-list a:hover { color: #fff; }

.footer-col-map { border-radius: 8px; overflow: hidden; min-height: 200px; }

.footer-copyright {
  background: var(--blue);
  border-top: 1px solid rgba(255,255,255,.1);
  padding: 12px 0;
  text-align: center;
  font-size: 13px;
  color: rgba(255,255,255,.5);
}
.footer-copyright a { color: rgba(255,255,255,.7); text-decoration: none; font-weight: 500; transition: .15s; }
.footer-copyright a:hover { color: #fff; }

/* ===== ANIMATIONS ===== */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(24px); }
  to   { opacity: 1; transform: translateY(0); }
}
.fade-up   { animation: fadeUp .6s ease both; }
.delay-1   { animation-delay: .1s; }
.delay-2   { animation-delay: .2s; }
.delay-3   { animation-delay: .3s; }

/* ===== RESPONSIVE ===== */
@media (max-width: 1024px) {
  .hero-inner { grid-template-columns: 1fr; text-align: center; }
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
  .logo { align-items: center; }
  .logo-text strong { white-space: normal; line-height: 1.3; font-size: 15px; max-width: 180px; }
  .logo-text span { font-size: 12px; white-space: normal; }
}

@media (max-width: 480px) {
  .header-inner { padding: 0 16px; gap: 12px; }
  .logo-text span { display: none; }

  .hero { padding: 48px 16px 52px; }
  .hero h1 { font-size: 20px; }
  .hero p  { font-size: 20px; }
  .hero-tag { font-size: 20px; }
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

.skip-link {
  position: absolute;
  left: -999px;
  top: 8px;
  background: var(--blue);
  color: #fff;
  padding: 8px 14px;
  border-radius: 8px;
  font-size: 13px;
  font-weight: 600;
  z-index: 1000;
}
.skip-link:focus { left: 16px; outline: 3px solid var(--gold-light); outline-offset: 2px; }

a:focus-visible, button:focus-visible {
  outline: 2px solid var(--blue);
  outline-offset: 2px;
  border-radius: 6px;
}

.flash-toast {
  position: fixed;
  top: 112px;
  right: 16px;
  z-index: 400;
  display: flex;
  align-items: center;
  gap: 10px;
  background: #fff;
  border: 1px solid var(--border);
  border-left: 4px solid var(--blue);
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
  .flash-toast { left: 16px; right: 16px; top: 112px; }
}
  </style>
 </head>
<body>

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

<div class="topbar">
  <span class="topbar-left">Học viện Nông nghiệp Việt Nam — Vietnam National University of Agriculture</span>
  <div class="topbar-right">
    @guest
      <a href="{{ route('login') }}" wire:navigate>Đăng nhập</a>
      <span class="topbar-sep">|</span>
      <a href="{{ route('register') }}" wire:navigate>Đăng ký</a>
    @endguest
    @auth
      <a href="{{ route('profile') }}" wire:navigate>{{ auth()->user()->name }}</a>
      <span class="topbar-sep">|</span>
      <form action="{{ route('logout') }}" method="POST" style="margin:0;display:inline">
        @csrf
        <button type="submit" style="background:none;border:none;cursor:pointer;color:rgba(255,255,255,.75);font-size:12.5px;padding:0;font-family:inherit;transition:.15s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,.75)'">Đăng xuất</button>
      </form>
    @endauth
  </div>
</div>

<header>
  <div class="header-inner">
    <a href="{{ route('home') }}" class="logo" wire:navigate>
      <img src="{{ asset('img/fita-logo.png') }}" alt="{{ config('app.name') }}" loading="lazy">
      <div class="logo-text">
        <strong>MẠNG LƯỚI CỰU SINH VIÊN KHOA CNTT</strong>
        <span>Học viện Nông nghiệp Việt Nam</span>
      </div>
    </a>
    <nav>
      @auth
        <a href="{{ route('csv') }}"   class="{{ request()->routeIs('csv')   ? 'active' : '' }}" wire:navigate>Trang chủ</a>
        <a href="{{ route('job') }}"   class="{{ request()->routeIs('job*')  ? 'active' : '' }}" wire:navigate>Tuyển dụng</a>
        <a href="{{ route('event') }}" class="{{ request()->routeIs('event*')? 'active' : '' }}" wire:navigate>Sự kiện</a>
      @endauth
    </nav>
    <div class="header-right">
      @auth
        @if(auth()->user()->isAdmin())
          <a href="{{ route('admin') }}" class="btn btn-primary" wire:navigate>Dashboard</a>
        @else
          <a href="{{ route('profile') }}" class="btn btn-primary" wire:navigate>Hồ sơ</a>
        @endif
      @endauth
      <button class="menu-icon-btn" id="menuBtn">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </div>
</header>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="sidebar-drawer" id="sidebarDrawer">
  <div class="sidebar-drawer-header">
    <a href="{{ route('home') }}" class="sidebar-drawer-logo" wire:navigate>
      <img src="{{ asset('img/logo-vnua.png') }}" alt="{{ config('app.name') }}" loading="lazy">
      <span>Alumni Network</span>
    </a>
    <button class="sidebar-close" id="sidebarClose" aria-label="Đóng menu">✕</button>
  </div>
  <div class="sidebar-drawer-body">
    @guest
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
        <a href="{{ route('profile') }}" class="btn btn-primary" wire:navigate>Hồ sơ</a>
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

<div class="footer-stripe">
  <div class="footer-stripe-gold"></div>
  <div class="footer-stripe-green"></div>
  <div class="footer-stripe-brown"></div>
</div>

<footer>
  <div style="max-width:1280px;margin:0 auto;padding:0 16px;display:grid;grid-template-columns:repeat(1,1fr);gap:32px 40px;"
       class="footer-grid">
    <div class="footer-col-contact">
      <a href="{{ route('home') }}" class="footer-logo" wire:navigate>
        <img src="{{ asset('img/fita-logo.png') }}" alt="logo">
        <div>
          <strong>MẠNG LƯỚI CỰU SINH VIÊN KHOA CNTT</strong>
          <span>Khoa Công nghệ Thông tin</span>
        </div>
      </a>
      <ul class="footer-contact-list">
        <li>
          <i class="fa-solid fa-location-dot"></i>
          <span>Trâu Quỳ, Gia Lâm, Hà Nội</span>
        </li>
        <li>
          <a href="tel:02438276473">
            <i class="fa-solid fa-phone"></i>
            <span>(024) 3827 6473</span>
          </a>
        </li>
        <li>
          <a href="mailto:fita@vnua.edu.vn">
            <i class="fa-solid fa-envelope"></i>
            <span>fita@vnua.edu.vn</span>
          </a>
        </li>
        <li>
          <a href="{{ route('home') }}" wire:navigate>
            <i class="fa-solid fa-globe"></i>
            <span>{{ request()->getSchemeAndHttpHost() }}</span>
          </a>
        </li>
      </ul>
    </div>

    <div class="footer-col-links">
      <h5>Liên kết nhanh</h5>
      <ul class="footer-link-list">
        <li><a href="{{ route('home') }}" wire:navigate><i class="fa-solid fa-chevron-right"></i> Trang chủ</a></li>
        <li><a href="{{ route('csv') }}" wire:navigate><i class="fa-solid fa-chevron-right"></i> Diễn đàn</a></li>
        <li><a href="{{ route('job') }}" wire:navigate><i class="fa-solid fa-chevron-right"></i> Tuyển dụng</a></li>
        <li><a href="{{ route('event') }}" wire:navigate><i class="fa-solid fa-chevron-right"></i> Sự kiện</a></li>
        @guest
        <li><a href="{{ route('register') }}" wire:navigate><i class="fa-solid fa-chevron-right"></i> Đăng ký</a></li>
        <li><a href="{{ route('login') }}" wire:navigate><i class="fa-solid fa-chevron-right"></i> Đăng nhập</a></li>
        @endguest
      </ul>
    </div>

    <div class="footer-col-social">
      <h5>Kết nối</h5>
      <ul class="footer-social-list">
        <li>
          <a href="https://facebook.com/fitavnua" target="_blank">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/></svg>
            <span>Facebook</span>
          </a>
        </li>
        <li>
          <a href="https://youtube.com/@fitavnua" target="_blank">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/></svg>
            <span>YouTube</span>
          </a>
        </li>
        <li>
          <a href="https://tiktok.com/@fitavnua" target="_blank">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 16 16"><path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/></svg>
            <span>TikTok</span>
          </a>
        </li>
      </ul>
    </div>

    <div class="footer-col-map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d232.79335334283132!2d105.9314793!3d21.0049137!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a8d01169441f%3A0x588113cbf27a61f0!2zS2hvYSBDw7RuZyBuZ2jhu4cgdGjDtG5nIHRpbg!5e0!3m2!1svi!2s!4v1777305347149!5m2!1svi!2s"
        style="width:100%;height:100%;min-height:200px;border:0;border-radius:8px;"
        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </div>
</footer>

<div class="footer-copyright">
  <div style="max-width:1280px;margin:0 auto;padding:0 24px;">
    Copyright &copy; {{ date('Y') }}:
    <a href="{{ route('home') }}" wire:navigate>Mạng lưới Cựu sinh viên Khoa CNTT</a>,
    <a href="https://vnua.edu.vn" target="_blank">Học viện Nông nghiệp Việt Nam</a>
  </div>
</div>

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

  document.addEventListener('livewire:navigated', closeSidebar);
</script>

</body>
</html>