<div>
    <div class="{{ $user->header_image ? '' : 'bg-gray-200' }} h-48 w-full relative -z-10">
        @if($user->header_image)
        <img class="w-full h-full object-cover" src="{{ $user->header_image }}">
        @endif
    </div>
    <div class="p-4 break-words">
        <div class="flex items-start">
            @if( Auth::id() !== $user->id )
                <follow-button
                class="ml-auto"
                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                >
                </follow-button>
            @else
                <div class="h-11"></div>
            @endif
            @if(Auth::id() === $user->id && Auth::id() !== 1)
                <div class="flex items-center ml-auto">
                    <a href="{{ route('users.edit', ['name' => $user->name]) }}" class="ml-auto text-gray-700 border border-gray-400 px-4 py-2 rounded-full hover:bg-gray-50">プロフィール編集</a>
                    <dropdown-menu class="ml-3">
                        <form method="post" action="{{ route('users.destroy', ['name' => $user->name]) }}" class="flex items-center block px-4 py-2 text-sm text-red-500 font-semibold hover:bg-gray-100">
                            @method('DELETE')
                            @csrf
                            <svg class="h-4 w-4" viewBox="0 0 512 512">
                                <g>
                                    <path fill="currentColor" d="M255.988,282.537c78.002,0,141.224-63.221,141.224-141.213c0-77.982-63.222-141.213-141.224-141.213
                                        c-77.99,0-141.203,63.23-141.203,141.213C114.785,219.316,177.998,282.537,255.988,282.537z"></path>
                                    <path fill="currentColor" d="M503.748,468.222C473.826,376.236,364.008,326.139,256,326.139c-108.02,0-217.828,50.098-247.75,142.084
                                        c-4.805,14.74-7.428,29.387-8.25,43.666h512C511.166,497.609,508.553,482.963,503.748,468.222z"></path>
                                </g>
                            </svg>
                            <button type="submit" class="ml-3" onclick="return confirm('このアカウントを削除してもよろしいですか？');">
                                アカウント削除
                            </button>
                        </form>
                    </dropdown-menu>
                </div>
            @endif
        </div>
        <div class="-mt-32">
            <div class="h-32 w-32 bg-white overflow-hidden rounded-full border-4 border-white">
                <img class="w-full h-full object-cover" src="{{ $user->profile_image ? $user->profile_image : '/images/profile-icon.png' }}">
            </div>
        </div>
        <div class="justify-center w-full mt-3">
            <div class="mb-4">
                <h2 class="text-xl leading-6 font-bold text-gray-700">{{ $user->name }}</h2>
            </div>
            <div class="mb-4">
                <h2 class="text-gray-700">{{ $user->bio }}</h2>
            </div>
            <div class="flex items-center text-sm text-gray-400 mb-4">
                <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="mr-4"><span class="font-semibold">{{ $user->count_followings }}</span> フォロー</a>
                <a href="{{ route('users.followers', ['name' => $user->name]) }}"><span class="font-semibold">{{ $user->count_followers }}</span> フォロワー</a>
            </div>
        </div>
        <div class="flex flex-wrap justify-center">
            <div class="w-1/2 pr-1">
                <div class="flex items-center justify-center py-1 bg-white border border-orange-400 rounded">
                    <svg class="h-4 w-4 text-orange-400 fill-current mr-2" viewBox="0 0 512 512">
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
                        <h4 class="font-semibold text-gray-700">{{ $inProgressCount }}</h4>
                    </div>
                </div>
            </div>
            <div class="w-1/2 pl-1">
                <div class="flex items-center justify-center py-1 bg-white border border-gray-400 rounded">
                    <svg class="h-4 w-4 text-gray-400 fill-current mr-2" viewBox="0 0 512 512">
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
                        <h4 class="font-semibold text-gray-700">{{ $inCompletedCount }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
