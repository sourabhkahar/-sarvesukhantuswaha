@if ($paginator->hasPages())
   <div class="datatable-info">
        {!! __('Showing') !!}
        @if ($paginator->firstItem())
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
        @else
            {{ $paginator->count() }}
        @endif
        {!! __('of') !!}
        <span class="font-medium">{{ $paginator->total() }}</span>
        {!! __('entries') !!}
    </div>
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="datatable-pagination">
        <ul class="datatable-pagination-list">

            @if ($paginator->onFirstPage())
                <li class="datatable-pagination-list-item datatable-hidden datatable-disabled">
                    <a class="datatable-pagination-list-item-link">‹</a>
                 </li>
            @else
                <li class="datatable-pagination-list-item ">
                    <a href="{{ $paginator->previousPageUrl() }}" class="datatable-pagination-list-item-link" wire:navigate>‹</a>
                </li>
            @endif

            {{-- @if ($paginator->hasMorePages())
             
                    <li class="datatable-pagination-list-item">
                        <a href="{{ $paginator->nextPageUrl() }}" class="datatable-pagination-list-item-link">
                            ›
                        </a>
                    </li>
            @else
                <li class="datatable-pagination-list-item"><a class="datatable-pagination-list-item-link">›</a></li>
            @endif
           --}}

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-300 cursor-default dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
                    </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="datatable-pagination-list-item datatable-active"><a class="datatable-pagination-list-item-link">{{ $page }}</a></li>
                        @else
                            <li class="datatable-pagination-list-item"><a  href="{{ $url }}"  class="datatable-pagination-list-item-link" wire:navigate>{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="datatable-pagination-list-item"><a  href="{{ $paginator->nextPageUrl() }}" class="datatable-pagination-list-item-link" wire:navigate>›</a></li>
            @else
                <li class="datatable-pagination-list-item datatable-hidden datatable-disabled"><a class="datatable-pagination-list-item-link">›</a></li> 
            @endif
        </ul>
    </nav>
@endif