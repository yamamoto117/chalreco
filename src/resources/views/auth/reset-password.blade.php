<x-app-layout>
    <x-slot name="title">
        パスワード再設定
    </x-slot>

    <div class="p-4">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <!-- Email Address -->
            <input type="hidden" name="email" value="{{ $request->email }}">
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('新しいパスワード')" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" autofocus />
            </div>
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('新しいパスワード(再入力)')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('送信') }}
                </x-button>
            </div>
        </form>
    </div>
    <hr class="border-gray-200">
</x-app-layout>
