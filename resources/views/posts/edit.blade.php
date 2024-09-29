@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gönderiyi Düzenle</h1>
    <div class="col-lg-12 col-md-12">
        <div class="contact-text">
            <div class="contact-form">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="title" class="form-label">Başlık</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $post->slug }}" required>
                        </div>
                        <div class="col-12">
                            <label for="content" class="form-label">İçerik</label>
                            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
                        </div>
                        <div class="col-12">
                            <label for="category_id" class="form-label">Kategori</label>
                            <select name="category_id" id="category_id" class="form-select" required>
                                @foreach ($allCategories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="image" class="form-label">Gönderi Resmi</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            @if($post->image)
                                <img src="{{ asset('storage/images/' . $post->image) }}" alt="Gönderi Resmi" class="mt-2" style="max-width: 200px;">
                                <p class="mt-2">Mevcut Resim</p>
                            @endif
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Gönderiyi Güncelle</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
