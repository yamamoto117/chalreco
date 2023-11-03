@foreach ($posts as $post)
    <x-post-list-card :post="$post" />
    <hr class="border-gray-200">
@endforeach
