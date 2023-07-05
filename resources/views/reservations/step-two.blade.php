<x-guest-layout>
    <section class="min-h-screen bg-white pb-10 dark:bg-gray-900">
        <div class="flex flex-row items-center justify-center pb-10 pt-20 text-4xl dark:text-white lg:pt-28">
          <span>Make Reservation</span>
        </div>
        <div class="mx-auto h-full max-w-4xl flex-1 bg-white">
          <div class="grid border border-gray-600 sm:grid-cols-2">
            <div class="flex flex-row items-center justify-center bg-gray-900">
              <img src="{{ url('/Images/3.jpg') }}" class="h-full w-full" alt="" />
            </div>
            <div class="flex flex-col justify-center bg-white">
              <div class="px-10">
                <div class="p-3">
                  <span class="text-xl font-bold tracking-wide text-yellow-400">Make Reservation</span>
                </div>
                <div class="p-3">
                  <div>
                    <div class="w-full rounded-full border border-gray-200 bg-gray-100 flex justify-end">
                      <div class="flex w-[50%] cursor-pointer items-center justify-center rounded-full border border-yellow-400 bg-yellow-300 text-sm font-semibold text-white hover:bg-yellow-400">Step 2</div>
                    </div>
                  </div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('reservations.store.step.two') }}">
                  @csrf
                  <div class="p-3">
                    <label for="table_id" class="mb-3 block text-base font-medium text-[#07074D]">Table</label>
                    <select id="table_id" class="w-full rounded-md border border-[#e0e0e0] bg-white px-4 py-2 text-base font-medium text-[#6B7280] outline-none focus:border-yellow-300 focus:shadow-md" name="table_id">
                        <option>Choose the table</option>
                        @foreach ($tables as $table)
                            <option value="{{ $table->id }}" {{ $table->id == $reservation->table_id ? 'selected' : '' }}>{{ $table->name }} ({{ $table->guest_number }} Guests)</option>
                        @endforeach
                    </select>
                    @error('guest_number')
                    <div class="mt-1 text-sm text-red-400">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="flex justify-between p-3">
                    <a href="{{ route('reservations.step.one') }}" class="cursor-pointer rounded-full bg-yellow-300 px-6 py-1 font-semibold text-white hover:bg-yellow-400">Back</a>
                    <button class="cursor-pointer rounded-full bg-yellow-300 px-6 py-1 font-semibold text-white hover:bg-yellow-400" type="submit">Confirm</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-guest-layout>
