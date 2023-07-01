<x-layout>
    <x-slot name="title">
        challenge
    </x-slot>

    <h1>マイページ</h1>
    {{ $user->name }}
    <p>〇〇フォロー</p>
    <p>〇〇フォロワー</p>

    @foreach($posts as $post)
        <li>
            <a href="{{ route('posts.show', $post) }}">
                {{ $post->title }}
            </a>
        </li>
    @endforeach

</x-layout>
