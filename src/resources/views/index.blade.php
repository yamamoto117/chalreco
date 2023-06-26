<x-layout>
    <x-slot name="title">
        challenge
    </x-slot>

    <h1>ホーム</h1>
    <ul>
        @forelse ($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->user->name }}
                    {{ $post->title }}
                </a>
            </li>
        @empty
            <li>投稿がありません</li>
        @endforelse
    </ul>
</x-layout>
