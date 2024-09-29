@extends('layouts.app')

@section('content')


<section class="post-area with-sidebar" id="postWarpperLoaded">
    <div class="container container-1250">
        <h1>{{ $category->name }} Kategorisi</h1>

        @if ($posts->isEmpty())
        <p>Bu kategoride henüz gönderi yok.</p>
        @else

        <div class="entry-posts row">
            @foreach ($posts as $post)
            <div class="col-lg-3 col-sm-6">
                <div class="entry-post">
                    <div class="entry-thumbnail">
                        @if($post->image)
                        <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}">
                        @else
                        <img src="{{ asset('images/nofoto.webp') }}" alt="No Image">
                        @endif
                    </div>
                    <div class="entry-content">
                        <h4 class="title">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h4>
                        <ul class="post-meta">
                            <li class="date">
                                <a href="#">{{ $post->created_at->format('d.m.Y - H:i') }}</a>
                            </li>
                            <li class="categories">
                                <a href="#">{{ $post->category->name }}</a>
                            </li>
                        </ul>
                        <p>
                            {{ Str::limit($post->content, 100) }}
                        </p>
                        <a href="{{ route('posts.show', $post->slug) }}" class="read-more">
                            Devamını Oku <i class="fas fa-long-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

@endsection