<x-app-layout>
    <x-slot name="title">
        ユーザー
    </x-slot>

    <main role="main">
        <div class="flex">
            <section class="w-full">
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
                    <hr class="border-gray-200">
                </div>
                <div>
                    <div class="w-full bg-gray-200" style="height: 200px;"></div>
                    <div class="p-4">
                        <div class="relative flex w-full">
                            <div class="flex flex-1">
                                <div style="margin-top: -6rem;">
                                    <div style="height:9rem; width:9rem;" class="rounded-full relative avatar">
                                        <img style="height:9rem; width:9rem;" class="rounded-full relative border-4 border-white" src="/images/profile-icon.png" alt="icon">
                                        <div class="absolute"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-1 justify-center w-full mt-3 ml-3 pb-10">
                            <div>
                                <h2 class="text-xl leading-6 font-bold text-gray-700">{{ $user->name }}</h2>
                            </div>
                        </div>
                    </div>
                    <hr class="border-gray-200">
                </div>
                <h2 class="font-bold text-center bg-orange-400 text-white py-2">チャレンジ中</h2>
                <hr class="border-gray-200">
                @foreach ($posts as $post)
                <article class="hover:bg-gray-100 transition duration-350 ease-in-out cursor-pointer" onclick="window.location.href='{{ route('posts.show', $post) }}';">
                    <div class="p-2 break-words flex items-center">
                        <p class="text-gray-400 mr-4">{{ $post->created_at->format('Y/m/d') }}</p>
                        <div class="font-semibold text-gray-700">
                            {{ $post->title }}
                        </div>
                    </div>
                </article>
                <hr class="border-gray-200">
                @endforeach
                <h2 class="font-bold text-center bg-gray-400 text-white py-2">過去のチャレンジ</h2>
                <hr class="border-gray-200">
            </section>
        </div>
    </main>

</x-app-layout>
