<div>
  {{-- "Knowing others is intelligence; knowing yourself is true wisdom." --}}

  <div class="grid lg:grid-cols-7 grid-cols-1">
    <section class="col-span-2  lg:p-6 px-2 py-6">
      <select name="pollingUnit" id="pollingUnit" class="w-full shadow-lg" x-model='unit' wire:model="lgaSelect">
        <option value="" selected disabled>Select a Local Government</option>
        @foreach($lgas as $lga)
          <option value="{{ $lga->lga_name }}">{{ $lga->lga_name }}</option>
        @endforeach
      </select>
    </section>

    <section class="col-span-5 bg-white lg:p-6 px-2 py-6 shadow">
      <table class="w-full">
        @if(count($pollingUnits) > 0)
          <tr>
            <td class="capitalize font-bold px-2 py-2" x-text="unit"></td>
            <td class="font-bold px-2 py-2">
              {{ number_format($party_scores) }}
            </td>
          </tr>
        @endif

        @forelse($pollingUnits as $unit => $pollingUnit)
            <!-- LIST ALL PARTY UNDER SELECTED LGA ALONG WITH THEIR RESULTS -->
            <tr>
              <td class="border px-2 py-2">{{ $unit }}</td>
              <td class="border px-2 py-2">
                {{ number_format($pollingUnits[$unit]->sum('party_score')) }}
              </td>
            </tr>
            <!-- LIST ALL PARTY UNDER SELECTED LGA ALONG WITH THEIR RESULTS -->
        @empty
          <tr>
            @if($lgaSelect)
              <td class="px-2 py-2"> No Results found for <span x-text="unit"></span> </td>
            @else
              <td class="px-2 py-2"> Select a Local Government to see Polls result </td>
            @endif
          </tr>
        @endforelse
      </table>
    </section>
  </div>
</div>
