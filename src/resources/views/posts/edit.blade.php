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
                <label for="status">ステータス<span class="text-white text-xs bg-red-500 rounded py-0.5 px-1 ml-1">必須</span></label>
                <select id="status" class="w-full border border-gray-300 outline-none rounded focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="status">
                    <option value="in_progress" @if(old('status', $post->status) == 'in_progress') selected @endif>チャレンジ中</option>
                    <option value="completed" @if(old('status', $post->status) == 'completed') selected @endif>チャレンジ終了</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="title" class="flex items-center">チャレンジ名<span class="text-white text-xs bg-red-500 rounded py-0.5 px-1 ml-1">必須</span></label>
                <input id="title" class="w-full border border-gray-300 outline-none rounded focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="text" name="title" value="{{ old('title', $post->title) }}" placeholder="チャレンジのタイトルを入力してください">
            </div>
            <div class="mb-4">
                <label for="body">フリースペース</label>
                <textarea id="body" class="w-full h-60 border border-gray-300 outline-none rounded focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" name="body" placeholder="チャレンジの内容などを自由に入力できます">{{ old('body', $post->body) }}</textarea>
            </div>
            <div class="mb-4">
                <div>
                    <label for="image">画像</label>
                    <image-preview :post="{{ json_encode($post) }}" @image-removed="handleImageRemoval"></image-preview>
                    <input type="hidden" name="delete_image" :value="deleteImageFlag ? 'true' : 'false'">
                </div>
            </div>
            <div class="pt-2">
                <button class="w-full flex justify-center text-base leading-6 bg-orange-400 hover:bg-orange-500 text-white px-4 py-2 rounded-full">上書きする</button>
            </div>
        </form>
            <div>
                <a href="{{ route('posts.show', $post) }}" onclick="return confirm('キャンセルしてもよろしいですか？');" class="flex justify-center text-base leading-6 border border-gray-600 bg-white hover:bg-gray-100 text-gray-600 px-4 py-2 rounded-full mt-3">キャンセル</a>
            </div>
    </div>
    <hr class="border-gray-200">
</x-app-layout>
