<x-app-layout>
    <x-slot name="title">
        新規登録
    </x-slot>

    <x-back />
    <div class="p-4">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('ユーザー名')" />
                <x-input id="name" class="w-full border border-gray-300 p-2 mb-4 outline-none rounded" type="text" name="name" :value="old('name')" autofocus />
            </div>
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('メールアドレス')" />
                <x-input id="email" class="w-full border border-gray-300 p-2 mb-4 outline-none rounded" type="email" name="email" :value="old('email')" />
            </div>
            <!-- Password -->
            <div>
                <x-label for="password" :value="__('パスワード')" />
                <x-input id="password" class="w-full border border-gray-300 p-2 mb-4 outline-none rounded"
                                type="password"
                                name="password"
                                autocomplete="new-password" />
            </div>
            <!-- Confirm Password -->
            <div>
                <x-label for="password_confirmation" :value="__('パスワード(確認)')" />
                <x-input id="password_confirmation" class="w-full border border-gray-300 p-2 mb-4 outline-none rounded"
                                type="password"
                                name="password_confirmation" />
            </div>
            <div>
                <x-button>
                    {{ __('ユーザー登録') }}
                </x-button>
            </div>
        </form>
    </div>
    <hr class="border-gray-200">
</x-app-layout>
