<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – Cựu sinh viên FITA-VNUA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
</head>
<body class="adm">

<div id="toaster" role="status" aria-live="polite"></div>

{{-- Page Loader --}}
<div id="page-loader"><div id="page-loader-bar"></div></div>
<div id="req-spinner" aria-hidden="true">
  <svg viewBox="0 0 24 24" fill="none" stroke="var(--primary)" stroke-width="2.5" stroke-linecap="round">
    <path d="M12 2a10 10 0 1 0 10 10" />
  </svg>
</div>

<div id="overlay" class="adm-overlay" onclick="toggleSidebar()"></div>

<div class="adm-layout">

    {{-- ════ SIDEBAR ════ --}}
    <aside id="sidebar" class="adm-sb">

        <a href="{{ route('admin') }}" class="adm-brand" wire:navigate>
            <img src="{{ asset('img/fita-logo.png') }}" alt="Logo" loading="lazy">
            <div>
                <div class="adm-brand-name">Bảng điều khiển</div>
                <div class="adm-brand-sub">FITA · VNUA</div>
            </div>
        </a>

        <div class="adm-sec">Quản lý</div>

        <a href="{{ route('admin') }}" class="adm-item {{ request()->routeIs('admin') ? 'active' : '' }}" wire:navigate>
            <i class="fa-solid fa-gauge adm-item-ic"></i> Bảng điều khiển
        </a>
        <a href="{{ route('admin.user') }}" class="adm-item {{ request()->routeIs('admin.user*') ? 'active' : '' }}" wire:navigate>
            <i class="fa-solid fa-users adm-item-ic"></i> Người dùng
        </a>
        <a href="{{ route('admin.csv') }}" class="adm-item {{ request()->routeIs('admin.csv*') ? 'active' : '' }}" wire:navigate>
            <i class="fa-solid fa-graduation-cap adm-item-ic"></i> Cựu sinh viên
        </a>
        <a href="{{ route('admin.job') }}" class="adm-item {{ request()->routeIs('admin.job*') ? 'active' : '' }}" wire:navigate>
            <i class="fa-solid fa-briefcase adm-item-ic"></i> Tuyển dụng
        </a>
        <a href="{{ route('admin.company') }}" class="adm-item {{ request()->routeIs('admin.company*') ? 'active' : '' }}" wire:navigate>
            <i class="fa-solid fa-building adm-item-ic"></i> Doanh nghiệp
        </a>
        <a href="{{ route('admin.post') }}" class="adm-item {{ request()->routeIs('admin.post*') ? 'active' : '' }}" wire:navigate>
            <i class="fa-solid fa-file-lines adm-item-ic"></i> Bài viết
        </a>
        <a href="{{ route('admin.mentor') }}" class="adm-item {{ request()->routeIs('admin.mentor*') ? 'active' : '' }}" wire:navigate>
            <i class="fa-solid fa-user-tie adm-item-ic"></i> Mentor
        </a>

        <div class="adm-div"></div>
        <div class="adm-sec">Hệ thống</div>

        <a href="{{ route('admin.thongk') }}" class="adm-item {{ request()->routeIs('admin.thongk*') ? 'active' : '' }}" wire:navigate>
            <i class="fa-solid fa-chart-bar adm-item-ic"></i> Thống kê
        </a>

    </aside>

    {{-- ════ MAIN ════ --}}
    <div class="adm-main">

        @php
            $adminPages = [
                'admin.user'    => 'Người dùng',
                'admin.csv'     => 'Cựu sinh viên',
                'admin.job'     => 'Tuyển dụng',
                'admin.company' => 'Doanh nghiệp',
                'admin.post'    => 'Bài viết',
                'admin.mentor'  => 'Mentor',
                'admin.thongk'  => 'Thống kê',
                'admin'         => 'Bảng điều khiển',
            ];
            $pageLabel = 'Bảng điều khiển';
            foreach ($adminPages as $routeKey => $label) {
                if (request()->routeIs($routeKey . '*')) {
                    $pageLabel = $label; break;
                }
            }
            $isDashboard = $pageLabel === 'Bảng điều khiển';
        @endphp

        {{-- Topbar trắng --}}
        <header class="adm-topbar">
            <div class="adm-topbar-left">
                <button class="adm-menu-btn" onclick="toggleSidebar()" aria-label="Mở menu" type="button">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div class="adm-topbar-right">
                <button class="adm-notif" title="Thông báo">
                    <i class="fa-solid fa-bell"></i>
                    <span class="adm-notif-dot"></span>
                </button>
                <div class="adm-topbar-user" id="admUserBtn" onclick="toggleUserMenu()" role="button" tabindex="0">
                    <div class="adm-topbar-uava">{{ strtoupper(substr(auth()->user()?->name ?? 'A', 0, 1)) }}</div>
                    <div class="adm-topbar-uinfo">
                        <div class="adm-topbar-uname">{{ auth()->user()?->name ?? 'Admin' }}</div>
                        <div class="adm-topbar-urole">Quản trị viên</div>
                    </div>
                    <i class="fa-solid fa-chevron-down adm-topbar-chev" id="admUserChev"></i>

                    {{-- Dropdown --}}
                    <div class="adm-user-dropdown" id="admUserDropdown">
                        <div class="adm-udrop-head">
                            <div class="adm-udrop-ava">{{ strtoupper(substr(auth()->user()?->name ?? 'A', 0, 1)) }}</div>
                            <div>
                                <div class="adm-udrop-name">{{ auth()->user()?->name ?? 'Admin' }}</div>
                                <div class="adm-udrop-role">Quản trị viên</div>
                            </div>
                        </div>
                        <div class="adm-udrop-div"></div>
                        <a href="{{ route('profile') }}" class="adm-udrop-item" wire:navigate>
                            <i class="fa-regular fa-user"></i> Hồ sơ cá nhân
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="adm-udrop-item adm-udrop-logout">
                                <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        {{-- Breadcrumb bar --}}
        <div class="adm-breadbar">
            <a href="{{ route('admin') }}" wire:navigate>
                <i class="fa-solid fa-house"></i> Trang quản trị
            </a>
            @if(!$isDashboard)
                <span class="adm-breadbar-sep">/</span>
                <span class="adm-breadbar-cur">{{ $pageLabel }}</span>
            @endif
        </div>

        {{ $slot }}

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
</script>
<script>
function toggleSidebar(){
    const sb = document.getElementById('sidebar');
    const ov = document.getElementById('overlay');
    if (!sb || !ov) return;
    sb.classList.toggle('open');
    ov.classList.toggle('show');
}
function toggleUserMenu(e){
    const btn = document.getElementById('admUserBtn');
    if (!btn) return;
    btn.classList.toggle('open');
}
document.addEventListener('click', (e) => {
    const btn = document.getElementById('admUserBtn');
    if (btn && !btn.contains(e.target)) btn.classList.remove('open');
});
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        const sb = document.getElementById('sidebar');
        if (sb && sb.classList.contains('open')) toggleSidebar();
    }
});
document.addEventListener('livewire:navigated', () => {
    const sb = document.getElementById('sidebar');
    const ov = document.getElementById('overlay');
    if (sb) sb.classList.remove('open');
    if (ov) ov.classList.remove('show');
});
</script>
<script>
(function () {
  var loader  = document.getElementById('page-loader');
  var bar     = document.getElementById('page-loader-bar');
  var spinner = document.getElementById('req-spinner');
  var _prog = 0, _raf;

  function startProgress() {
    if (!loader || !bar) return;
    _prog = 0;
    bar.style.transition = 'none';
    bar.style.width = '0%';
    loader.classList.remove('done');
    loader.classList.add('active');
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
