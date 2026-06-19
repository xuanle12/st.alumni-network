@props([
    'empty'    => 'Không có dữ liệu.',
    'minWidth' => '620px',
    'bare'     => false,
])

@if(!$bare)
<div class="adm-tcard">
@endif

    <div class="adm-tscroll">
        <table class="adm-tbl" style="min-width:{{ $minWidth }}">
            @isset($heading)
            <thead>
                <tr>{{ $heading }}</tr>
            </thead>
            @endisset

            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>

    @isset($pagination)
    <div class="adm-tpgn">
        @isset($paginationInfo)
            <span>{{ $paginationInfo }}</span>
        @else
            <span></span>
        @endisset
        {{ $pagination }}
    </div>
    @endisset

@if(!$bare)
</div>
@endif
