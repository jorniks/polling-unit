<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-sm text-gray-800 leading-tight">
      {{ __('Polls Update View') }}
    </h2>
  </x-slot>

  <div class="pt-6 pb-12 max-w-3xl mx-auto sm:px-6 lg:px-8 min-h-screen">

    @livewire('update-polls')

  </div>

</x-app-layout>
