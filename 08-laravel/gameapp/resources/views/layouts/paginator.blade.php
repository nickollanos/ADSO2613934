{{-- @if ($paginator->hasPages()) --}}
    {{-- <nav>
        <ul class="pagination"> --}}
            {{-- Previous Page Link --}}
            {{-- @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
            @endif --}}

            {{-- Next Page Link --}}
            {{-- @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
@endif --}}
{{-- @if ($paginator->hasPages())
            Previous Page Link 
            @if ($paginator->onFirstPage())
                <a class="arrow-left" href="javascript:;" style="opacity: 0.4; cursor:default">
                    <img src="{{asset('images/btn-prev.svg')}}" alt="Prev">
                </a>
            @else
                <a class="arrow-left" href="{{ $paginator->previousPageUrl() }}">
                    <img src="{{ asset('images/btn-prev.svg')}}" alt="Prev">
                </a>                
            @endif
            <h4>{{ $paginator->currentPage() .'/'. $paginator->lastPage() }}</h4>
            Next Page Link 
            @if ($paginator->hasMorePages())
                <a class="arrow-right" href="{{ $paginator->nextPageUrl() }}">
                    <img src="{{ asset('images/btn-next.svg')}}" alt="Next"> 
                </a>
            @else
                <a class="arrow-right" href="javascript:;" style="opacity: 0.4; cursor:default">
                    <img src="{{ asset('images/btn-next.svg') }}" alt="Next"> 
                </a>
            @endif
@endif--}}

@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span></span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{--{{ $element }}--}}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{--{{ $page }}--}}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{--{{ $page }}--}}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"></a></li>
        @else
            <li class="disabled"><span></span></li>
        @endif
    </ul>
@endif
