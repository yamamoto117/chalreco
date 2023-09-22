<x-app-layout>
    <x-slot name="title">
        ホーム
    </x-slot>

    @foreach ($posts as $post)
    <article class="p-4">
        <div class="flex flex-shrink-0">
            <div class="flex-shrink-0 group block">
                <div class="flex items-center">
                    <a href="{{ route('users.show', ['name' => $post->user->name]) }}" class="hover:opacity-80 transition-opacity">
                        <img class="inline-block h-10 w-10 object-cover rounded-full" src="/images/profile-icon.png" alt="icon" />
                    </a>
                    <div class="ml-2">
                        <a href="{{ route('users.show', ['name' => $post->user->name]) }}" class="no-underline hover:underline text-inherit">
                            <span>{{ $post->user->name }}</span>
                        </a>
                    </div>
                    <p class="ml-2 text-gray-400 text-sm">{{ $post->time_ago }}</p>
                </div>
            </div>
        </div>
        <div class="mt-4 break-words">
            <div class="flex-shrink">
                <a href="{{ route('posts.show', $post) }}">
                    <p class="container font-semibold">{{ $post->title }}</p>
                    <p class="mt-2">{!! nl2br(e($post->body)) !!}</p>
                </a>
            </div>
                <post-good
                    :initial-is-gooded-by='@json($post->isGoodedBy(Auth::user()))'
                    :initial-count-goods='@json($post->count_goods)'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('posts.good', ['post' => $post]) }}"
                >
                </post-good>
        </div>
    </article>

    <hr class="border-gray-200">

    @endforeach

</x-app-layout>
