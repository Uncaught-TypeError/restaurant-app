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
                    <div class="w-full rounded-full border border-gray-200 bg-gray-100">
                      <div class="flex w-[50%] cursor-pointer items-center justify-center rounded-full border border-yellow-400 bg-yellow-300 text-sm font-semibold text-white hover:bg-yellow-400">Step 1</div>
                    </div>
                  </div>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ route('reservations.store.step.one') }}">
                  @csrf
                  <div class="p-3">
                    <label for="first_name" class="mb-3 block text-base font-medium text-[#07074D]"> First Name </label>
                    <input type="text" value="{{ $reservation->first_name ?? '' }}" name="first_name" id="first_name" placeholder="First Name" class="w-full rounded-md border border-[#e0e0e0] bg-white px-4 py-2 text-base font-medium text-[#6B7280] outline-none focus:border-yellow-300 focus:shadow-md" />
                    @error('first_name')
                    <div class="mt-1 text-sm text-red-400">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="p-3">
                    <label for="last_name" class="mb-3 block text-base font-medium text-[#07074D]"> Last Name </label>
                    <input type="text" value="{{ $reservation->last_name ?? '' }}" name="last_name" id="last_name" placeholder="Last Name" class="w-full rounded-md border border-[#e0e0e0] bg-white px-4 py-2 text-base font-medium text-[#6B7280] outline-none focus:border-yellow-300 focus:shadow-md" />
                    @error('last_name')
                    <div class="mt-1 text-sm text-red-400">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="p-3">
                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]"> Email </label>
                    <input type="email" value="{{ $reservation->email ?? '' }}" name="email" id="email" placeholder="Email" class="w-full rounded-md border border-[#e0e0e0] bg-white px-4 py-2 text-base font-medium text-[#6B7280] outline-none focus:border-yellow-300 focus:shadow-md" />
                    @error('email')
                    <div class="mt-1 text-sm text-red-400">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="p-3">
                    <label for="tel_number" class="mb-3 block text-base font-medium text-[#07074D]"> Phone Number </label>
                    <input type="text" name="tel_number" value="{{ $reservation->tel_number ?? '' }}" id="tel_number" placeholder="Phone Number" class="w-full rounded-md border border-[#e0e0e0] bg-white px-4 py-2 text-base font-medium text-[#6B7280] outline-none focus:border-yellow-300 focus:shadow-md" />
                    @error('tel_number')
                    <div class="mt-1 text-sm text-red-400">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="p-3">
                    <label for="res_date" class="mb-3 block text-base font-medium text-[#07074D]"> Date </label>
                    <input type="datetime-local"
                    value="{{ $reservation && $reservation->res_date ? date('Y-m-d\TH:i:s', strtotime($reservation->res_date)) : '' }}"
                    min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                    max="{{ $max_date->format('Y-m-d\TH:i:s') }}" name="res_date" id="res_date" class="w-full rounded-md border border-[#e0e0e0] bg-white px-4 py-2 text-base font-medium text-[#6B7280] outline-none focus:border-yellow-300 focus:shadow-md" />
                    <p class="text-sm">Please choose the time between 17:00 - 23:00</p>
                    @error('res_date')
                    <div class="mt-1 text-sm text-red-400">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="p-3">
                    <label for="guest_number" class="mb-3 block text-base font-medium text-[#07074D]"> Guest Number </label>
                    <input type="number" value="{{ $reservation->guest_number ?? '' }}" name="guest_number" placeholder="Guest Numbers" id="guest_number" class="w-full rounded-md border border-[#e0e0e0] bg-white px-4 py-2 text-base font-medium text-[#6B7280] outline-none focus:border-yellow-300 focus:shadow-md" />
                    @error('guest_number')
                    <div class="mt-1 text-sm text-red-400">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="flex justify-end p-3">
                    <button class="cursor-pointer rounded-full bg-yellow-300 px-6 py-1 font-semibold text-white hover:bg-yellow-400" type="submit">Next</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
</x-guest-layout>
