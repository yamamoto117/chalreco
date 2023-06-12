<x-layout>
    <x-slot name="title">
        編集 - challenge
    </x-slot>

    <div class="back-link">
        &laquo; <a href="{{ route('posts.show', $post) }}">戻る</a>
    </div>

    <h1>編集</h1>

    <form method="post" action="{{ route('posts.update', $post) }}">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label>
                タイトル (必須)
                <input type="text" name="title" value="{{ old('title', $post->title) }}">
            </label>
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>
                内容 (任意)
                <textarea name="body">{{ old('body', $post->body) }}</textarea>
            </label>
        </div>
        <div class="form-button">
            <button>上書きする</button>
        </div>
    </form>
</x-layout>
