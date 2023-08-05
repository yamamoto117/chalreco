<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full flex justify-center text-base leading-6 bg-orange-400 mt-5 hover:bg-orange-500 text-white py-2 px-4 rounded-full']) }}>
    {{ $slot }}
</button>

{{-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button> --}}
