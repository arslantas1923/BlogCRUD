@extends('layouts.app')

@section('content')
<section class="shop-wrapper section-gap-80-120">
    <div class="container-fluid">
        <div class="product-top">
            <div class="row">
                <div class="col-sm-6">
                    <div class="shop-page-title">
                        <h2>YAZILAR</h2>
                        <p>Toplam {{ $posts->total() }} Blogtan {{ $posts->count() }} tanesi görüntüleniyor.</p>
                        <a href="{{ route('posts.create') }}" class="btn btn-success mt-3">Yeni Yazı Ekle</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area">
            <div class="product-loop row justify-content-center">

                @foreach ($posts as $post)
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-product">
                        <div class="product-thumb">
                            <img src="{{ $post->image ? asset('storage/images/' . $post->image) : asset('images/nofoto.webp') }}" alt="{{ $post->title }}">
                            <div class="more-btn">
                                <a href="{{ route('posts.show', $post->slug) }}" class="more-link">Devamını Oku</a>
                            </div>
                        </div>
                        <h5 class="title"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h5>
                        <hr>
                        @if(auth()->user() && auth()->user()->superadmin) <!-- Süper admin kontrolü -->
                        <div class="product-action">
                            <div class="hover-icon">
                                <a href="{{ route('posts.edit', $post->id) }}" class="price">Düzenle</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="add-to-cart">Sil</button>
                                </form>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach

            </div>
            <div class="product-pagination">
                <ul>
                    {{-- Önceki Sayfa Bağlantısı --}}
                    @if ($posts->onFirstPage())
                    <li class="disabled"><span>&lt;</span></li>
                    @else
                    <li><a href="{{ $posts->previousPageUrl() }}">&lt;</a></li>
                    @endif

                    {{-- Sayfa Bağlantıları --}}
                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                        <li class="{{ $i == $posts->currentPage() ? 'active' : '' }}">
                            <a href="{{ $posts->url($i) }}">{{ $i }}</a>
                        </li>
                        @endfor

                        {{-- Sonraki Sayfa Bağlantısı --}}
                        @if ($posts->hasMorePages())
                        <li><a href="{{ $posts->nextPageUrl() }}">&gt;</a></li>
                        @else
                        <li class="disabled"><span>&gt;</span></li>
                        @endif
                </ul>
            </div>

        </div>
    </div>
</section>
@endsection