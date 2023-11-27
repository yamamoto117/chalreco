<x-app-layout>
    <x-slot name="title">
        プロフィール編集
    </x-slot>

    <div class="text-gray-700 p-4">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="post" action="{{ route('users.update', $name) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="mb-4">
                <label for="header_image">ヘッダー画像</label>
                <header-image-preview :user="{{ json_encode($user) }}" @image-removed="handleHeaderImageRemoval"></header-image-preview>
                <input type="hidden" name="delete_header_image" :value="deleteHeaderImageFlag ? 'true' : 'false'">
            </div>
            <div class="mb-4">
                <label for="profile_image">プロフィール画像</label>
                <profile-image-preview :user="{{ json_encode($user) }}" @image-removed="handleProfileImageRemoval"></profile-image-preview>
                <input type="hidden" name="delete_profile_image" :value="deleteProfileImageFlag ? 'true' : 'false'">
            </div>
            <div class="mb-4">
                <x-label for="name" :value="__('ユーザー名')" />
                <x-input id="name" class="w-full border border-gray-300 p-2 outline-none" type="text" name="name" :value="old('name', $user->name)" autofocus />
            </div>
            <div class="mb-4">
                <x-label for="bio" :value="__('自己紹介')" />
                <textarea name="bio" class="w-full border border-gray-300 p-2 outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">{{ old('bio', $user->bio) }}</textarea>
            </div>
            <div>
                <button class="w-full flex justify-center text-base leading-6 bg-orange-400 hover:bg-orange-500 text-white py-2 px-4 rounded-full">更新する</button>
            </div>
        </form>
            <div>
                <a href="{{ route('users.show', $name) }}" onclick="return confirm('キャンセルしてもよろしいですか？');" class="flex justify-center text-base leading-6 border border-gray-600 bg-white mt-3 hover:bg-gray-100 text-gray-600 py-2 px-4 rounded-full">キャンセル</a>
            </div>
    </div>
    <hr class="border-gray-200">
</x-app-layout>
