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
                    {name: '投稿', href: '{{ route('users.show', ['name' => $user->name]) }}', active: false},
                    {name: 'いいね', href: '{{ route('users.goods', ['name' => $user->name]) }}', active: true}
                ]"></tabs-component>
                <div class="flex flex-col flex-1 overflow-hidden">
                    <div class="container">
                        @foreach ($posts as $post)
                            <x-post-list-card :post="$post" />
                            <hr class="border-gray-200">
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>
