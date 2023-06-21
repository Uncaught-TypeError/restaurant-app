<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.tables.index') }}" class="py-2 hover:text-indigo-700 text-indigo-500">Back</a>
            </div>
            <div class="m-2 p-2">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.tables.update', $table->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">
                            <h2 class="text-base font-semibold leading-7 text-gray-900">New Table</h2>
                            <p class="mt-1 text-sm leading-6 text-gray-600">This new table will be displayed publicly so be careful what you create.</p>

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Table Name</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="name" value="{{ $table->name }}" id="name" autocomplete="name" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="T-1, etc.">
                                    </div>
                                </div>
                                @error('name')
                                    <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="sm:col-span-4">
                                <label for="guest_number" class="block text-sm font-medium leading-6 text-gray-900">Guest Number</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="number" value="{{ $table->guest_number }}" name="guest_number" id="guest_number" autocomplete="guest_number" class="block flex-1 border-0 bg-transparent py-1.5 pl-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="0">
                                    </div>
                                </div>
                                @error('guest_number')
                                    <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-span-full">
                                <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                                <div class="mt-2">
                                    <select id="status" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5  dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" name="status">
                                        <option>Choose the status</option>
                                        @foreach (App\Enums\TableStatus::cases() as $status)
                                            <option value="{{ $status->value }}" @selected($table->status->value == $status->value)>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('status')
                                    <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="col-span-full">
                                <label for="status" class="block text-sm font-medium leading-6 text-gray-900">Status</label>
                                <div class="mt-2">
                                    <label class="relative inline-flex items-center mr-5 cursor-pointer">
                                        <input type="checkbox" id="status" name="status" value="0" role="switch" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-300 peer-focus:ring-1
                                        peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full
                                        peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5
                                        after:left-[2px] after:bg-white after:border-gray-300 after:border
                                        after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"
                                        onclick="toggle()"></div>
                                    </label>
                                </div>
                            </div> --}}

                            <div class="col-span-full">
                                <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                                <div class="mt-2">
                                    <select id="location" class="rounded-md bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5  dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" name="location">
                                        <option>Choose the location</option>
                                        @foreach (App\Enums\TableLocation::cases() as $location)
                                            <option value="{{ $location->value }}" @selected($table->location->value == $location->value)>{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('location')
                                    <div class="text-sm text-red-400 mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-gray-900">
                        <a href="{{ route('admin.tables.index') }}">Cancel</a>
                    </button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggle(){
            let orig_status = document.getElementById('status').value;
            // console.log(orig_status);
            if (orig_status == 0){
                document.getElementById("status").setAttribute('value','1');
            }
            else {
                document.getElementById("status").setAttribute('value','0');
            }
            // let orig_status2 = document.getElementById('status').value;
            // console.log(orig_status2);
        }
    </script>
</x-admin-layout>
