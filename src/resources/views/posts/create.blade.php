<x-layout>
    <x-slot name="title">
        投稿 - challenge
    </x-slot>

    <h1>新しいチャレンジを投稿</h1>

    <form method="post" action="{{ route('posts.store') }}">
        @csrf

        <div class="form-group">
            <label>
                タイトル (必須)
                <input type="text" name="title" value="{{ old('title') }}">
            </label>
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label>
                内容 (任意)
                <textarea name="body">{{ old('body') }}</textarea>
            </label>
        </div>
        <div class="form-button">
            <button>投稿する</button>
        </div>
    </form>
        <div class="cancel-link">
            <a href="{{ route('posts.index') }}">キャンセル</a>
        </div>
</x-layout>
