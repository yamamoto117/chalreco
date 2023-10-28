<x-app-layout>
    <x-slot name="title">
        ユーザー
    </x-slot>

    <main role="main">
        <div class="flex">
            <section class="w-full">
                <x-back />
                @include('users.user', ['user' => $user])
                <tabs-component :user="{{ $user }}" :tabs="[
                    {name: '投稿', href: '{{ route('users.show', ['name' => $user->name]) }}', active: true},
                    {name: 'いいね', href: '{{ route('users.goods', ['name' => $user->name]) }}', active: false}
                ]"></tabs-component>
                @include('users.challenge-list')
            </section>
        </div>
    </main>
</x-app-layout>
