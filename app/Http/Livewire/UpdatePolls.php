<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;


class UpdatePolls extends Component {
  public $lgaSelect = 2,
          $puWard,
          $wards = [],
          $puDescription,
          $puName,
          // VARIABLES BELOW ARE FOR ADD POLLING RESULTS
          $pollingUnits,
          $pollingUnit = '_',
          $parties,
          $partySelect,
          $resultEntry;


  public function render() {
    if(!empty($this->lgaSelect)) {
      $this->wards = DB::table('ward')->where('lga_id', $this->lgaSelect)->orderBy('ward_name', 'asc')->get();
    }

    $this->pollingUnits = DB::table('polling_unit')->where('entered_by_user', 'Jorniks')->get();
    $this->parties = DB::table('party')->get();
    
    return view('livewire.update-polls')->withLgas(DB::table('lga')->orderBy('lga_name', 'asc')->get());
  }


  public function savePollingUnit() {
    $puNumber = "DT" . rand(30000, 99999);
    $uniquewardid = DB::table('ward')->where('ward_id', $this->puWard)->first()->uniqueid;
    $polling_unit_id = "";
    $lat = (float)rand() / (float)getrandmax();
    $long = (float)rand() / (float)getrandmax();
    $user_ip_address = \Request::ip();
    $date_entered = date('Y-m-d G:i:s', time());
    $entered_by_user = 'Jorniks';

    DB::table('polling_unit')
        ->insert([
          'polling_unit_id' => (rand(17, 99) * 3),
          'ward_id' => $this->puWard,
          'lga_id' => $this->lgaSelect,
          'uniquewardid' => $uniquewardid,
          'polling_unit_number' => $puNumber,
          'polling_unit_name' => $this->puName,
          'polling_unit_description' => $this->puDescription,
          'lat' => $lat,
          'long' => $long,
          'entered_by_user' => $entered_by_user,
          'date_entered' => $date_entered,
          'user_ip_address' => $user_ip_address
        ]);

    // RESET ALL WIRE MODELS TO CLEAR THE FORM
    $this->lgaSelect = 2;
    $this->puWard = NULL;
    $this->wards = [];
    $this->puDescription = NULL;
    $this->puName = NULL;

    $this->emit('puSaved'); // EMIT EVENT TO SHOW USER THAT ACTION SUCCEEDED
    return;
  }


  public function addPollsResult() {
    $user_ip_address = \Request::ip();
    $date_entered = date('Y-m-d G:i:s', time());
    $entered_by_user = 'Jorniks';

    DB::table('announced_pu_results')->insert([
      'polling_unit_uniqueid' => $this->pollingUnit,
      'party_abbreviation' => $this->partySelect,
      'party_score' => $this->resultEntry,
      'entered_by_user' => $entered_by_user,
      'date_entered' => $date_entered,
      'user_ip_address' => $user_ip_address
    ]);

    $this->pollingUnit = '_';
    $this->partySelect = NULL;
    $this->resultEntry = NULL;

    $this->emit('pollsSaved');
    return;
  }


}
