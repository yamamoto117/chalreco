@props(['value'])

<label {{ $attributes->merge(['class' => 'text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>

{{-- @props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label> --}}
