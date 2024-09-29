@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Giriş Yap</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('login') }}" method="POST" class="card shadow-sm p-4">
                @csrf
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="E-posta adresinizi girin" required autofocus>
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

                <div class="form-group mb-3 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Beni Hatırla
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Şifremi Unuttum
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
            </form>
        </div>
    </div>
</div>
@endsection
