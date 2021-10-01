<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-sm text-gray-800 leading-tight">
            {{ __('Polls Dashboard') }}
        </h2>
    </x-slot>

  <div class="pt-6 pb-12 max-w-5xl mx-auto sm:px-6 lg:px-8" x-data="{selected:null}">

    <p class="pb-3 px-3 font-bold text-xl">
      List of all polling Units with Results for each unit
    </p>

    <ul class="shadow-lg bg-white">
    
      @foreach($pollingUnits as $pollingUnit)
        <li class="relative border-b border-gray-200">
          <div class="w-full px-4 py-3 flex items-center justify-between capitalize">
            <a class="w-full cursor-pointer" @click="selected !== {{ $pollingUnit->uniqueid }} ? selected = {{ $pollingUnit->uniqueid }} : selected = null">
              {{ $pollingUnit->polling_unit_name }}
            </a>
            <span class="fas fa-caret-down"></span>
          </div>

          <div class="border-t relative overflow-hidden transition-all max-h-0 duration-700" x-ref="container{{ $pollingUnit->uniqueid }}" x-bind:style="selected == {{ $pollingUnit->uniqueid }} ? 'max-height: ' + $refs.container{{ $pollingUnit->uniqueid }}.scrollHeight + 'px' : ''">
            <div class="p-6">
              <table class="w-full">
                @foreach($results as $result)
                  @if($pollingUnit->uniqueid == $result->polling_unit_uniqueid)
                    <tr>
                      <td class="border px-2 py-2">{{ $result->party_abbreviation }}</td>
                      <td class="border px-2 py-2">{{ number_format($result->party_score) }}</td>
                    </tr>
                  @endif
                @endforeach
              </table>
            </div>
          </div>
        </li>
      @endforeach

    </ul>

  </div>
</x-app-layout>