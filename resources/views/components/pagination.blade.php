@if ($paginator->hasPages())
    <div class="flex flex-col items-center mt-6 space-y-2">
        <nav class="flex items-center gap-1">
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-md">
                    <i class="bi bi-arrow-left"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-3 py-2 text-white bg-[#6c0ba9] rounded-md hover:bg-[#880ed4]">
                    <i class="bi bi-arrow-left"></i>
                </a>
            @endif
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-2 text-white bg-[#6c0ba9] rounded-md">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="px-3 py-2 border rounded-md hover:bg-gray-100">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-3 py-2 text-white bg-[#6c0ba9] rounded-md hover:bg-[#880ed4]">
                    <i class="bi bi-arrow-right"></i>
                </a>
            @else
                <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-md">
                    <i class="bi bi-arrow-right"></i>
                </span>
            @endif
        </nav>
        <div class="text-sm text-gray-600">
            Menampilkan
            {{ $paginator->firstItem() }}
            -
            {{ $paginator->lastItem() }}
            dari
            {{ $paginator->total() }}
            data
        </div>
    </div>
@endif