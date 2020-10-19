@php
	$current = $pages->currentPage();

	$rangeStart = $current - 2;
	$rangeEnd = $current + 2;

	$pageLength = ceil($pages->total() / $pages->perPage());

	$range = 5;
@endphp

<div class="pagination @if($pages->total() > $pages->perPage()) show @endif">
    <a href="{{ $pages->previousPageUrl() }}" class="pagination-item pagination-item-prev btn" role="button" @if($pages->currentPage() == 1) style="display: none;" @endif>
        <i class="els el-caret-left"></i> {{ trans('lang.prev') }}
    </a>

    @if($pageLength > $range)
        @if($rangeStart <= 1)
            @for ($i = 1; $i <= $rangeEnd; $i++)
                <a href="{{ $pages->url($i) }}" class="pagination-item btn @if($pages->currentPage() == $i) active @endif" role="button">
                    {{ $i }}
                </a>
            @endfor

            <a href="#" class="pagination-item btn disabled" role="button" disabled>...</a>

            <a href="{{ $pages->url($pageLength) }}" class="pagination-item btn" role="button">
                {{ $pageLength }}
            </a>
        @elseif($rangeStart > 1 && $rangeEnd < $pageLength)
            <a href="{{ $pages->url(1) }}" class="pagination-item btn" role="button">
                1
            </a>

            <a href="#" class="pagination-item btn disabled" role="button" disabled>...</a>

            @for($i = $rangeStart; $i <= $rangeEnd; $i++)
                <a href="{{ $pages->url($i) }}" class="pagination-item btn @if($pages->currentPage() == $i) active @endif" role="button">
                    {{ $i }}
                </a>
            @endfor

            <a href="#" class="pagination-item btn disabled" role="button" disabled>...</a>

            <a href="{{ $pages->url($pageLength) }}" class="pagination-item btn" role="button">
                {{ $pageLength }}
            </a>
        @elseif($rangeEnd >= $pageLength)
            <a href="{{ $pages->url(1) }}" class="pagination-item btn" role="button">
                1
            </a>

            <a href="#" class="pagination-item btn disabled" role="button" disabled>...</a>

            @for ($i = $rangeStart; $i <= $pageLength; $i++)
                <a href="{{ $pages->url($i) }}" class="pagination-item btn @if($pages->currentPage() == $i) active @endif" role="button">{{ $i }}</a>
            @endfor
        @endif
    @else
        @for ($i = 1; $i <= $pageLength; $i++)
            <a href="{{ $pages->url($i) }}" class="pagination-item btn @if($pages->currentPage() == $i) active @endif" role="button">{{ $i }}</a>
        @endfor
    @endif

    <a href="{{ $pages->nextPageUrl() }}" class="pagination-item pagination-item-next btn" role="button" @if($pages->currentPage() == $pageLength) style="display: none;" @endif>
        {{ trans('lang.next') }} <i class="els el-caret-right"></i>
    </a>
</div>