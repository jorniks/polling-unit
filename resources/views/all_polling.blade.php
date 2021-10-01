<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-sm text-gray-800 leading-tight">
      {{ __('LGA Aggregate Dashboard') }}
    </h2>
  </x-slot>

  <div class="pt-6 pb-12 max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-screen" x-data="{ unit: '' }">

    @livewire('lga-reports')
    
  </div>

</x-app-layout>
