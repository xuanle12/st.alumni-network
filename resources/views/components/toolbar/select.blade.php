@props(['model'])

<select wire:model.live="{{ $model }}" class="adm-tb-sel" {{ $attributes }}>
    {{ $slot }}
</select>
