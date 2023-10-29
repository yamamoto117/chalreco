<x-app-layout>
    <x-slot name="title">
        検索
    </x-slot>

    <div class="flex items-center">
        <x-back />
        <form action="{{ route('search.index') }}" method="GET" class="flex w-full">
            <div class="flex items-center w-full mr-4">
                <input type="text" name="keyword" value="{{ $keyword }}" placeholder="キーワードを入力" class="h-10 border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 flex-grow px-2 py-1 rounded-l-md">
                <button type="submit" class="flex items-center justify-center text-base leading-6 bg-orange-400 hover:bg-orange-500 text-white h-10 w-10 rounded-r-md">
                    <svg class="h-4 w-4" viewBox="0 0 512 512">
                        <g>
                            <path fill="currentColor" d="M495.272,423.558c0,0-68.542-59.952-84.937-76.328c-24.063-23.938-33.69-35.466-25.195-54.931
                                c37.155-75.78,24.303-169.854-38.72-232.858c-79.235-79.254-207.739-79.254-286.984,0c-79.245,79.264-79.245,207.729,0,287.003
                                c62.985,62.985,157.088,75.837,232.839,38.691c19.466-8.485,31.022,1.142,54.951,25.215c16.384,16.385,76.308,84.937,76.308,84.937
                                c31.089,31.071,55.009,11.95,69.368-2.39C507.232,478.547,526.362,454.638,495.272,423.558z M286.017,286.012
                                c-45.9,45.871-120.288,45.871-166.169,0c-45.88-45.871-45.88-120.278,0-166.149c45.881-45.871,120.269-45.871,166.169,0
                                C331.898,165.734,331.898,240.141,286.017,286.012z"></path>
                        </g>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    @forelse($posts as $post)
        <div>
            <x-post-list-card :post="$post" />
            <hr class="border-gray-200">
        </div>
    @empty
        <hr class="border-gray-200">
    @endforelse

</x-app-layout>
