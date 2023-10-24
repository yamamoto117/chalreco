<x-guest-layout>
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
</x-guest-layout>


{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('メールアドレス')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('ログイン状態を保存する') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れた場合はこちら') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('ログイン') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
