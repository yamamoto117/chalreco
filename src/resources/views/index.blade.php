<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>challenge</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>投稿一覧</h1>
        <ul>
            @forelse ($posts as $post)
                <li>{{ $post->title }}</li>
            @empty
                <li>No posts yet!</li>
            @endforelse
        </ul>
    </div>

</body>
</html>
