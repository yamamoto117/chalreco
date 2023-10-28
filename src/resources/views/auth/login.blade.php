<x-app-layout>
    <x-slot name="title">
        ログイン
    </x-slot>

    <div class="p-4">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('メールアドレス')" />
                <x-input id="email" class="w-full border border-gray-300 p-2 mb-4 outline-none" type="email" name="email" :value="old('email')" autofocus />
            </div>
            <!-- Password -->
            <div>
                <x-label for="password" :value="__('パスワード')" />
                <x-input id="password" class="w-full border border-gray-300 p-2 mb-4 outline-none"
                                type="password"
                                name="password"
                                autocomplete="current-password" />
            </div>
            <div>
                <x-button>
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
        <hr class="border-gray-200 my-4">
        <div>
            <p>初めての方はこちら</p>
            <a href="{{ route('register') }}" class="flex justify-center text-base leading-6 border border-gray-600 bg-white mt-3 hover:bg-gray-100 text-gray-600 py-2 px-4 rounded-full">
                {{ __('新規登録') }}
            </a>
        </div>
        <hr class="border-gray-200 my-4">
        <div>
            <p>お試しの方はこちら</p>
            <a href="{{ route('login.guest') }}" class="flex justify-center text-base leading-6 border border-gray-400 bg-gray-400 mt-3 hover:bg-gray-500 text-white py-2 px-4 rounded-full">
                {{ __('ゲストログイン') }}
            </a>
        </div>
    </div>
    <hr class="border-gray-200">
</x-app-layout>
