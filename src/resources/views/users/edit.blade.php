<x-app-layout>
    <x-slot name="title">
        プロフィール編集
    </x-slot>

    <div class="text-gray-700 p-4">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="post" action="{{ route('users.update', $name) }}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div>
                <x-label for="profile_image" :value="__('プロフィール画像')" />
                @if($user->profile_image)
                <div>
                    <div class="flex justify-center">
                        <img src="{{ $user->profile_image }}" id=img class="w-32 h-32">
                    </div>
                    <label><input type="checkbox" name="delete_profile_image" value="1">画像を削除する</label>
                </div>
                @endif
                <input type="file" name="profile_image" id="profile_image" onchange="previewImage(this);" class="w-full h-auto mb-4">
            </div>
            <div>
                <x-label for="name" :value="__('ユーザー名')" />
                <x-input id="name" class="w-full border border-gray-300 p-2 mb-4 outline-none" type="text" name="name" :value="old('name', $user->name)" autofocus />
            </div>
            <div>
                <x-label for="bio" :value="__('自己紹介')" />
                <textarea name="bio" class="w-full border border-gray-300 p-2 outline-none">{{ old('bio', $user->bio) }}</textarea>
            </div>
            <div>
                <button class="w-full flex justify-center text-base leading-6 bg-orange-400 mt-5 hover:bg-orange-500 text-white py-2 px-4 rounded-full">更新する</button>
            </div>
        </form>
            <div>
                <a href="{{ route('users.show', $name) }}" class="flex justify-center text-base leading-6 border border-gray-600 bg-white mt-3 hover:bg-gray-100 text-gray-600 py-2 px-4 rounded-full">キャンセル</a>
            </div>
    </div>
    <hr class="border-gray-200">

    <script>
        function previewImage(obj) {
            var fileReader = new FileReader();
            fileReader.onload = (function() {
                document.querySelector('#img').src = fileReader.result;
            });
            fileReader.readAsDataURL(obj.files[0]);
        }
    </script>

</x-app-layout>
