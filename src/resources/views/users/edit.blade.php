<x-app-layout>
    <x-slot name="title">
        プロフィール編集
    </x-slot>

    <x-back />
    <div class="text-gray-700 p-4">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="post" action="{{ route('users.update', $name) }}">
            @method('PATCH')
            @csrf
            <div>
                <x-label for="name" :value="__('ユーザー名')" />
                <x-input id="name" class="w-full border border-gray-300 p-2 mb-4 outline-none" type="text" name="name" :value="old('name')" autofocus />
            </div>
            <div>
                <button class="w-full flex justify-center text-base leading-6 bg-orange-400 mt-5 hover:bg-orange-500 text-white py-2 px-4 rounded-full">上書きする</button>
            </div>
        </form>
            <div>
                <a href="{{ route('users.show', $name) }}" class="flex justify-center text-base leading-6 border border-gray-600 bg-white mt-3 hover:bg-gray-100 text-gray-600 py-2 px-4 rounded-full">キャンセル</a>
            </div>
    </div>
    <hr class="border-gray-200">

</x-app-layout>
