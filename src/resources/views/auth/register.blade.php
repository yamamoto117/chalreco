<x-app-layout>
    <x-slot name="title">
        新規登録
    </x-slot>

    <div class="flex justify-start">
        <div class="pt-1 pl-1">
            <a href="{{ route('login')}}" class=" text-2xl font-medium rounded-full text-gray-700 hover:bg-gray-100 hover:text-gray-600 float-right">
                <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <g>
                        <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                        </path>
                    </g>
                </svg>
            </a>
        </div>
    </div>

    <div class="p-4">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('ユーザー名')" />
                <x-input id="name" class="w-full border border-gray-300 p-2 mb-4 outline-none" type="text" name="name" :value="old('name')" autofocus />
            </div>
            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('メールアドレス')" />
                <x-input id="email" class="w-full border border-gray-300 p-2 mb-4 outline-none" type="email" name="email" :value="old('email')" />
            </div>
            <!-- Password -->
            <div>
                <x-label for="password" :value="__('パスワード')" />
                <x-input id="password" class="w-full border border-gray-300 p-2 mb-4 outline-none"
                                type="password"
                                name="password"
                                autocomplete="new-password" />
            </div>
            <!-- Confirm Password -->
            <div>
                <x-label for="password_confirmation" :value="__('パスワード(確認)')" />
                <x-input id="password_confirmation" class="w-full border border-gray-300 p-2 outline-none"
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
