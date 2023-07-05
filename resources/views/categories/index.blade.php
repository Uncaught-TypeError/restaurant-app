<x-guest-layout>
    <section class="bg-white dark:bg-gray-900 min-h-screen">
        <div class="dark:text-white flex flex-row justify-center items-center pt-20 text-4xl lg:pt-28">
            <span>Tempting Specialties</span>
        </div>
        <div class="items-center max-w-screen-xl px-4 py-8 mx-auto md:grid flex flex-col md:grid-cols-2 lg:grid-cols-4 lg:gap-10 xl:gap-10 lg:py-10 lg:px-6 gap-5">
        @foreach ($categories as $category)
            <a href="{{ route('categories.show',$category->id) }}">
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 transform hover:scale-105 transition-all duration-300">
                    <img class="rounded-t-lg w-[300px] h-[150px]" src="{{ Storage::url($category->image) }}" alt="" />
                    <div class="p-5">
                        <div class=''>
                            <h5 class="mb-2 mt-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $category->name }}</h5>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $category->description }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
</x-guest-layout>
