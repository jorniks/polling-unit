<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="{ unit: '' }">

    <section class="col-span-2 p-6">

      <form method="post" class="grid grid-cols-1 gap-4">
        <select name="pollingUnit" id="pollingUnit" class="w-full" x-model='unit'>
          <option value="" selected disabled>Select a Local Government</option>
          <option value="asaba">Asaba</option>
        </select>
        <select name="pollingUnit" id="pollingUnit" class="w-full" x-model='unit'>
          <option value="" selected disabled>Select a Local Government</option>
          <option value="asaba">Asaba</option>
        </select>
        <input type="text" name="resultEntry" id="resultEntry" class="" placeholder="Enter Polling Unit Result">

        <div class="text-right mt-3">
          <button class="px-4 py-2 lg:w-1/3 w-full bg-blue-600 text-white text-center">Submit</button>
        </div>
      </form>

    </section>


    
  </div>

</x-app-layout>
