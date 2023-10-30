<div class="flex flex-col flex-1 overflow-hidden">
    <div class="container">
        @foreach ($posts as $post)
            <x-post-list-card :post="$post" />
            <hr class="border-gray-200">
        @endforeach
    </div>
</div>
