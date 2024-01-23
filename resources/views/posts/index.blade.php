<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/index.css">
    </head>
    <body>
        <h1>Gift</h1>
        <div class = 'search'>
            <form action = "{{ route('posts.search') }}" method = "GET">
                <input type = "search" name = "search" value = "@if (isset($search)){{ $search }} @endif">
                <input type = "submit" value = "検索">
            </form>
        </div>
            <div class='posts'>
                @foreach ($posts as $post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{ $post->id }}">{{ $post->posts_name }}</a>
                        </h2>
                        <!--<p class='body'>{{ $post->body }}</p>-->
                        <p class='price'>{{ $post->price }}</p>
                    </div>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    </form>
                @endforeach
            </div>
        <a href='/posts/create'>投稿作成</a>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(id) {
                'use strict'
                
                if (confirm('削除すると復元できません。\nそれでも削除しますか。')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>