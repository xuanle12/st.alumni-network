@props([
    'field'   => 'filterStatus',
    'current' => '',
    'tabs'    => [],
])
{{--
    Tab lọc trạng thái dạng pill (giống trang Tuyển dụng / Sự kiện).
    $tabs: mảng các phần tử ['value'=>, 'label'=>, 'count'=>null, 'color'=>'blue|amber|red|gray']
--}}
@php
    $palette = [
        'blue'  => ['#0961aa', '#eff6ff'],
        'amber' => ['#d97706', '#fffbeb'],
        'red'   => ['#dc2626', '#fef2f2'],
        'gray'  => ['#475569', '#f1f5f9'],
    ];
@endphp
<div style="display:flex;gap:6px;margin-bottom:1rem;flex-wrap:wrap">
    @foreach($tabs as $t)
        @php
            $c        = $palette[$t['color'] ?? 'blue'] ?? $palette['blue'];
            $isActive = (string) $current === (string) $t['value'];
            $bd       = $isActive ? $c[0] : '#e5e7eb';
            $bg       = $isActive ? $c[1] : '#fff';
            $fg       = $isActive ? $c[0] : '#6b7280';
        @endphp
        <button wire:click="$set('{{ $field }}', '{{ $t['value'] }}')"
            style="padding:6px 14px;border-radius:20px;font-size:12.5px;font-weight:600;cursor:pointer;font-family:inherit;border:1.5px solid {{ $bd }};background:{{ $bg }};color:{{ $fg }};display:inline-flex;align-items:center;gap:6px;transition:.15s">
            {{ $t['label'] }}
            @if(isset($t['count']) && $t['count'] > 0)
                <span style="background:{{ $c[0] }};color:#fff;border-radius:10px;padding:1px 7px;font-size:11px;line-height:1.6">{{ $t['count'] }}</span>
            @endif
        </button>
    @endforeach
</div>
