<x-app-layout>
    <x-slot name="title">
        ホーム
    </x-slot>

    @foreach ($posts as $post)
    <article class="hover:bg-gray-100 transition duration-350 ease-in-out cursor-pointer" onclick="window.location.href='{{ route('posts.show', $post) }}';">
        <div class="flex flex-shrink-0 p-4">
            <div class="flex-shrink-0 group block">
                <div class="flex items-center hover:opacity-80 transition-opacity">
                    <a href="{{ route('users.show', ['name' => $post->user->name]) }}">
                        <img class="inline-block h-10 w-10 object-cover rounded-full" src="/images/profile-icon.png" alt="icon" />
                    </a>
                    <div class="ml-2">
                        <p class="text-base leading-6 font-medium text-gray-700">
                            <a href="{{ route('users.show', ['name' => $post->user->name]) }}">
                                <span class="text-sm leading-5 font-medium text-gray-400">
                                    {{ $post->user->name }}
                                </span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-16 pb-5 break-words">
            <p class="text-base width-auto font-medium flex-shrink">
                <div class="container font-semibold">
                    {{ $post->title }}
                </div>
                <p class="pt-3 pb-5">{!! nl2br(e($post->body)) !!}</p>
                <p class="text-gray-400">{{ $post->created_at->format('Y/m/d H:i') }}</p>
                <post-good
                    :initial-is-gooded-by='@json($post->isGoodedBy(Auth::user()))'
                    :initial-count-goods='@json($post->count_goods)'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('posts.good', ['post' => $post]) }}"
                >
                </post-good>
            </p>
        </div>
    </article>

    <hr class="border-gray-200">

    @endforeach

</x-app-layout>
