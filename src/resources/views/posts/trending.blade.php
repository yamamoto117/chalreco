<x-app-layout>
    <x-slot name="title">
        注目のチャレンジ
    </x-slot>

    @foreach ($posts as $post)
        <x-post-list-card :post="$post" />
        <hr class="border-gray-200">
    @endforeach

</x-app-layout>
