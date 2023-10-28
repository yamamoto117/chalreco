<x-app-layout>
    <x-slot name="title">
        {{ $user->name }} のフォロー中
    </x-slot>

    <main role="main">
        <div class="flex">
            <section class="w-full">
                <x-back />
                <div>
                    @foreach($followings as $person)
                        <x-person :person="$person" />
                        <hr class="border-gray-200">
                    @endforeach
                </div>
            </section>
        </div>
    </main>

</x-app-layout>
