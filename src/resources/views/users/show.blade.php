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
                    {name: '投稿'},
                    {name: 'いいね'}
                ]">
                    <template v-slot:content-0>
                        @include('users.challenge-list')
                    </template>
                    <template v-slot:content-1>
                        @include('users.goods', ['posts' => $goodsPosts])
                    </template>
                </tabs-component>
            </section>
        </div>
    </main>
</x-app-layout>
