<div class="m-4">
    <div class="flex items-center">
        <a href="{{ route('users.show', ['name' => $person->name]) }}">
            <img class="h-10 w-10 object-cover rounded-full hover:opacity-80 transition-opacity" src="{{ $person->profile_image ? $person->profile_image : '/images/profile-icon.png' }}" alt="icon">
        </a>
        <p class="ml-2">
            <a href="{{ route('users.show', ['name' => $person->name]) }}" class="no-underline hover:underline text-inherit">{{ $person->name }}</a>
        </p>
        @if( Auth::id() !== $person->id )
        <follow-button
            class="ml-auto"
            :initial-is-followed-by='@json($person->isFollowedBy(Auth::user()))'
            :authorized='@json(Auth::check())'
            endpoint="{{ route('users.follow', ['name' => $person->name]) }}"
        >
        </follow-button>
        @endif
    </div>
</div>
