<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6C5BT9F2HV"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-6C5BT9F2HV');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}  / チャレコ
    </title>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
<div class="h-screen flex flex-col">
    <div class="md:hidden flex items-center justify-between bg-white py-2 border-b border-gray-200 relative">
        <a href="#" id="iconMenu" class="absolute left-2 flex items-center">
            <img class="inline-block h-10 w-10 rounded-full" src="/images/profile-icon.png" alt="icon" />
        </a>
        <a href="{{ route('posts.index') }}" class="mx-auto">
            <img src="/images/logo.png" alt="logo" class="logo w-10 h-auto">
        </a>
        <div id="menuDropdown" class="absolute left-2 mt-2 rounded-md hidden">
            <div class="rounded-md bg-white shadow-xs">
                @guest
                <div>
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100">ログイン / 新規登録</a>
                    <a href="{{ route('login.guest') }}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100">ゲストログイン</a>
                </div>
                @endguest
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100">ログアウト</button>
                </form>
                @endauth
            </div>
        </div>
    </div>
    <div class="flex-grow flex">
        <aside class="hidden md:block md:w-1/4 p-4 pl-28 overflow-y-auto">
            <div class="fixed h-screen">
                <div class="flex items-center mb-6">
                    <a href="{{ route('posts.index') }}" class="flex items-center">
                        <img src="/images/logo.png" alt="logo" class="logo w-10 h-auto">
                        <h1 class="ml-2 text-3xl font-bold text-gray-700 hidden md:hidden lg:inline">チャレコ</h1>
                    </a>
                </div>
                <nav class="mt-5 text-gray-700">
                    <a href="{{ route('posts.index')}}" class="mt-1 group flex items-center justify-start lg:justify-start lg:items-center md:justify-center md:items-center lg:w-36 lg:h-12 md:w-12 md:h-12 px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-orange-50">
                        <svg class="h-6 w-6 lg:mr-4 md:mr-0" viewBox="0 0 512 512">
                            <g>
                                <polygon fill="currentColor" points="433.198,205.502 363.908,136.267 308.912,81.341 256.089,28.324 0,284.219 37.928,322.123
                                    256.089,104.142 474.071,322.123 512,284.219"></polygon>
                                <polygon fill="currentColor" points="78.801,312.098 78.801,483.676 213.994,483.676 213.994,368.231 298.006,368.231 298.006,483.676
                                    433.198,483.676 433.198,312.083 256.089,134.959"></polygon>
                            </g>
                        </svg>
                        <span class="hidden md:hidden lg:inline">ホーム</span>
                    </a>
                    @auth
                    <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="mt-1 group flex items-center justify-start lg:justify-start lg:items-center md:justify-center md:items-center lg:w-36 lg:h-12 md:w-12 md:h-12 px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-orange-50">
                        <svg class="h-6 w-6 lg:mr-4 md:mr-0" viewBox="0 0 512 512">
                            <g>
                                <path fill="currentColor" d="M255.988,282.537c78.002,0,141.224-63.221,141.224-141.213c0-77.982-63.222-141.213-141.224-141.213
                                    c-77.99,0-141.203,63.23-141.203,141.213C114.785,219.316,177.998,282.537,255.988,282.537z"></path>
                                <path fill="currentColor" d="M503.748,468.222C473.826,376.236,364.008,326.139,256,326.139c-108.02,0-217.828,50.098-247.75,142.084
                                    c-4.805,14.74-7.428,29.387-8.25,43.666h512C511.166,497.609,508.553,482.963,503.748,468.222z"></path>
                            </g>
                        </svg>
                        <span class="hidden md:hidden lg:inline">マイページ</span>
                    </a>
                    @endauth
                    @auth
                    <a href="{{ route('posts.create') }}" class="flex justify-center items-center bg-orange-400 mt-5 text-white lg:py-2 lg:px-4 text-base leading-6 font-bold hover:bg-orange-500 lg:w-52 lg:h-12 md:w-12 md:h-12 md:rounded-full">
                        <svg class="h-6 w-6 lg:mr-2 md:mr-0" viewBox="0 0 512 512">
                            <g>
                                <path fill="white" d="M422.002,6.017C315.33,20.736,213.205,220.861,162.939,313.486c-12.641,23.297,9.422,35.406,22.422,13.125
                                    c9.344-16.016,32.109-62.5,44.422-60.094c58.797,9.797,90.156-28.547,67.891-52.672c74.797,1.531,111.875-39.609,90.656-64.609
                                    c22.313,7.063,55.078,6.031,83.766-9.609C533.33,106.22,529.627-8.827,422.002,6.017z"></path>
                                <path fill="white" d="M409.189,207.048c-9.719,9.141-27.031,22.141-41.547,27.813v207.062c-0.016,4.609-1.781,8.531-4.781,11.563
                                    c-3.031,3-6.953,4.766-11.547,4.781H65.361c-4.594-0.016-8.531-1.781-11.563-4.781c-3-3.031-4.766-6.953-4.781-11.563V155.986
                                    c0.016-4.594,1.781-8.531,4.781-11.563c3.031-3,6.969-4.766,11.563-4.781h160.391c11.234-17.125,22.734-33.578,34.484-49.016
                                    H65.361c-17.969-0.016-34.469,7.344-46.219,19.141c-11.781,11.75-19.156,28.25-19.141,46.219v285.937
                                    c-0.016,17.969,7.359,34.469,19.141,46.234c11.75,11.781,28.25,19.156,46.219,19.141h285.953
                                    c17.953,0.016,34.453-7.359,46.219-19.141c11.781-11.766,19.156-28.266,19.141-46.234V206.017
                                    C416.674,206.017,414.002,202.517,409.189,207.048z"></path>
                            </g>
                        </svg>
                        <span class="hidden md:hidden lg:inline">チャレンジを投稿</span>
                    </a>
                    @endauth
                </nav>
            </div>
        </aside>
        <main class="w-full md:w-5/12">
            <div class="h-20">
                <section class="border border-y-0 border-gray-200" id="app">
                    <div class="flex sticky top-0 bg-white">
                        <div class="flex-1">
                            <h2 class="px-6 py-4 text-xl font-semibold text-gray-700">{{ $title }}</h2>
                            <hr class="border-gray-200">
                        </div>
                    </div>
                    {{ $slot }}
                </section>
                <script src="{{ mix('js/app.js') }}"></script>
                <div class="h-12 md:hidden"></div>
            </div>
        </main>
        <aside class="hidden md:block overflow-y-auto">
            <div class="fixed h-screen">
                <div class="text-gray-700 p-5">
                    @guest
                    <div class="flex border-solid border-2 border-orange-400 font-semibold rounded h-10 w-56">
                        <a href="{{ route('login') }}" class="flex items-center justify-center w-full h-full">ログイン / 新規登録</a>
                    </div>
                    <div class="flex border-solid border-2 border-gray-400 font-semibold rounded h-10 w-56 mt-2">
                        <a href="{{ route('login.guest') }}" class="flex items-center justify-center w-full h-full">ゲストログイン</a>
                    </div>
                    @endguest
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="border-solid border-2 border-orange-400 font-semibold rounded h-10 w-56">ログアウト</button>
                    </form>
                    @endauth
                </div>
            </div>
        </aside>
    </div>
    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border">
        <div class="max-w-screen-md mx-auto flex justify-around items-center py-3">
            <a href="{{ route('posts.index')}}" class="flex flex-col items-center justify-center">
                <svg class="h-6 w-6 lg:mr-4 md:mr-0" viewBox="0 0 512 512">
                    <g>
                        <polygon fill="currentColor" points="433.198,205.502 363.908,136.267 308.912,81.341 256.089,28.324 0,284.219 37.928,322.123
                            256.089,104.142 474.071,322.123 512,284.219"></polygon>
                        <polygon fill="currentColor" points="78.801,312.098 78.801,483.676 213.994,483.676 213.994,368.231 298.006,368.231 298.006,483.676
                            433.198,483.676 433.198,312.083 256.089,134.959"></polygon>
                    </g>
                </svg>
            </a>
            @auth
            <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="flex flex-col items-center justify-center">
                <svg class="h-6 w-6 lg:mr-4 md:mr-0" viewBox="0 0 512 512">
                    <g>
                        <path fill="currentColor" d="M255.988,282.537c78.002,0,141.224-63.221,141.224-141.213c0-77.982-63.222-141.213-141.224-141.213
                            c-77.99,0-141.203,63.23-141.203,141.213C114.785,219.316,177.998,282.537,255.988,282.537z"></path>
                        <path fill="currentColor" d="M503.748,468.222C473.826,376.236,364.008,326.139,256,326.139c-108.02,0-217.828,50.098-247.75,142.084
                            c-4.805,14.74-7.428,29.387-8.25,43.666h512C511.166,497.609,508.553,482.963,503.748,468.222z"></path>
                    </g>
                </svg>
            </a>
            @endauth
        </div>
    </div>
</div>
<div class="fixed bottom-16 right-4 md:hidden">
    <a href="{{ route('posts.create') }}" class="flex justify-center items-center bg-orange-400 p-3 rounded-full hover:bg-orange-500">
        <svg class="h-6 w-6" viewBox="0 0 512 512">
            <g>
                <path fill="white" d="M422.002,6.017C315.33,20.736,213.205,220.861,162.939,313.486c-12.641,23.297,9.422,35.406,22.422,13.125
                    c9.344-16.016,32.109-62.5,44.422-60.094c58.797,9.797,90.156-28.547,67.891-52.672c74.797,1.531,111.875-39.609,90.656-64.609
                    c22.313,7.063,55.078,6.031,83.766-9.609C533.33,106.22,529.627-8.827,422.002,6.017z"></path>
                <path fill="white" d="M409.189,207.048c-9.719,9.141-27.031,22.141-41.547,27.813v207.062c-0.016,4.609-1.781,8.531-4.781,11.563
                    c-3.031,3-6.953,4.766-11.547,4.781H65.361c-4.594-0.016-8.531-1.781-11.563-4.781c-3-3.031-4.766-6.953-4.781-11.563V155.986
                    c0.016-4.594,1.781-8.531,4.781-11.563c3.031-3,6.969-4.766,11.563-4.781h160.391c11.234-17.125,22.734-33.578,34.484-49.016
                    H65.361c-17.969-0.016-34.469,7.344-46.219,19.141c-11.781,11.75-19.156,28.25-19.141,46.219v285.937
                    c-0.016,17.969,7.359,34.469,19.141,46.234c11.75,11.781,28.25,19.156,46.219,19.141h285.953
                    c17.953,0.016,34.453-7.359,46.219-19.141c11.781-11.766,19.156-28.266,19.141-46.234V206.017
                    C416.674,206.017,414.002,202.517,409.189,207.048z"></path>
            </g>
        </svg>
    </a>
</div>
<script>
    document.getElementById('iconMenu').addEventListener('click', function(e) {
        e.preventDefault();
        let dropdown = document.getElementById('menuDropdown');
        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
        } else {
            dropdown.classList.add('hidden');
        }
    });
</script>
</body>
</html>
