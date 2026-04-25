<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin –  Cựu sinh viên #VNUA</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])   
 @livewireStyles
    <!-- <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', system-ui, sans-serif; background: #0f172a; min-height: 100vh; }
        a { text-decoration: none; }

        /* ── LAYOUT ── */
        .adm-layout {
            display: flex;
            min-height: 100vh;
        }

        /* ══════════ SIDEBAR ══════════ */
        .adm-sb {
            width: 220px;
            flex-shrink: 0;
            background: #0f172a;
            border-right: 1px solid #1e293b;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        /* brand */
        .adm-brand {
            padding: 1.25rem 1.25rem 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid #1e293b;
        }
        .adm-brand-dot {
            width: 30px; height: 30px;
            border-radius: 9px;
            background: #1d4ed8;
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; flex-shrink: 0;
        }
        .adm-brand-name { font-size: 14px; font-weight: 700; color: #f1f5f9; line-height: 1.2; }
        .adm-brand-sub  { font-size: 10px; color: #475569; margin-top: 1px; }

        /* nav section title */
        .adm-sec {
            padding: .875rem 1.25rem .35rem;
            font-size: 10px; font-weight: 700;
            letter-spacing: .09em; text-transform: uppercase;
            color: #334155;
        }

        /* nav item */
        .adm-item {
            margin: 1px .75rem;
            padding: 8px 10px;
            border-radius: 9px;
            font-size: 13px; color: #64748b;
            cursor: pointer;
            display: flex; align-items: center; gap: 9px;
            transition: all .15s;
            text-decoration: none;
        }
        .adm-item:hover { color: #94a3b8; background: #1e293b; }
        .adm-item.active { background: #1e3a5f; color: #60a5fa; font-weight: 600; }
        .adm-item-ic { font-size: 15px; width: 18px; text-align: center; flex-shrink: 0; }
        .adm-item-badge {
            margin-left: auto;
            font-size: 10px; font-weight: 700;
            padding: 2px 7px; border-radius: 20px;
            background: #92400e22; color: #fbbf24;
        }
        .adm-item-badge.blue { background: #1e3a5f; color: #60a5fa; }

        /* divider */
        .adm-div { height: 1px; background: #1e293b; margin: .5rem .75rem; }

        /* footer user */
        .adm-foot {
            margin-top: auto;
            padding: 1rem 1.25rem;
            border-top: 1px solid #1e293b;
        }
        .adm-user {
            display: flex; align-items: center; gap: 10px;
            padding: 8px 10px; border-radius: 9px;
            cursor: pointer; transition: background .15s;
        }
        .adm-user:hover { background: #1e293b; }
        .adm-uava {
            width: 30px; height: 30px; border-radius: 50%;
            background: #1d4ed8; color: #fff;
            font-size: 11px; font-weight: 700;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .adm-uname { font-size: 12px; color: #94a3b8; font-weight: 600; }
        .adm-urole { font-size: 10px; color: #475569; margin-top: 1px; }
        .adm-logout {
            display: flex; align-items: center; gap: 8px;
            padding: 7px 10px; border-radius: 8px;
            font-size: 12px; color: #475569;
            cursor: pointer; margin-top: 4px;
            transition: all .15s;
        }
        .adm-logout:hover { color: #f87171; background: #1e293b; }

        /* ══════════ MAIN ══════════ */
        .adm-main {
            flex: 1;
            background: #f8fafc;
            overflow-y: auto;
            min-width: 0;
        }

        /* topbar */
        .adm-topbar {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: .875rem 1.75rem;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 40;
        }
        .adm-topbar-title { font-size: 15px; font-weight: 700; color: #0f172a; }
        .adm-topbar-sub   { font-size: 12px; color: #64748b; margin-top: 2px; }
        .adm-topbar-right { display: flex; align-items: center; gap: 10px; }
        .adm-notif {
            width: 34px; height: 34px; border-radius: 9px;
            border: 1px solid #e2e8f0; background: transparent;
            cursor: pointer; font-size: 15px;
            display: flex; align-items: center; justify-content: center;
            color: #64748b; position: relative;
        }
        .adm-notif:hover { background: #f8fafc; }
        .adm-notif-dot {
            position: absolute; top: 6px; right: 7px;
            width: 7px; height: 7px; border-radius: 50%;
            background: #dc2626; border: 1.5px solid #fff;
        }
        
   
    </style>
</head>
<body>

<div class="adm-layout">

    {{-- ══════════ SIDEBAR ══════════ --}}
    <aside class="adm-sb">

        {{-- Brand --}}
        <div class="adm-brand">
            <div class="adm-brand-dot">🎓</div>
            <div>
                <div class="adm-brand-name"> Cựu sinh viên VNUA</div>
                <div class="adm-brand-sub">Admin portal</div>
            </div>
            
        </div>
            <a href="{{ route('csv') }}"class="adm-item adm-back"><span class="adm-item-ic">←</span>Trang người dùng</a>
        {{-- Nav --}}
        <div class="adm-sec">Quản lý</div>

        <a href="{{ route('admin') }}"
           class="adm-item {{ request()->routeIs('admin.students') ? 'active' : '' }}">
            <span class="adm-item-ic" data-lucide="layout-dashboard"></span>
            Dashboard
        </a>

        <a href="{{ route('admin.csv') }}"
           class="adm-item {{ request()->routeIs('admin.alumni') ? 'active' : '' }}">
            <span class="adm-item-ic" data-lucide="graduation-cap"></span>
            Cựu sinh viên
            @php $pendingAlumni = 0; @endphp
            @if($pendingAlumni > 0)
                <span class="adm-item-badge">{{ $pendingAlumni }}</span>
            @endif
        </a>

        <a href="{{ route('admin.job') }}"
           class="adm-item {{ request()->routeIs('admin.jobs') ? 'active' : '' }}">
            <span class="adm-item-ic" data-lucide="briefcase"></span>
            Tuyển dụng
        </a>

        <a href="{{ route('admin.company') }}"
           class="adm-item {{ request()->routeIs('admin.companies') ? 'active' : '' }}">
            <span class="adm-item-ic" data-lucide="building-2"></span>
            Doanh nghiệp
        </a>
        <a href="{{ route('admin.post') }}"
            class="adm-item {{ request()->routeIs('admin.post') ? 'active' : '' }}">
            <span class="adm-item-ic" data-lucide="file-text"></span>
    Bài viết
</a>

        <div class="adm-div"></div>
        <div class="adm-sec">Hệ thống</div>

        <a href="{{ route('admin.thongk') }}"
           class="adm-item {{ request()->routeIs('admin.stats') ? 'active' : '' }}">
            <span class="adm-item-ic" data-lucide="bar-chart-3"></span> 
            Thống kê
        </a>

        {{-- Footer --}}
        <div class="adm-foot">
            <div class="adm-user">
                <div class="adm-uava">{{ auth()->user()?->initials ?? 'AD' }}</div>
                <div>
                    <div class="adm-uname">{{ auth()->user()?->name ?? 'Admin' }}</div>
                    <div class="adm-urole">Quản trị viên</div>
                </div>
            </div>
            <form action="#" method="POST">
                @csrf
                <button type="submit" class="adm-logout" style="border:none;width:100%;text-align:left;font-family:inherit">
                    ← Đăng xuất
                </button>
            </form>
        </div>

    </aside>

    {{-- ══════════ MAIN ══════════ --}}
    <div class="adm-main">
        {{ $slot }}

    </div>

</div>

@livewireScripts
</body>
</html>