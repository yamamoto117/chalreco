<x-layout>
    <x-slot name="title">
        {{ $post->title }} - challenge
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">戻る</a>
    </div>

    <h1>
        {{ $post->user->name }}
        &nbsp;<span>{{ $post->title }}</span>
        @if( Auth::id() === $post->user_id )
        <a href="{{ route('posts.edit', $post) }}">[編集]</a>
        <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post">
            @method('DELETE')
            @csrf

            <button class="btn">[削除]</button>
        </form>
        @endif
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>
    {{ $post->created_at->format('Y/m/d H:i') }}

    <script>
        'use strict';

        {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('削除してもよろしいでしょうか？')) {
                    return;
                }

                e.target.submit();
            })
        }
    </script>
</x-layout>
