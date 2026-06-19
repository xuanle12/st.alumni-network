@props([
    'placeholder' => '',
    'model'       => 'search',
])

<div class="adm-tb-search adm-tb-search--inline">
    <i class="fa-solid fa-magnifying-glass adm-tb-search-ic"></i>
    <input
        type="text"
        wire:model.live.debounce.300ms="{{ $model }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes }}
    >
</div>
