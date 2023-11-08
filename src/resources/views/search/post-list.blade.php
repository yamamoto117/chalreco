@foreach($posts as $post)
    <div>
        <x-post-list-card :post="$post" />
        <hr class="border-gray-200">
    </div>
@endforeach
