<x-app-layout>
    <x-slot name="title">
        投稿詳細
    </x-slot>

    <div>
        <div class="flex justify-start">
            <div class="py-2 mx-2">
                <a href="javascript:history.back()" class=" text-2xl font-medium rounded-full text-gray-700 hover:bg-gray-100 hover:text-gray-600 float-right">
                    <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <g>
                            <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                            </path>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <article class="p-4">
        <div class="flex flex-shrink-0">
            <div class="flex-shrink-0 group block w-full">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="{{ route('users.show', ['name' => $post->user->name]) }}" class="hover:opacity-80 transition-opacity">
                            <img class="inline-block h-10 w-10 object-cover rounded-full" src="/images/profile-icon.png" alt="icon" />
                        </a>
                        <div class="ml-2">
                            <div class="text-base leading-6 font-medium text-gray-700">
                                <a href="{{ route('users.show', ['name' => $post->user->name]) }}" class="no-underline hover:underline text-inherit">
                                    <span>{{ $post->user->name }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @if( Auth::id() === $post->user_id )
                            <dropdown-menu>
                                <a href="{{ route('posts.edit', $post) }}" class="block px-4 py-2 text-sm text-gray-700">編集</a>
                                <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post" class="block">
                                    @method('DELETE')
                                    @csrf
                                    <button class="block px-4 py-2 text-sm text-red-500">削除</button>
                                </form>
                          </dropdown-menu>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4 break-words">
            <div class="flex-shrink">
                <p class="container font-semibold">
                    {{ $post->title }}
                </p>
                <p class="mt-2">{!! nl2br(e($post->body)) !!}</p>
                <div class="flex items-center mt-6">
                    <p class="mr-1 text-sm text-gray-400">{{ $post->created_at->format('Y/m/d H:i') }}</p>
                    @if($post->status == 'in_progress')
                        <svg class="h-4 w-4 text-orange-400 fill-current" viewBox="0 0 512 512">
                            <g>
                                <path d="M265.771,394.438c-85.91-108.512,26.687-187.388,36.486-249.025c15.86-99.727-73.055-125.767-73.055-125.767
                                    c10.545,33.123-14.781,82.696-61.696,122.337c-49.639,41.925-85.576,108.769-86.457,171.678c-0.382,4.874-0.647,9.789-0.647,14.764
                                    C80.401,429.811,162.589,512,263.976,512c42.149,0,80.978-14.208,111.966-38.096c0,0,14.216-11.85,20.344-18.227
                                    C396.287,455.677,313.449,451.699,265.771,394.438z"></path>
                                <path d="M408.426,271.894c-14.997-19.987-26.871-38.413-26.09-55.261c0.764-16.848,16.89-49.124,16.89-49.124
                                    c-42.996,1.536-102.865,39.915-111.053,129.462c-8.054,88.151,86.474,140.721,109.508,119.231
                                    C454.478,356.324,426.843,296.455,408.426,271.894z"></path>
                                <path d="M348.74,134.244c15.478,5.597,41.269-9.283,44.175-45.496c2.889-36.22-31.354-70.813-23.068-88.749
                                    c-23.831,14.93-38.512,53.425-29.361,77C349.62,100.573,360.796,121.598,348.74,134.244z"></path>
                            </g>
                        </svg>
                    @elseif($post->status == 'completed')
                        <svg class="h-4 w-4 text-gray-400 fill-current" viewBox="0 0 512 512">
                            <g>
                                <path d="M265.771,394.438c-85.91-108.512,26.687-187.388,36.486-249.025c15.86-99.727-73.055-125.767-73.055-125.767
                                c10.545,33.123-14.781,82.696-61.696,122.337c-49.639,41.925-85.576,108.769-86.457,171.678c-0.382,4.874-0.647,9.789-0.647,14.764
                                C80.401,429.811,162.589,512,263.976,512c42.149,0,80.978-14.208,111.966-38.096c0,0,14.216-11.85,20.344-18.227
                                C396.287,455.677,313.449,451.699,265.771,394.438z"></path>
                                <path d="M408.426,271.894c-14.997-19.987-26.871-38.413-26.09-55.261c0.764-16.848,16.89-49.124,16.89-49.124
                                c-42.996,1.536-102.865,39.915-111.053,129.462c-8.054,88.151,86.474,140.721,109.508,119.231
                                C454.478,356.324,426.843,296.455,408.426,271.894z"></path>
                                <path d="M348.74,134.244c15.478,5.597,41.269-9.283,44.175-45.496c2.889-36.22-31.354-70.813-23.068-88.749
                                c-23.831,14.93-38.512,53.425-29.361,77C349.62,100.573,360.796,121.598,348.74,134.244z"></path>
                            </g>
                        </svg>
                    @endif
                </div>
            </div>
            <div class="flex items-center w-10 h-10 text-gray-400 mt-2 -mb-2">
                <post-good
                    :initial-is-gooded-by='@json($post->isGoodedBy(Auth::user()))'
                    :initial-count-goods='@json($post->count_goods)'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('posts.good', ['post' => $post]) }}"
                >
                </post-good>
            </div>
        </div>
        <script>
            'use strict';
            {
                document.getElementById('delete_post').addEventListener('submit', e => {
                    e.preventDefault();

                    if (!confirm('削除してもよろしいでしょうか？')) {
                        return;
                    }

                    e.target.submit();
                })
            }
        </script>
    </article>

    <hr class="border-gray-200">

</x-app-layout>
