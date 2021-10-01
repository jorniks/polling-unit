<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

  <section class="col-span-2 lg:p-6 p-3" x-data="{ showPanel: true }">

    <div class="grid grid-cols-2 gap-x-4 mb-2">
      <div class="col-span-1">
        <button class="cursor-pointer w-full px-4 py-2 bg-green-600 text-white font-bold" @click="showPanel = true">Add Polling Unit</button>
      </div>
      <div class="col-span-1">
        <button class="cursor-pointer w-full px-4 py-2 bg-green-600 text-white font-bold" @click="showPanel = false">Add Polls Result</button>
      </div>
    </div>

    <div class="" x-show="showPanel">
      <form method="post" class="grid grid-cols-1 gap-4" wire:submit.prevent="savePollingUnit">
        <select name="lgaSelect" id="lgaSelect" class="w-full" wire:model="lgaSelect" required>
          <option value="" selected disabled>Select a Local Government</option>
          @foreach($lgas as $lga)
            <option value="{{ $lga->lga_id }}">{{ $lga->lga_name }}</option>
          @endforeach
        </select>

        <select name="pollingWard" id="pollingWard" class="w-full" wire:model="puWard" required>
          <option value="" selected disabled>Select a Ward</option>
          @foreach($wards as $ward)
            <option value="{{ $ward->ward_id }}">{{ $ward->ward_name }}</option>
          @endforeach
        </select>

        <input type="text" name="puName" id="puName" class="" placeholder="Enter Polling Unit Name" wire:model="puName" required>

        <input type="text" name="puDescription" id="puDescription" class="" placeholder="Enter Polling Unit Description" wire:model="puDescription">

        <div x-data="{ shown: false, timeout: null }"
            x-init="@this.on('puSaved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
            x-show.transition.opacity.out.duration.1500ms="shown"
            style="display: none;">
            {{ __('New Polling Unit Added.') }}
        </div>

        <div class="text-right mt-3">
          <button class="px-4 py-2 lg:w-1/2 w-full bg-blue-600 text-white text-center">Submit</button>
        </div>
      </form>
    </div>




    <div class="" x-show="!showPanel">
      @if(count($pollingUnits) > 0)
        <form method="post" class="grid grid-cols-1 gap-4" wire:submit.prevent="addPollsResult">
          <select name="pollingUnit" id="pollingUnit" class="w-full" wire:model="pollingUnit" required>
            <option value="_" selected disabled>Select a Polling Unit</option>
            @foreach($pollingUnits as $pollingUnit)
              <option value="{{ $pollingUnit->uniqueid }}">
                {{ $pollingUnit->polling_unit_name }}
              </option>
            @endforeach
          </select>

          <select name="partySelect" id="partySelect" class="w-full" wire:model="partySelect" required>
            <option value="" selected disabled>Select a Party</option>
            @foreach($parties as $party)
              <option value="{{ $party->partyid }}"> {{ $party->partyname }} </option>
            @endforeach
          </select>

          <input type="text" name="resultEntry" id="resultEntry" class="" placeholder="Enter Polling Unit Result" required wire:model="resultEntry">

          <div x-data="{ shown: false, timeout: null }"
              x-init="@this.on('pollsSaved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
              x-show.transition.opacity.out.duration.1500ms="shown"
              style="display: none;">
              {{ __('Polling Result Added.') }}
          </div>

          <div class="text-right mt-3">
            <button class="px-4 py-2 lg:w-1/2 w-full bg-blue-600 text-white text-center">Submit</button>
          </div>
        </form>
      @else
        <p class="font-bold text-lg mt-6">
          You need to add a new polling unit to be able to add polls result
        </p>
      @endif
    </div>

  </section>
</div>
