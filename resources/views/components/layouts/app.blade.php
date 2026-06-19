<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Mạng lưới cựu sinh viên khoa Công Nghệ Thông Tin ' }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
 </head>
<body>

<div id="toaster" role="status" aria-live="polite"></div>

{{-- Page Loader --}}
<div id="page-loader"><div id="page-loader-bar"></div></div>
<div id="req-spinner" aria-hidden="true">
  <svg viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2.5" stroke-linecap="round">
    <path d="M12 2a10 10 0 1 0 10 10" />
  </svg>
</div>

<div class="site-topbar">
  <span class="site-topbar-left">Học viện Nông nghiệp Việt Nam — Vietnam National University of Agriculture</span>
  <div class="site-topbar-right">
    @guest
      <a href="{{ route('login') }}" wire:navigate>Đăng nhập</a>
      <span class="site-topbar-sep">|</span>
      <a href="{{ route('register') }}" wire:navigate>Đăng ký</a>
    @endguest
    @auth
      <a href="{{ route('profile') }}" wire:navigate>{{ auth()->user()->name }}</a>
      <span class="site-topbar-sep">|</span>
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
        <strong>MẠNG LƯỚI CỰU SINH VIÊN KHOA CÔNG NGHỆ THÔNG TIN</strong>
        <span>Học viện Nông nghiệp Việt Nam</span>
      </div>
    </a>
    <nav>
      @auth
        <a href="{{ route('csv') }}"   class="{{ request()->routeIs('csv')   ? 'active' : '' }}" wire:navigate>Trang chủ</a>
        <a href="{{ route('job') }}"   class="{{ request()->routeIs('job*')  ? 'active' : '' }}" wire:navigate>Tuyển dụng</a>
        <a href="{{ route('event') }}" class="{{ request()->routeIs('event*')? 'active' : '' }}" wire:navigate>Sự kiện</a>
      @if(auth()->user()?->hasRole(['student','admin','alumni']))
        <a href="{{ route('mentor') }}" class="{{ request()->routeIs('mentor')? 'active' : '' }}" wire:navigate>Mentor</a>
      @endif
      @endauth
    </nav>
    <div class="header-right">
      @auth
        @if(auth()->user()->isAdmin())
          <a href="{{ route('admin') }}" class="btn btn-primary">Bảng điều khiển </a>
        @else
          <a href="{{ route('profile') }}" class="btn btn-primary">Hồ sơ</a>
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
          <div class="nav-icon"><i class="fa-solid fa-gauge"></i></div> Bảng điều khiển
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
        <a href="{{ route('admin') }}" class="btn btn-primary" wire:navigate>Bảng điều khiển </a>
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
          <strong>MẠNG LƯỚI CỰU SINH VIÊN KHOA Công Nghệ Thông Tin</strong>
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
     &copy; {{ date('Y') }}:
    <a href="{{ route('home') }}" wire:navigate>Mạng lưới Cựu sinh viên Khoa Công Nghệ Thông Tin</a>,
    <a href="https://vnua.edu.vn" target="_blank">Học viện Nông nghiệp Việt Nam</a>
  </div>
</div>

@livewireScripts

<script>
window.__toaster = {
  _icons: { success: '✓', error: '✕', info: 'i', warning: '!' },
  show(message, type) {
    type = type || 'success';
    const c = document.getElementById('toaster');
    if (!c) return;
    const el = document.createElement('div');
    el.className = 'toast-item is-' + type;
    el.innerHTML =
      '<div class="toast-icon">' + (this._icons[type] || '✓') + '</div>' +
      '<div class="toast-body">' + message + '</div>' +
      '<button class="toast-close" aria-label="Đóng">✕</button>' +
      '<div class="toast-progress"></div>';
    el.querySelector('.toast-close').addEventListener('click', () => this.dismiss(el));
    c.appendChild(el);
    setTimeout(() => this.dismiss(el), 4500);
  },
  dismiss(el) {
    if (!el || el.classList.contains('removing')) return;
    el.classList.add('removing');
    el.addEventListener('animationend', () => el.remove(), { once: true });
  }
};
document.addEventListener('livewire:init', () => {
  Livewire.on('toast', ({ type, message }) => window.__toaster.show(message, type ?? 'success'));
});
@if(session('success'))
  document.addEventListener('DOMContentLoaded', () => window.__toaster.show(@json(session('success')), 'success'));
@endif
@if(session('info'))
  document.addEventListener('DOMContentLoaded', () => window.__toaster.show(@json(session('info')), 'info'));
@endif
@if(session('error'))
  document.addEventListener('DOMContentLoaded', () => window.__toaster.show(@json(session('error')), 'error'));
@endif
@if(session('register_success'))
  document.addEventListener('DOMContentLoaded', () => window.__toaster.show(@json(session('register_success')), 'success'));
@endif
</script>

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

<script>
(function () {
  var loader = document.getElementById('page-loader');
  var bar    = document.getElementById('page-loader-bar');
  var spinner = document.getElementById('req-spinner');
  var _prog = 0, _raf;

  function startProgress() {
    if (!loader || !bar) return;
    _prog = 0;
    bar.style.transition = 'none';
    bar.style.width = '0%';
    loader.classList.remove('done');
    loader.classList.add('active');
    // giả lập tiến độ tăng dần
    function step() {
      if (_prog < 80) {
        _prog += (80 - _prog) * 0.08 + 0.5;
        bar.style.transition = 'width .3s ease';
        bar.style.width = _prog + '%';
        _raf = requestAnimationFrame(step);
      }
    }
    _raf = requestAnimationFrame(step);
  }

  function finishProgress() {
    if (!loader || !bar) return;
    cancelAnimationFrame(_raf);
    bar.style.transition = 'width .25s ease';
    bar.style.width = '100%';
    loader.classList.add('done');
    setTimeout(function () {
      loader.classList.remove('active', 'done');
      bar.style.transition = 'none';
      bar.style.width = '0%';
    }, 350);
  }

  var _reqCount = 0;
  function showSpinner() {
    _reqCount++;
    if (spinner) spinner.classList.add('active');
  }
  function hideSpinner() {
    _reqCount = Math.max(0, _reqCount - 1);
    if (_reqCount === 0 && spinner) spinner.classList.remove('active');
  }

  document.addEventListener('livewire:navigating', startProgress);
  document.addEventListener('livewire:navigated',  finishProgress);

  document.addEventListener('livewire:request',  showSpinner);
  document.addEventListener('livewire:response', hideSpinner);
})();
</script>

</body>
</html>