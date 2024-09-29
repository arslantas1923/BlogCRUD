@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kategoriyi Düzenle</h1>
    <div class="contact-text">
        <div class="contact-form">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <input type="text" name="name" id="name" placeholder="Kategori Adı*" class="form-control" value="{{ $category->name }}" required>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <input type="text" name="slug" id="slug" placeholder="Slug*" class="form-control" value="{{ $category->slug }}" required>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Kategoriyi Güncelle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
