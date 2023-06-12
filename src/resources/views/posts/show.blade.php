<x-layout>
    <x-slot name="title">
        {{ $post->title }} - challenge
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.index') }}">戻る</a>
    </div>

    <h1>
        <span>{{ $post->title }}</span>
        <a href="{{ route('posts.edit', $post) }}">[編集]</a>
        <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post">
            @method('DELETE')
            @csrf

            <button class="btn">[削除]</button>
        </form>
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>

    <script>
        'use strict';

        {
            document.getElementById('delete_post').addEventListener('submit', e => {
                e.preventDefault();

                if (!confirm('Sure to delete?')) {
                    return;
                }

                e.target.submit();
            })
        }
    </script>
</x-layout>
