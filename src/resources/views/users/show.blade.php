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
                    <div class="w-full bg-gray-200 h-48"></div>
                    <div class="p-4">
                        <div class="flex w-full">
                            <div class="flex flex-1">
                                <div class="-mt-24">
                                    <div class="rounded-full h-36 w-36">
                                        <img class="h-36 w-36 rounded-full border-4 border-white" src="/images/profile-icon.png" alt="icon">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="justify-center w-full mt-3 ml-3 pb-10">
                            <div>
                                <h2 class="text-xl leading-6 font-bold text-gray-700">{{ $user->name }}</h2>
                            </div>
                        </div>
                    </div>
                    <hr class="border-gray-200">
                </div>
                <div class="flex flex-col flex-1 overflow-hidden">
                    <div class="container p-2 bg-gray-200">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-1/2 pr-1">
                                <div class="flex items-center justify-center py-2 bg-white border-2 border-orange-400 rounded">
                                    <svg class="h-6 w-6 text-orange-400 fill-current mr-2" viewBox="0 0 512 512">
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
                                    <div class="flex items-center">
                                        <div class="text-sm text-gray-700 mr-2">チャレンジ中</div>
                                        <h4 class="text-xl font-semibold text-gray-700">{{ $inProgressCount }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="w-1/2 pl-1">
                                <div class="flex items-center justify-center py-2 bg-white border-2 border-gray-400 rounded">
                                    <svg class="h-6 w-6 text-gray-400 fill-current mr-2" viewBox="0 0 512 512">
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
                                    <div class="flex items-center">
                                        <div class="text-sm text-gray-700 mr-2">チャレンジ終了</div>
                                        <h4 class="text-xl font-semibold text-gray-700">{{ $inCompletedCount }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            @foreach ($posts as $post)
                            <article class="hover:bg-gray-100 transition duration-350 ease-in-out cursor-pointer bg-white" onclick="window.location.href='{{ route('posts.show', $post) }}';">
                                <div class="p-4 break-words flex items-center">
                                    <p class="text-sm text-gray-400 mr-4">{{ $post->created_at->format('Y/m/d') }}</p>
                                    <div class="font-semibold text-gray-700">
                                        {{ $post->title }}
                                    </div>
                                    <p class="ml-auto text-gray-700">
                                        @if($post->status == 'in_progress')
                                            <svg class="h-6 w-6 text-orange-400 fill-current ml-2" viewBox="0 0 512 512">
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
                                            <svg class="h-6 w-6 text-gray-400 fill-current ml-2" viewBox="0 0 512 512">
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
                                    </p>
                                </div>
                            </article>
                            <hr class="border-gray-200">
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

</x-app-layout>
