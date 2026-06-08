<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – Cựu sinh viên VNUA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Barlow', system-ui, sans-serif; background: #f1f5f9; min-height: 100vh; }
        a { text-decoration: none; }

        :root {
            --adm-bg:      #0d223a;
            --adm-bg2:     #252d36;
            --adm-border:  rgba(255,255,255,0.07);
            --adm-text:    rgb(255, 255, 255);
            --adm-text-h:  #fff;
            --adm-active:  rgba(9,97,170,0.35); 
            --adm-active-c:#60a5fa;
            --blue:        #0961AA;
            --blue-light:  #0c83d8;
        }

         .adm-layout { display: flex; min-height: 100vh; }

          .adm-sb {
            width: 290px;
            flex-shrink: 0;
            background: var(--adm-bg);
            border-right: 1px solid var(--adm-border);
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }
        .adm-sb::-webkit-scrollbar { width: 3px; }
        .adm-sb::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 99px; }

         .adm-brand {
            padding: 18px 20px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--adm-border);
            flex-shrink: 0;
        }
        .adm-brand img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            padding: 4px;
        }   
       .adm-brand-name { font-size: 20px; font-weight: 700; color: #fff; line-height: 1.3; }
        .adm-brand-sub  { font-size: 20px; color: var(--adm-text); margin-top: 2px; }

         .adm-back-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 12px 12px 4px;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 20px;
            color: var(--adm-text);
            transition: .15s;
            border: 1px solid var(--adm-border);
        }
        .adm-back-btn:hover { color: var(--adm-text-h); background: var(--adm-bg2); }
        .adm-back-btn i { font-size: 20px; }

         .adm-sec {
            padding: 16px 20px 5px;
            font-size: 20px; font-weight: 700;
            letter-spacing: 1.1px; text-transform: uppercase;
            color: rgba(255,255,255,0.25);
        }

          .adm-item {
            margin: 1px 10px;
            padding: 9px 12px;
            border-radius: 9px;
            font-size: 20px;
            color: var(--adm-text);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all .15s;
        }
        .adm-item:hover { color: var(--adm-text-h); background: var(--adm-bg2); }
        .adm-item.active { background: var(--adm-active); color: var(--adm-active-c); font-weight: 600; }
        .adm-item.active .adm-item-ic { color: var(--adm-active-c); }
        .adm-item-ic { font-size: 25px; width: 18px; text-align: center; flex-shrink: 0; color: rgba(255,255,255,0.35); }
        .adm-item:hover .adm-item-ic { color: rgba(255,255,255,0.7); }
        .adm-item-badge {
            margin-left: auto;
            font-size: 20px; font-weight: 700;
            padding: 2px 7px; border-radius: 20px;
            background: rgba(251,191,36,0.15); color: #fbbf24;
        }
        .adm-item-badge.blue { background: rgba(9,97,170,0.2); color: #60a5fa; }

         .adm-div { height: 1px; background: var(--adm-border); margin: 6px 10px; }

         .adm-foot {
            margin-top: auto;
            padding: 14px 12px 16px;
            border-top: 1px solid var(--adm-border);
            flex-shrink: 0;
        }
        .adm-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 9px;
            cursor: default;
            margin-bottom: 6px;
        }
        .adm-uava {
            width: 50px; 
            height: 50px;
            border-radius: 50%;
            background: var(--blue);
            color: #fff;
            font-size: 20px; font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .adm-uname { font-size: 20px; color: #e2e8f0; font-weight: 600; }
        .adm-urole { font-size: 20px; color: var(--adm-text); margin-top: 1px; }
        .adm-logout {
            display: flex; align-items: center; gap: 8px;
            width: 100%;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 20px;
            color: var(--adm-text);
            background: transparent;
            border: none;
            cursor: pointer;
            font-family: inherit;
            transition: all .15s;
            text-align: left;
        }
        .adm-logout:hover { color: #f87171; background: rgba(248,113,113,0.1); }

         .adm-main { flex: 1; background: #f1f5f9; overflow-y: auto; min-width: 0; }
        .adm-topbar {
            background: var(--adm-bg);
            padding: 0 24px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 40;
            border-bottom: 1px solid var(--adm-border);
        }
        .adm-topbar-left { display: flex; align-items: center; gap: 12px; }
        .adm-topbar-title { font-size: 20px; font-weight: 700; color: #fff; }
        .adm-topbar-sub   { font-size: 20px; color: var(--adm-text); margin-top: 1px; }
        .adm-topbar-right { display: flex; align-items: center; gap: 10px; }

        .adm-notif {
            width: 34px; height: 34px;
            border-radius: 8px;
            border: 1px solid var(--adm-border);
            background: transparent;
            cursor: pointer;
            font-size: 20px;
            display: flex; align-items: center; justify-content: center;
            color: var(--adm-text);
            position: relative;
            transition: .15s;
        }
        .adm-notif:hover { background: var(--adm-bg2); color: #fff; }
        .adm-notif-dot {
            position: absolute; top: 6px; right: 7px;
            width: 7px; height: 7px;
            border-radius: 50%;
            background: #dc2626;
            border: 1.5px solid var(--adm-bg);
        }
        .adm-topbar-user {
            display: flex; align-items: center; gap: 8px;
            padding: 5px 10px;
            border-radius: 8px;
            border: 1px solid var(--adm-border);
            cursor: pointer;
            transition: .15s;
        }
        .adm-topbar-user:hover { background: var(--adm-bg2); }
        .adm-topbar-uname { font-size: 20px; color: #e2e8f0; font-weight: 600; }

        .adm-menu-btn {
            display: none;
            font-size: 18px;
            background: none;
            border: none;
            cursor: pointer;
            color: var(--adm-text);
            padding: 6px;
            border-radius: 6px;
            transition: .15s;
        }
        .adm-menu-btn:hover { color: #fff; background: var(--adm-bg2); }

         .adm-flash {
            position: fixed;
            top: 68px; right: 16px;
            z-index: 200;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #16a34a;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 20px;
            color: #0f172a;
            box-shadow: 0 6px 24px rgba(15,23,42,0.12);
            display: flex; align-items: center; gap: 10px;
            max-width: calc(100vw - 32px);
        }
        .adm-flash.is-info  { border-left-color: var(--blue); }
        .adm-flash.is-error { border-left-color: #dc2626; }
        .adm-flash button { background: transparent; border: none; cursor: pointer; font-size: 16px; color: #64748b; line-height: 1; }

         .adm-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 90; display: none; }
        .adm-overlay.show { display: block; }

         @media (max-width: 1024px) {
            .adm-sb {
                position: fixed;
                left: -260px;
                top: 0; height: 100%;
                z-index: 100;
                transition: left .25s ease;
            }
            .adm-sb.open { left: 0; }
            .adm-main { width: 100%; }
            .adm-menu-btn { display: flex; align-items: center; justify-content: center; }
        }

        a:focus-visible, button:focus-visible {
            outline: 2px solid var(--blue);
            outline-offset: 2px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

 @if(session('success') || session('info') || session('error'))
    @php
        $flashType = session('error') ? 'is-error' : (session('info') ? 'is-info' : '');
        $flashMsg  = session('error') ?? session('info') ?? session('success');
    @endphp
    <div class="adm-flash {{ $flashType }}" role="status" aria-live="polite" id="admFlash">
        <span>{{ $flashMsg }}</span>
        <button type="button" aria-label="Đóng" onclick="this.parentNode.remove()">✕</button>
    </div>
    <script>setTimeout(() => { const t=document.getElementById('admFlash'); if(t) t.remove(); }, 4000);</script>
@endif

<div id="overlay" class="adm-overlay" onclick="toggleSidebar()"></div>

<div class="adm-layout">

    <aside id="sidebar" class="adm-sb">

        <div class="adm-brand">
      <img src="{{ asset('img/fita-logo.png') }}" alt="{{ config('admin.name') }}" loading="lazy">
            <div>
                <div class="adm-brand-name">Trang quản trị</div>
            </div>
        </div>

        <a href="{{ route('csv') }}" class="adm-back-btn" wire:navigate>
            <i class="fa-solid fa-arrow-left"></i>
            Trang người dùng
        </a>

        <div class="adm-sec">Quản lý</div>

        <a href="{{ route('admin') }}" class="adm-item {{ request()->routeIs('admin') ? 'active' : '' }}" wire:navigate>
            <i class="fa-solid fa-gauge adm-item-ic"></i> Dashboard
        </a>
        <a href="{{ route('admin.user') }}" class="adm-item {{ request()->routeIs('admin.user') ? 'active' : '' }}" wire:navigate>
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

       
        <div class="adm-foot">
            <div class="adm-user">
                <div class="adm-uava">{{ auth()->user()?->initials ?? 'AD' }}</div>
                <div>
                    <div class="adm-uname">{{ auth()->user()?->name ?? 'Admin' }}</div>
                    <div class="adm-urole">Quản trị viên</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Đăng xuất?')">
                @csrf
                <button type="submit" class="adm-logout">
                    <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                </button>
            </form>
        </div>

    </aside>

     <div class="adm-main">

        <div class="adm-topbar">
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
                <a href="{{ route('csv') }}" class="adm-topbar-user" wire:navigate>
                    <div class="adm-uava" style="width:28px;height:28px;font-size:10px">{{ auth()->user()?->initials ?? 'AD' }}</div>
                    <span class="adm-topbar-uname">{{ auth()->user()?->name ?? 'Admin' }}</span>
                </a>
            </div>
        </div>

        {{ $slot }}

    </div>
</div>

@livewireScripts
<script>
function toggleSidebar(){
    const sb = document.getElementById('sidebar');
    const ov = document.getElementById('overlay');
    if (!sb || !ov) return;
    sb.classList.toggle('open');
    ov.classList.toggle('show');
}
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
</body>
</html>