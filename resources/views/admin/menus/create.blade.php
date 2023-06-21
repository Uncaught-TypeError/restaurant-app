<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" class="py-2 hover:text-indigo-700 text-indigo-500">Back</a>
            </div>
            <div class="m-2 p-2">
                <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">New Menu</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">This new menu will be displayed publicly so be careful what you create.</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Item Name</label>
                            <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input type="text" name="name" id="name" autocomplete="name" class="block flex-1 border-0
                                bg-transparent py-1.5 pl-2 text-gray-900
                                placeholder:text-gray-400 focus:ring-0 sm:text-sm
                                sm:leading-6" placeholder="Pancake, etc.">
                            </div>
                            </div>
                            @error('name')
                                <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <div class="sm:col-span-4">
                                <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                                <div class="relative mt-2 rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <input type="text" name="price" id="price" class="block w-52 rounded-md
                                    border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1
                                    ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2
                                    focus:ring-inset focus:ring-indigo-600 sm:text-sm
                                    sm:leading-6" placeholder="0.00" />
                                </div>
                            </div>
                            @error('price')
                                <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description" rows="3" class="block w-full rounded-md
                                border-0 py-1.5 text-gray-900 shadow-sm ring-1
                                ring-inset ring-gray-300 placeholder:text-gray-400
                                focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm
                                sm:leading-6"></textarea>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about the item.</p>
                            @error('description')
                                <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="categories" class="block text-sm font-medium leading-6 text-gray-900">Categories</label>
                            <div class="mt-2">
                                <select multiple id="categories" class="form-multiselect bg-gray-50 border
                                border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-indigo-500 focus:border-indigo-500 block w-96 p-2.5
                                dark:placeholder-gray-400
                                dark:focus:ring-indigo-500 dark:focus:border-indigo-500" name="categories[]">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">Choose the category concerning with the item.</p>
                            @error('categories[]')
                                <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-span-full">
                            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                </svg>
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="image" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                            </div>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-gray-600">The uploaded image won't appear here.</p>
                            @error('image')
                                <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                        <a href="{{ route('admin.menus.index') }}">Cancel</a>
                    </button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
