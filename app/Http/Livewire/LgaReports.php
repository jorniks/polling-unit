<?php

namespace App\Http\Livewire;
use DB;
use Livewire\Component;


class LgaReports extends Component {

  public $lgaSelect,
          $pollingUnits = [],
          $party_scores;

  public function render() {
    if(!empty($this->lgaSelect)) {
      $this->party_scores = 0; // RESET PARTY SCORE
      
      // QUERY pu_results TABLE, JOIN WITH polling_unit TABLE ALONG WITH lga TABLE BASED ON THE VALUE SUPPLIED BY onChange TRIGGERED BY USER ACTIVITY ON THE <select> TAG OF THE UI
      // GROUP THE RESULT BY THE PARTY ABBREVIATION FOR PROPER FILTERING
      $this->pollingUnits = DB::table('announced_pu_results')
                            ->join('polling_unit', 'polling_unit.uniqueid', 'announced_pu_results.polling_unit_uniqueid')
                            ->join('lga', 'lga.lga_id', 'polling_unit.lga_id')
                            ->where('lga.lga_name', $this->lgaSelect)
                            ->select('polling_unit.polling_unit_name', 'lga.lga_name', 'announced_pu_results.*')
                            ->get()
                            ->groupBy('party_abbreviation');
      
      // ENTER INTO pollingUnits COLLECTION, GRAB party_score FOR ALL PARTIES AND SUM THEM UP TO GET SUM TOTAL FOR EACH PARTY IN EACH LOCAL GOVERNMENT AREA
      $this->pollingUnits->map(function($score){
                            return $this->party_scores += $score->sum('party_score');
                          });
    }

    return view('livewire.lga-reports')->withLgas(DB::table('lga')->orderBy('lga_name', 'asc')->get());
  }


}
