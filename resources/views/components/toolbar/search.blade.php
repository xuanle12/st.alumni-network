@props([
    'placeholder' => 'Tìm kiếm...',
    'model'       => 'search',
])

<div class="adm-tb-search">
    <i class="fa-solid fa-magnifying-glass adm-tb-search-ic"></i>
    <input
        type="text"
        wire:model.live.debounce.300ms="{{ $model }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes }}
    >
</div>
