@foreach($users as $person)
    <div>
        <x-person :person="$person" />
        <hr class="border-gray-200">
    </div>
@endforeach
