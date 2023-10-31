<x-app-layout>
    <x-slot name="title">
        ホーム
    </x-slot>

    @php
        $tabs = [
            ['name' => '注目のチャレンジ'],
        ];

        if (auth()->check()) {
            $tabs[] = ['name' => 'フォロー中'];
        }
    @endphp

    <tabs-component :tabs="{{ json_encode($tabs) }}">
        <template v-slot:content-0>
            @include('posts.trending')
        </template>
        <template v-slot:content-1>
            @include('posts.following', ['posts' => $followingPosts])
        </template>
    </tabs-component>

</x-app-layout>
