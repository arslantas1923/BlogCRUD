@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Kayıt Ol</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('register') }}" method="POST" class="card shadow-sm p-4">
                @csrf
                <div class="form-group mb-3">
                    <label for="name" class="form-label">Ad Soyad</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Adınızı girin" required>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="E-posta adresinizi girin" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="form-label">Şifre</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Şifrenizi girin" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="password_confirmation" class="form-label">Şifreyi Onayla</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Şifrenizi tekrar girin" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Kayıt Ol</button>
            </form>
        </div>
    </div>
</div>
@endsection
