<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>
<body>
        @guest
        <a href="{{ route('register') }}">ユーザー新規登録</a>
        @endguest

        @guest
        <a href="{{ route('login') }}">ログイン</a>
        @endguest

        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">ログアウト</button>
        </form>
        @endauth

        @auth
        <a href="{{ route('posts.create') }}">新しいチャレンジを投稿</a>
        @endauth

    <div class="container">
        {{ $slot }}
    </div>

</body>
</html>
