<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\HospitalHistory;
use App\addPatient;

class SearchCityController extends Controller
{
    public function postSearch(Request $request)
    {
    	$search = $request->name;
    	$dataName = City::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }

}
