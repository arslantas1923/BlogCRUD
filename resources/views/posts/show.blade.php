@extends('layouts.app')

@section('content')
<section class="post-details-area">
    <div class="container container-1000">
        <div class="post-details">
            <div class="entry-header">
                <h2 class="title">{{ $post->title }}</h2>
                <ul class="post-meta">
                    <li>Görüntülenme: {{ $post->views }} kez</li>
                    <li>Kategori: <a href="#">{{ $post->category->name }}</a></li>
                </ul>
                <p class="short-desc">
                    {!! nl2br(e($post->content)) !!}
                </p>
            </div>
            <div class="entry-media text-center">
                @if($post->image)
                <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}">
                @else
                <img src="{{ asset('images/nofoto.webp') }}" alt="No Image">
                @endif
            </div>
            <div class="entry-content">
                <p>{!! nl2br(e($post->content)) !!}</p>
            </div>
            <div class="entry-footer">
                <div class="post-action">
                    @if(auth()->user() && auth()->user()->superadmin) <!-- Süper admin kontrolü -->
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Düzenle</a>
                    <form action="{{ route('posts.destroy', $post->slug) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Sil</button>
                    </form>
                    @endif
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Geri Dön</a>
                </div>
            </div>
            <div class="related-posts">
                <h4 class="related-title">İlgili Postlar</h4>
                <div class="related-loop row justify-content-center">
                    @foreach($relatedPosts as $relatedPost)
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="related-post-box">
                            <div class="thumb">
                                @if($relatedPost->image)
                                <img src="{{ asset('storage/images/' . $relatedPost->image) }}" alt="{{ $relatedPost->image }}">
                                @else
                                <img src="{{ asset('images/nofoto.webp') }}" alt="No Image">
                                @endif
                            </div>
                            <h5 class="title">
                                <a href="{{ route('posts.show', $relatedPost->slug) }}">{{ $relatedPost->title }}</a>
                            </h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    </div>
</section>
@endsection