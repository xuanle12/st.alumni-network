@props([
    'model'   => 'perPage',
    'options' => [10, 20, 50],
])

<div class="adm-tb-per">
    <span class="adm-tb-per__ic">
        <i class="fa-solid fa-table-list"></i>
    </span>
    <select wire:model.live="{{ $model }}">
        @foreach($options as $n)
            <option value="{{ $n }}">{{ $n }}</option>
        @endforeach
    </select>
    <span class="adm-tb-per__lbl">/ trang</span>
</div>
