{{-- x-table.action-btn: dropdown 3-chấm cho mỗi hàng bảng --}}
{{-- Usage:
    <x-table.action-btn>
        <div class="adm-dd-item green" wire:click="openEdit({{ $row->id }})">
            <span class="adm-dd-ic"><i class="fa-solid fa-pen-to-square"></i></span> Chỉnh sửa
        </div>
        <div class="adm-dd-sep"></div>
        <div class="adm-dd-item red" wire:click="confirmDelete({{ $row->id }})">
            <span class="adm-dd-ic"><i class="fa-solid fa-trash"></i></span> Xóa
        </div>
    </x-table.action-btn>
--}}

<div class="adm-dot-wrap"
     x-data="{ open: false }"
     @click.away="open = false">

    <button class="adm-dot-btn"
            @click="
                open = !open;
                if (open) {
                    const rect = $el.getBoundingClientRect();
                    const dd   = $el.nextElementSibling;
                    dd.style.top  = (rect.bottom + 6) + 'px';
                    dd.style.left = (rect.right - 180) + 'px';
                    if (window.innerHeight - rect.bottom < 180) {
                        dd.style.top = (rect.top - dd.offsetHeight - 6) + 'px';
                    }
                }
            ">
        <span></span><span></span><span></span>
    </button>

    <div class="adm-dropdown" :class="{ open: open }" @click="open = false">
        {{ $slot }}
    </div>
</div>
