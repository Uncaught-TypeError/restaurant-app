<x-guest-layout>
    <section class="bg-white dark:bg-gray-900 min-h-screen">
        <div class="dark:text-white flex flex-row justify-center items-center pt-20 text-4xl lg:pt-28">
            <span>Chef's Creations</span>
        </div>
        <div class="items-center max-w-screen-xl px-4 py-8 mx-auto md:grid flex flex-col md:grid-cols-2 lg:grid-cols-4 lg:gap-10 xl:gap-10 lg:py-10 lg:px-6 gap-5">
            @foreach ($menus as $menu)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-[300px] h-[150px]" src="{{ Storage::url($menu->image) }}" alt="" />
                </a>
                <div class="p-5">
                    @foreach ($menu->categories as $category)
                        <a href="{{ route('categories.index') }}">
                            <span class="border text-base border-yellow-200 bg-yellow-200 rounded-full px-1 p-auto">{{ $category->name }}</span>
                        </a>
                    @endforeach
                    <div class='flex justify-between items-center'>
                        <h5 class="mb-2 mt-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $menu->name }}</h5>
                        <span class="text-white text-lg">$ {{ $menu->price }}</span>
                    </div>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $menu->description }}</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-700 rounded-lg hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        Order Now
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </section>
</x-guest-layout>
