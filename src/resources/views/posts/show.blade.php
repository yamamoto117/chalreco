<x-app-layout>
    <x-slot name="title">
        投稿詳細
    </x-slot>

    <div>
        <div class="flex justify-start">
            <div class="py-2 mx-2">
                <a href="{{ route('posts.index')}}" class=" text-2xl font-medium rounded-full text-gray-700 hover:bg-gray-100 hover:text-gray-600 float-right">
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
    <article>
        <div class="flex flex-shrink-0 p-4">
            <div class="flex-shrink-0 group block w-full">
                <div class="flex items-center justify-between">
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
                    <div class="flex items-center">
                        @if( Auth::id() === $post->user_id )
                        <a href="{{ route('posts.edit', $post) }}" class="px-2 py-1 text-gray-400 border border-gray-400 font-semibold rounded hover:bg-gray-100">編集</a>
                        <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post" class="pl-2">
                        @method('DELETE')
                        @csrf
                        <button class="px-2 py-1 text-red-400 border border-red-400 font-semibold rounded hover:bg-red-100">削除</button>
                        </form>
                        @endif
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
            </p>
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
