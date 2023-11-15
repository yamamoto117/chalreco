<x-app-layout>
    <x-slot name="title">
        チャレンジを編集
    </x-slot>

    <div class="text-gray-700 p-4">
        <form method="post" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            @error('title')
                <div class="text-red-500 pb-4">{{ $message }}</div>
            @enderror

            <div class="mb-4">
                <p>ステータス</p>
                <select class="w-full border border-gray-300 outline-none" name="status">
                    <option value="in_progress" @if(old('status', $post->status) == 'in_progress') selected @endif>チャレンジ中</option>
                    <option value="completed" @if(old('status', $post->status) == 'completed') selected @endif>チャレンジ終了</option>
                </select>
            </div>
            <div>
                <p>チャレンジ名 <span class="text-red-500">(必須)</span></p>
                <input class="w-full border border-gray-300 mb-4 outline-none" type="text" name="title" value="{{ old('title', $post->title) }}">
            </div>
            <div>
                <p>自由入力欄</p>
                <textarea class="w-full h-60 border border-gray-300 outline-none" name="body">{{ old('body', $post->body) }}</textarea>
            </div>
            <div class="mb-4">
                <p>画像</p>
                @if($post->image)
                <div class="mb-4">
                    <img src="{{ $post->image }}" alt="Current image" class="w-full h-auto">
                    <label><input type="checkbox" name="delete_image" value="1">画像を削除する</label>
                </div>
                @endif
                <input class="w-full outline-none" type="file" name="image">
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

</x-app-layout>
