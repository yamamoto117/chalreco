<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')  / チャレコ
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
                                <h2 class="px-6 py-4 text-xl font-semibold text-gray-700">@yield('title')</h2>
                                <hr class="border-gray-200">
                            </div>
                        </div>

                        @yield('content')

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
