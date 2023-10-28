<x-app-layout>
    <x-slot name="title">
        {{ $user->name }} のフォロワー
    </x-slot>

    <main role="main">
        <div class="flex">
            <section class="w-full">
                <x-back />
                <div>
                    @foreach($followers as $person)
                        <x-person :person="$person" />
                        <hr class="border-gray-200">
                    @endforeach
                </div>
            </section>
        </div>
    </main>

</x-app-layout>
