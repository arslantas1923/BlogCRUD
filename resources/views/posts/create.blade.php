@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gönderi Oluştur</h1>
    <div class="contact-text">
        <div class="contact-form">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <input type="text" name="title" id="title" placeholder="Başlık*" class="form-control" required>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <input type="text" name="slug" id="slug" placeholder="Slug*" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <textarea name="content" id="content" placeholder="İçerik*" class="form-control" rows="5" required></textarea>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <select name="category_id" id="category_id" class="form-select" style="width:100%" required>
                            @foreach ($allCategories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <input type="file" name="image" id="image" class="form-control" accept="image/*"> <!-- Resim yükleme alanı -->
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Gönderiyi Oluştur</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
