<div>
    <div class="w-full bg-gray-200 h-48"></div>
    <div class="p-4">
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
                <dropdown-menu class="ml-auto">
                    <form action="{{ route('users.delete', ['name' => $user->name]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-red-500 py-2 px-4" onclick="return confirm('アカウントを削除してもよろしいですか？');">アカウント削除</button>
                    </form>
                </dropdown-menu>
            @endif
        </div>
        <div class="-mt-32">
            <div class="rounded-full h-36 w-36">
                <img class="h-32 w-32 rounded-full border-4 border-white" src="/images/profile-icon.png" alt="icon">
            </div>
        </div>
        <div class="justify-center w-full mt-3 ml-3">
            <div class="mb-4">
                <h2 class="text-xl leading-6 font-bold text-gray-700">{{ $user->name }}</h2>
            </div>
            <div class="flex items-center text-sm text-gray-400">
                <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="mr-4"><span class="font-semibold">{{ $user->count_followings }}</span> フォロー</a>
                <a href="{{ route('users.followers', ['name' => $user->name]) }}"><span class="font-semibold">{{ $user->count_followers }}</span> フォロワー</a>
            </div>
        </div>
    </div>
</div>
