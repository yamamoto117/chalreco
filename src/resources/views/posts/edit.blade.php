@extends('components/layout')

@section('title', 'チャレンジを編集')

@section('content')
<div class="text-gray-700 p-4">
    <form method="post" action="{{ route('posts.update', $post) }}">
        @method('PATCH')
        @csrf

        @error('title')
            <div class="text-red-500 pb-4">{{ $message }}</div>
        @enderror

        <div>
            <p>タイトル <span class="text-red-500">(必須)</span></p>
            <input class="w-full bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" type="text" name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div>
            <p>内容 (任意)</p>
            <textarea class="w-full bg-gray-100 p-3 h-60 border border-gray-300 outline-none" name="body">{{ old('body', $post->body) }}</textarea>
        </div>
        <div>
            <button class="w-full flex justify-center text-base leading-6 bg-orange-400 mt-5 hover:bg-orange-500 text-white py-2 px-4 rounded-full">上書きする</button>
        </div>
    </form>
        <div>
            <a href="{{ route('posts.show', $post) }}" class="flex justify-center text-base leading-6 border border-gray-600 bg-white mt-3 hover:bg-gray-100 text-gray-600 py-2 px-4 rounded-full">キャンセル</a>
        </div>
</div>
<hr class="border-gray-200">
@endsection
