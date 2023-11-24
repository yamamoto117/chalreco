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
    <title>{{ $title }}  | チャレコ
    </title>
    <link href="/css/app.css" rel="stylesheet">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>
<body>
<div id="app">
    <!-- Responsive -->
    <div class="md:hidden flex justify-center items-center bg-white py-2 border-b border-gray-200 relative">
        <auth-responsive-dropdown-menu :user="{{ Auth::user() ? Auth::user()->toJson() : 'null' }}" class="absolute left-2">
            @guest
            <a href="{{ route('login') }}" class="flex items-center block px-4 py-2 text-sm text-gray-500 font-semibold hover:bg-gray-100">
                <svg class="h-4 w-4" viewBox="0 0 512 512">
                    <g>
                        <path fill="currentColor" d="M255.988,282.537c78.002,0,141.224-63.221,141.224-141.213c0-77.982-63.222-141.213-141.224-141.213
                            c-77.99,0-141.203,63.23-141.203,141.213C114.785,219.316,177.998,282.537,255.988,282.537z"></path>
                        <path fill="currentColor" d="M503.748,468.222C473.826,376.236,364.008,326.139,256,326.139c-108.02,0-217.828,50.098-247.75,142.084
                            c-4.805,14.74-7.428,29.387-8.25,43.666h512C511.166,497.609,508.553,482.963,503.748,468.222z"></path>
                    </g>
                </svg>
                <span class="ml-3">ログイン / 新規登録</span>
            </a>
            <a href="{{ route('login.guest') }}" class="flex items-center block px-4 py-2 text-sm text-gray-500 font-semibold hover:bg-gray-100">
                <svg class="h-4 w-4" viewBox="0 0 512 512">
                    <g>
                        <path fill="currentColor" d="M255.988,282.537c78.002,0,141.224-63.221,141.224-141.213c0-77.982-63.222-141.213-141.224-141.213
                            c-77.99,0-141.203,63.23-141.203,141.213C114.785,219.316,177.998,282.537,255.988,282.537z"></path>
                        <path fill="currentColor" d="M503.748,468.222C473.826,376.236,364.008,326.139,256,326.139c-108.02,0-217.828,50.098-247.75,142.084
                            c-4.805,14.74-7.428,29.387-8.25,43.666h512C511.166,497.609,508.553,482.963,503.748,468.222z"></path>
                    </g>
                </svg>
                <span class="ml-3" onclick="return confirm('ゲストユーザーとしてログインしますか？');">ゲストログイン</span>
            </a>
            @endguest
            @auth
            <form method="post" action="{{ route('logout') }}" class="flex items-center block px-4 py-2 text-sm text-red-500 font-semibold hover:bg-gray-100">
                @csrf
                <svg class="h-4 w-4" viewBox="0 0 512 512">
                    <g>
                        <path fill="currentColor" d="M255.988,282.537c78.002,0,141.224-63.221,141.224-141.213c0-77.982-63.222-141.213-141.224-141.213
                            c-77.99,0-141.203,63.23-141.203,141.213C114.785,219.316,177.998,282.537,255.988,282.537z"></path>
                        <path fill="currentColor" d="M503.748,468.222C473.826,376.236,364.008,326.139,256,326.139c-108.02,0-217.828,50.098-247.75,142.084
                            c-4.805,14.74-7.428,29.387-8.25,43.666h512C511.166,497.609,508.553,482.963,503.748,468.222z"></path>
                    </g>
                </svg>
                <button type="submit" class="ml-3" onclick="return confirm('ログアウトしてもよろしいですか？');">ログアウト</button>
            </form>
            @endauth
        </auth-responsive-dropdown-menu>
        <a href="{{ route('posts.index') }}" class="flex items-center">
            <img src="/images/logo.png" alt="logo" class="w-10 h-auto">
        </a>
    </div>
    <div class="flex justify-center">
        <aside class="flex justify-end hidden md:block p-4 overflow-y-auto h-screen sticky top-0">
            <div class="flex flex-col justify-end lg:mr-6 md:mr-2">
                <div class="flex justify-end lg:mr-5">
                    <a href="{{ route('posts.index') }}" class="flex items-center lg:justify-start md:justify-end">
                        <img src="/images/logo.png" alt="logo" class="logo w-10 h-auto">
                        <h1 class="ml-2 text-3xl font-bold text-gray-700 hidden md:hidden lg:inline">チャレコ</h1>
                    </a>
                </div>
                <nav class="flex flex-col justify-start mt-5 text-gray-700">
                    <div class="lg:mr-7">
                        <div class="flex justify-end">
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
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('search.index')}}" class="mt-1 group flex items-center justify-start lg:justify-start lg:items-center md:justify-center md:items-center lg:w-36 lg:h-12 md:w-12 md:h-12 px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-orange-50">
                                <svg class="h-6 w-6 lg:mr-4 md:mr-0" viewBox="0 0 512 512">
                                    <g>
                                        <path fill="currentColor" d="M495.272,423.558c0,0-68.542-59.952-84.937-76.328c-24.063-23.938-33.69-35.466-25.195-54.931
                                            c37.155-75.78,24.303-169.854-38.72-232.858c-79.235-79.254-207.739-79.254-286.984,0c-79.245,79.264-79.245,207.729,0,287.003
                                            c62.985,62.985,157.088,75.837,232.839,38.691c19.466-8.485,31.022,1.142,54.951,25.215c16.384,16.385,76.308,84.937,76.308,84.937
                                            c31.089,31.071,55.009,11.95,69.368-2.39C507.232,478.547,526.362,454.638,495.272,423.558z M286.017,286.012
                                            c-45.9,45.871-120.288,45.871-166.169,0c-45.88-45.871-45.88-120.278,0-166.149c45.881-45.871,120.269-45.871,166.169,0
                                            C331.898,165.734,331.898,240.141,286.017,286.012z"></path>
                                    </g>
                                </svg>
                                <span class="hidden md:hidden lg:inline">検索</span>
                            </a>
                        </div>
                        @auth
                        <div class="flex justify-end">
                            <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="mt-1 group flex items-center justify-center lg:justify-start lg:items-center md:justify-center md:items-center lg:w-36 lg:h-12 md:w-12 md:h-12 px-2 py-2 text-base leading-6 font-semibold rounded-full hover:bg-orange-50">
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
                        </div>
                        @endauth
                    </div>
                    @auth
                    <div class="flex justify-end">
                        <a href="{{ route('posts.create') }}" class="flex items-center justify-center bg-orange-400 mt-5 text-white lg:py-2 lg:px-4 text-base leading-6 font-bold hover:bg-orange-500 lg:w-52 lg:h-12 md:w-12 md:h-12 md:rounded-full">
                            <svg class="h-6 w-6 lg:mr-2 md:-mr-1 md:-mt-1" viewBox="0 0 512 512">
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
                    </div>
                    @endauth
                </nav>
            </div>
        </aside>
        <main class="w-full md:w-2/5 md:min-w-[450px]">
            <section class="border border-y-0 border-gray-200">
                <div class="flex sticky top-0 bg-white z-20">
                    <div class="flex-1">
                        <h2 class="px-6 py-4 text-xl font-semibold text-gray-700">{{ $title }}</h2>
                        <hr class="border-gray-200">
                    </div>
                </div>
                {{ $slot }}
            </section>
            <div class="h-12 md:hidden"></div>
        </main>
        <aside class="flex justify-start hidden md:block px-4 py-2 h-screen sticky top-0 z-10">
            <div class="flex flex-col justify-start lg:ml-6 relative">
                <auth-dropdown-menu :user="{{ Auth::user() ? Auth::user()->toJson() : 'null' }}">
                    @guest
                    <a href="{{ route('login') }}" class="flex items-center block px-4 py-2 text-sm text-gray-500 font-semibold hover:bg-gray-100">
                        <svg class="h-4 w-4" viewBox="0 0 512 512">
                            <g>
                                <path fill="currentColor" d="M255.988,282.537c78.002,0,141.224-63.221,141.224-141.213c0-77.982-63.222-141.213-141.224-141.213
                                    c-77.99,0-141.203,63.23-141.203,141.213C114.785,219.316,177.998,282.537,255.988,282.537z"></path>
                                <path fill="currentColor" d="M503.748,468.222C473.826,376.236,364.008,326.139,256,326.139c-108.02,0-217.828,50.098-247.75,142.084
                                    c-4.805,14.74-7.428,29.387-8.25,43.666h512C511.166,497.609,508.553,482.963,503.748,468.222z"></path>
                            </g>
                        </svg>
                        <span class="ml-3">ログイン / 新規登録</span>
                    </a>
                    <a href="{{ route('login.guest') }}" class="flex items-center block px-4 py-2 text-sm text-gray-500 font-semibold hover:bg-gray-100">
                        <svg class="h-4 w-4" viewBox="0 0 512 512">
                            <g>
                                <path fill="currentColor" d="M255.988,282.537c78.002,0,141.224-63.221,141.224-141.213c0-77.982-63.222-141.213-141.224-141.213
                                    c-77.99,0-141.203,63.23-141.203,141.213C114.785,219.316,177.998,282.537,255.988,282.537z"></path>
                                <path fill="currentColor" d="M503.748,468.222C473.826,376.236,364.008,326.139,256,326.139c-108.02,0-217.828,50.098-247.75,142.084
                                    c-4.805,14.74-7.428,29.387-8.25,43.666h512C511.166,497.609,508.553,482.963,503.748,468.222z"></path>
                            </g>
                        </svg>
                        <span class="ml-3" onclick="return confirm('ゲストユーザーとしてログインしますか？');">ゲストログイン</span>
                    </a>
                    @endguest
                    @auth
                    <form method="post" action="{{ route('logout') }}" class="flex items-center justify-center block px-4 py-2 text-sm text-red-500 font-semibold hover:bg-gray-100">
                        @csrf
                        <svg class="h-4 w-4" viewBox="0 0 512 512">
                            <g>
                                <path fill="currentColor" d="M255.988,282.537c78.002,0,141.224-63.221,141.224-141.213c0-77.982-63.222-141.213-141.224-141.213
                                    c-77.99,0-141.203,63.23-141.203,141.213C114.785,219.316,177.998,282.537,255.988,282.537z"></path>
                                <path fill="currentColor" d="M503.748,468.222C473.826,376.236,364.008,326.139,256,326.139c-108.02,0-217.828,50.098-247.75,142.084
                                    c-4.805,14.74-7.428,29.387-8.25,43.666h512C511.166,497.609,508.553,482.963,503.748,468.222z"></path>
                            </g>
                        </svg>
                        <button type="submit" class="ml-3" onclick="return confirm('ログアウトしてもよろしいですか？');">ログアウト</button>
                    </form>
                    @endauth
                </auth-dropdown-menu>
            </div>
        </aside>
    </div>
    <!-- Bottom bar -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border z-20">
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
            <a href="{{ route('search.index')}}" class="flex flex-col items-center justify-center">
                <svg class="h-6 w-6 lg:mr-4 md:mr-0" viewBox="0 0 512 512">
                    <g>
                        <path fill="currentColor" d="M495.272,423.558c0,0-68.542-59.952-84.937-76.328c-24.063-23.938-33.69-35.466-25.195-54.931
                            c37.155-75.78,24.303-169.854-38.72-232.858c-79.235-79.254-207.739-79.254-286.984,0c-79.245,79.264-79.245,207.729,0,287.003
                            c62.985,62.985,157.088,75.837,232.839,38.691c19.466-8.485,31.022,1.142,54.951,25.215c16.384,16.385,76.308,84.937,76.308,84.937
                            c31.089,31.071,55.009,11.95,69.368-2.39C507.232,478.547,526.362,454.638,495.272,423.558z M286.017,286.012
                            c-45.9,45.871-120.288,45.871-166.169,0c-45.88-45.871-45.88-120.278,0-166.149c45.881-45.871,120.269-45.871,166.169,0
                            C331.898,165.734,331.898,240.141,286.017,286.012z"></path>
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
<!-- Responsive -->
<div class="fixed bottom-16 right-4 md:hidden z-20">
    <a href="{{ route('posts.create') }}" class="flex justify-center items-center bg-orange-400 p-3 rounded-full hover:bg-orange-500">
        <svg class="h-6 w-6 ml-0.5 -mr-0.5 mb-0.5 -mt-0.5" viewBox="0 0 512 512">
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
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
