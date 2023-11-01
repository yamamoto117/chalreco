<x-app-layout>
    <x-slot name="title">
        ホーム
    </x-slot>

    @foreach ($posts as $post)
        <x-post-list-card :post="$post" />
        <hr class="border-gray-200">
    @endforeach

</x-app-layout>
