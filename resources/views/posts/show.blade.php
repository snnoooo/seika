<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>
                </div>
            <div class="content__price">
                <h3>金額</h3>
                <p>{{ $post->price }}</p>
            </div>
            @if($post->image_filename)
            <div class="content__image">
                <img src="{{ $post->image_filename }}" alt="画像が読み込めません。"/>
            </div>
            @endif
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>