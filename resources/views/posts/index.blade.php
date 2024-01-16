<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
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
                @endforeach
            </div>
        <a href='/posts/create'>create</a>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>