@if ($paginator->hasPages())
<nav class="alumni-pgn" aria-label="Pagination" role="navigation">

    {{-- Prev --}}
    @if ($paginator->onFirstPage())
        <span class="alumni-pgn__btn alumni-pgn__btn--nav alumni-pgn__btn--disabled" aria-disabled="true" aria-label="Trang trước">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
        </span>
    @else
        <button wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                class="alumni-pgn__btn alumni-pgn__btn--nav" rel="prev" aria-label="Trang trước">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
    @endif

    {{-- Page numbers --}}
    @foreach ($elements as $element)

        @if (is_string($element))
            <span class="alumni-pgn__btn alumni-pgn__btn--dots">···</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="alumni-pgn__btn alumni-pgn__btn--active" aria-current="page">{{ $page }}</span>
                @else
                    <button wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                            class="alumni-pgn__btn" aria-label="Trang {{ $page }}">{{ $page }}</button>
                @endif
            @endforeach
        @endif

    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <button wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
                class="alumni-pgn__btn alumni-pgn__btn--nav" rel="next" aria-label="Trang tiếp">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
    @else
        <span class="alumni-pgn__btn alumni-pgn__btn--nav alumni-pgn__btn--disabled" aria-disabled="true" aria-label="Trang tiếp">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </span>
    @endif

</nav>
@endif
