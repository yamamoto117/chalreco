@extends('components/layout')

@section('title', 'ユーザー')

@section('content')
<main role="main">
    <div class="flex" style="width: 990px;">
        <section class="w-3/5" style="max-width:600px;">
            <!--Content (Center)-->
                <!-- Nav back-->
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

            <!-- User card-->
            <div>
                <div class="w-full bg-gray-200" style="height: 200px;">
                </div>
                <div class="p-4">
                    <div class="relative flex w-full">
                        <!-- Avatar -->
                        <div class="flex flex-1">
                            <div style="margin-top: -6rem;">
                                <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                                    <img style="height:9rem; width:9rem;" class="md rounded-full relative border-4 border-white" src="{{ asset('images/profile-icon.png')}}" alt="icon">
                                    <div class="absolute"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile info -->
                    <div class="space-y-1 justify-center w-full mt-3 ml-3 pb-10">
                    <!-- User basic-->
                        <div>
                            <h2 class="text-xl leading-6 font-bold text-gray-700">{{ $user->name }}</h2>
                        </div>
                    </div>
                </div>
                <hr class="border-gray-200">
            </div>
            @foreach ($posts as $post)
            <article class="hover:bg-gray-100 transition duration-350 ease-in-out cursor-pointer" onclick="window.location.href='{{ route('posts.show', $post) }}';">
                <div class="flex flex-shrink-0 p-4">
                    <div class="flex-shrink-0 group block">
                        <div class="flex items-center hover:opacity-80 transition-opacity">
                            <a href="{{ route('users.show', ['name' => $post->user->name]) }}">
                                <img class="inline-block h-10 w-10 object-cover rounded-full" src="{{ asset('images/profile-icon.png')}}" alt="icon" />
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
                    </p>
                </div>
            </article>
            <hr class="border-gray-200">
            @endforeach
        </section>
    </div>
</main>
@endsection
