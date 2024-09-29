<div class="product-pagination">
    <ul>
        {{-- Önceki Sayfa Bağlantısı --}}
        @if ($posts->onFirstPage())
            <li class="disabled"><span>&laquo; Önceki</span></li>
        @else
            <li><a href="{{ $posts->previousPageUrl() }}">&laquo; Önceki</a></li>
        @endif

        {{-- Sayfa Bağlantıları --}}
        @foreach ($posts as $post)
            <li>
                <a href="{{ $post->url }}">{{ $post->currentPage() }}</a>
            </li>
        @endforeach

        {{-- Sonraki Sayfa Bağlantısı --}}
        @if ($posts->hasMorePages())
            <li><a href="{{ $posts->nextPageUrl() }}">Sonraki &raquo;</a></li>
        @else
            <li class="disabled"><span>Sonraki &raquo;</span></li>
        @endif
    </ul>
</div>
