@extends('layouts.app')

@section('content')
<div class="container container-1360 mt-5">
    <h1>Kategori Oluştur</h1>
    <div class="contact-text">
        <div class="contact-form">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-10">
                        <input type="text" name="name" id="name" placeholder="Kategori Adı*" class="form-control" required>
                    </div>
                    <div class="col-lg-6 col-md-10">
                        <input type="text" name="slug" id="slug" placeholder="Slug*" class="form-control" required>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">Kategori Oluştur</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
