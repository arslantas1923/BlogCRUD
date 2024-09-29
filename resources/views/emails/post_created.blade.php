<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yeni Gönderi</title>
</head>
<body>
    <h1>Yeni Gönderi: {{ $post->title }}</h1>
    <p>Yeni gönderiniz yayımlandı!</p>
    <p><strong>İçerik:</strong></p>
    <p>{{ $post->content }}</p>
    <p><a href="{{ route('posts.show', $post->slug) }}">Gönderiyi görüntülemek için buraya tıklayın.</a></p>
</body>
</html>
