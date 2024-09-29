@extends('layouts.app')

@section('content')

<section class="post-area with-sidebar" id="postWarpperLoaded">
    <div class="container container-1360">
        <h1>KATEGORİLER</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-success mt-3">Yeni Kategori Ekle</a>

        <div class="entry-posts row">
            @foreach ($categories as $category)
            <div class="col-lg-3 col-sm-6">
                <div class="entry-post">
                    <div class="entry-content">
                        <h4 class="">
                            <a href="{{ route('categories.show', $category->slug) }}">
                                {{ $category->name }}
                            </a>
                        </h4>
                        <a href="{{ route('categories.show', $category->slug) }}" class="read-more mb-3">
                            Yazıları Görüntüle <i class="fas fa-long-arrow-right"></i>
                        </a>

                        @auth
                        <div>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Düzenle</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Sil</button>
                            </form>
                        </div>
                        @endauth

                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
