<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="{ unit: '' }">


    <div class="grid lg:grid-cols-7 grid-cols-1">
      <section class="col-span-2 p-6">
        <select name="pollingUnit" id="pollingUnit" class="w-full" x-model='unit'>
          <option value="" selected disabled>Select a Local Government</option>
          <option value="asaba">Asaba</option>
        </select>
      </section>

      <section class="col-span-5 bg-white lg:p-6 px-2 py-6">
        <table class="w-full">
          <tr>
            <td class="capitalize font-bold px-2 py-2" x-text="unit">Alfreds Futterkiste</td>
            <td class="font-bold px-2 py-2">2,000</td>
          </tr>
          <!-- LIST ALL POLLING UNITS UNDER SELECTED LGA ALONG WITH THEIR RESULTS -->
          <tr>
            <td class="border px-2 py-2">Centro comercial Moctezuma</td>
            <td class="border px-2 py-2">Neal Garrison</td>
          </tr>
          <!-- LIST ALL POLLING UNITS UNDER SELECTED LGA ALONG WITH THEIR RESULTS -->
        </table>
      </section>
    </div>

    
  </div>

</x-app-layout>
