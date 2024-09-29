@extends('layouts.app')

@section('content')

<section class="banner-section">
    <div class="banner-slider">


        @foreach($banners as $banner)
        <div class="sinlge-banner">
            <div class="banner-wrapper">
                <div class="banner-bg" style="background-image: url('{{ asset('storage/images/' . $banner->image) }}');"></div> <!-- Resim yolu -->
                <div class="banner-content" data-animation="fadeInUp" data-delay="0.3s">
                    <h3 class="title" data-animation="fadeInUp" data-delay="0.6s">
                        <a href="{{ route('posts.show', $banner->slug) }}">
                            {{ $banner->title }}
                        </a>
                    </h3>
                    <ul class="meta" data-animation="fadeInUp" data-delay="0.8s">
                        <li><a href="#">By - {{ $banner->user->name }}</a></li> <!-- Yazarın adı -->
                        <li>
                            <a href="#">{{ $banner->category->name }}</a> <!-- Kategori adı -->
                        </li>
                    </ul>
                    <p data-animation="fadeInUp" data-delay="1s">
                        {{ Str::limit($banner->content, 150) }} <!-- Kısa açıklama -->
                    </p>
                    <a href="{{ route('posts.show', $banner->slug) }}" class="read-more" data-animation="fadeInUp" data-delay="1.2s">
                        Devamını Oku <i class="fas fa-long-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach



    </div>
    <div class="banner-nav"></div>
</section>
<!--====== Banner Area End ======-->

<!--====== Post Area Start ======-->
<section class="post-area with-sidebar" id="postWarpperLoaded">
    <div class="container container-1250">
        <div class="post-area-inner">
            <div class="entry-posts two-column masonary-posts row">
                @foreach ($posts as $post)
                <div class="col-lg-6 col-sm-6">
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


                <div class="col-12">
                    <div class="text-center">
                        <a href="{{ route('posts.index') }}" class="load-more-btn">Tümünü Görüntüle</a>
                    </div>
                </div>
            </div>
            <div class="primary-sidebar clearfix">
                <div class="sidebar-masonary row justify-content-center">
                    <div class="col-lg-12 col-md-6 col-sm-8 widget social-widget">
                        <h5 class="widget-title">Sosyal Medya</h5>
                        <div class="social-links">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>Facebook
                            </a>
                            <a href="#">
                                <i class="fab fa-twitter"></i>Twitter
                            </a>
                            <a href="#">
                                <i class="fab fa-instagram"></i>Instagram
                            </a>
                            <a href="#">
                                <i class="fab fa-youtube"></i>YouTube
                            </a>
                            <a href="#">
                                <i class="fab fa-pinterest-p"></i>Pinterest
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-8 widget popular-articles">
                        <h5 class="widget-title">En Çok Okunanlar</h5>
                        <div class="articles">

                            @foreach($popularPosts as $post)
                            <div class="article">
                                <div class="thumb">
                                    @if($post->image)
                                    <img src="{{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}">
                                    @else
                                    <img src="{{ asset('images/nofoto.webp') }}" alt="No Image">
                                    @endif
                                </div>
                                <div class="desc">
                                    <h6><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h6>
                                    <span class="post-date">{{ $post->created_at->format('F d, Y') }}</span>
                                    <span class="post-views">{{ $post->views }} görüntüleme</span> <!-- Görüntüleme sayısını göster -->
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection