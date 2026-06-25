@props([])

<div class="adm-tb-card" {{ $attributes }}>
    @isset($search)
        <div class="adm-tb-search-wrap">{{ $search }}</div>
    @endisset
    @if ($slot->isNotEmpty())
        <div class="adm-tb-filters">{{ $slot }}</div>
    @endif
    @isset($perPage)
        <div class="adm-tb-per-wrap">{{ $perPage }}</div>
    @endisset
</div>
