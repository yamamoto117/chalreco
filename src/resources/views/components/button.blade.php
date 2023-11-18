<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full flex justify-center text-base leading-6 bg-orange-400 hover:bg-orange-500 text-white py-2 px-4 rounded-full']) }}>
    {{ $slot }}
</button>
