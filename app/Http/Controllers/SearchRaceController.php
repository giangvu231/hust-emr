<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;
use App\HospitalHistory;
use App\addPatient;

class SearchRaceController extends Controller
{
    public function postSearch(Request $request)
    {
    	$search = $request->name;
    	$dataName = Race::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }

}
