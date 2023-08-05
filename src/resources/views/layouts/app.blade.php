<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            {{ $title }}  / チャレコ
        </title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="p-relative h-screen bg-white">
            <div class="flex justify-center">
                <header class="text-gray-700 h-12 py-4 h-auto">

                    <!-- Navbar (left side) -->
                    <div style="width: 275px;">
                        <div class="overflow-y-auto fixed h-screen pr-3" style="width: 275px;">

                            <!--Logo-->
                            <div class="flex items-center">
                                <a href="{{ route('posts.index')}}" class="flex items-center">
                                    <svg viewBox="0 0 24 24" class="h-12 w-12 text-orange-400" fill="currentColor">
                                        <polygon points="10 2, 20 20, 0 20"/>
                                    </svg>
                                    <h1 class="ml-2 text-3xl font-bold">チャレコ</h1>
                                </a>
                            </div>

                            <!-- Nav-->
                            <nav class="mt-5 px-2">
                                <a href="{{ route('posts.index')}}" class="mt-1 group flex items-center w-16 px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-orange-50">
                                    ホーム
                                </a>

                                @auth
                                <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="mt-1 group flex items-center w-24 px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-orange-50">
                                    マイページ
                                </a>
                                @endauth

                                @auth
                                <a href="{{ route('posts.create') }}" class="flex justify-center text-base leading-6 bg-orange-400 w-60 mt-5 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded-full">
                                    チャレンジを投稿
                                </a>
                                @endauth
                            </nav>
                        </div>
                    </div>
                </header>

                <main role="main">
                    <div class="flex" style="width: 990px;">
                        <section class="w-3/5 border border-y-0 border-gray-200" style="max-width:600px;">
                            <!--Content (Center)-->
                            <aside>
                                <div class="flex sticky top-0 bg-white">
                                    <div class="flex-1">
                                        <h2 class="px-6 py-4 text-xl font-semibold text-gray-700">{{ $title }}</h2>
                                        <hr class="border-gray-200">
                                    </div>
                                </div>

                                <div class="text-gray-700">
                                    {{ $slot }}
                                </div>
                                <hr class="border-gray-200">
                            </aside>
                        </section>

                        <aside class="w-2/5 h-12 pl-4 position-relative">
                            <!--Aside menu (right side)-->
                            <div style="max-width:350px;">
                                <div class="overflow-y-auto fixed h-screen">
                                    <div class="relative text-gray-700 w-80 p-5">
                                        @guest
                                        <div class="flex border-solid border-2 border-orange-400 font-semibold rounded h-10 w-60">
                                            <a href="{{ route('login') }}" class="flex items-center justify-center w-full h-full">ログイン / 新規登録</a>
                                        </div>
                                        @endguest

                                        @auth
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="border-solid border-2 border-orange-400 font-semibold rounded h-10 w-60">ログアウト</button>
                                        </form>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </aside>
                </main>
            </div>
        </div>
    </body>
</html>




{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        一旦コメントアウト
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}
