<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST" enctype = "multipart/form-data">
            @csrf
            <div class="posts_name">
                <h2>item name</h2>
                <input type="text" name="post[posts_name]" placeholder="商品名"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="商品の説明"></textarea>
                <h2>Price</h2>
                <textarea name="post[price]" placeholder="商品の金額"></textarea>
            </div>
            <div class = "image">
                <input type = "file" name = "image">
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>