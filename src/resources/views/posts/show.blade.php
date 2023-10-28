<x-app-layout>
    <x-slot name="title">
        投稿詳細
    </x-slot>
    <x-back />
    <x-post-show-card :post="$post" />
    <hr class="border-gray-200">
</x-app-layout>
