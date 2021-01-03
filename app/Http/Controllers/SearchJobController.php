<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\HospitalHistory;
use App\addPatient;

class SearchJobController extends Controller
{
    public function postSearch(Request $request)
    {
    	$search = $request->name;
    	$dataName = Job::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }

}
