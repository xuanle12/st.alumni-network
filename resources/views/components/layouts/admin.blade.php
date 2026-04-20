<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin –  Cựu sinh viên #VNUA</title>
@vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
       <a href="{{ route('csv') }}"
   class="adm-item adm-back">

<span class="adm-item-ic">←</span>

Trang người dùng

</a>
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