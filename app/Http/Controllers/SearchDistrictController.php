<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\HospitalHistory;
use App\addPatient;

class SearchDistrictController extends Controller
{
    public function postSearch(Request $request)
    {
    	$search = $request->name;
    	$dataName = District::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }

}
