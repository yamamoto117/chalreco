<div>
    <div class="{{ $user->header_image ? '' : 'bg-gray-200' }} h-48 w-full">
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
                        <form action="{{ route('users.delete', ['name' => $user->name]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-red-500 py-2 px-4" onclick="return confirm('アカウントを削除してもよろしいですか？');">アカウント削除</button>
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
