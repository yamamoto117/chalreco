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
            @if(Auth::id() === $user->id)
                <div class="flex items-center ml-auto">
                    <a href="{{ route('users.edit', ['name' => $user->name]) }}" class="ml-auto text-gray-700 border border-gray-400 py-2 px-4 rounded-full hover:bg-gray-50">プロフィール編集</a>
                    <dropdown-menu class="ml-3">
                        <form method="post" action="{{ route('users.delete', ['name' => $user->name]) }}" class="flex items-center block px-4 py-2 text-sm text-red-500 font-semibold hover:bg-gray-100">
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
            <div class="flex items-center text-sm text-gray-400">
                <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="mr-4"><span class="font-semibold">{{ $user->count_followings }}</span> フォロー</a>
                <a href="{{ route('users.followers', ['name' => $user->name]) }}"><span class="font-semibold">{{ $user->count_followers }}</span> フォロワー</a>
            </div>
        </div>
    </div>
</div>
