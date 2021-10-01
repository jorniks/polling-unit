<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller {
  
  
  public function fetchAllPollingUnitsResult() {
    $pollingResults = DB::table('announced_pu_results')
                      ->join('polling_unit', 'polling_unit.uniqueid', 'announced_pu_results.polling_unit_uniqueid')
                      ->where('polling_unit.polling_unit_name', '<>', '')
                      ->orderBy('polling_unit.uniqueid', 'asc')
                      ->get();

    $pollingUnits = $pollingResults->unique('polling_unit_name');

    return view('home', ['results' => $pollingResults, 'pollingUnits' => $pollingUnits]);
  }

  
}
