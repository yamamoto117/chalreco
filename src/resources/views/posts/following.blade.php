@foreach ($posts as $post)
    <x-post-list-card :post="$post" :key="'following-' . $post->id" />
    <hr class="border-gray-200">
@endforeach
