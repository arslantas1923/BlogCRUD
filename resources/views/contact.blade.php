@extends('layouts.app')

@section('content')
    <h1>İletişim</h1>
    <p>Bize ulaşmak için aşağıdaki formu kullanabilirsiniz.</p>
    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Adınız</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">E-posta</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Mesajınız</label>
            <textarea class="form-control" id="message" name="message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gönder</button>
    </form>
@endsection
