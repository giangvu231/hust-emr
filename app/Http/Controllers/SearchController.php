<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icd10;
use App\Lab;
use App\Job;
use App\City;
use App\District;
use App\Nation;
use App\Race;
use App\HospitalHistory;

class SearchController extends Controller
{
    public function postSearch(Request $request)
    {
    	$search = $request->name;
    	$dataName = Icd10::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }

    public function searchLab(Request $request)
    {
    	$search = $request->name;
    	$dataName = Lab::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }

    public function searchJob(Request $request)
    {
    	$search = $request->name;
    	$dataName = Job::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }

    public function searchCity(Request $request)
    {
    	$search = $request->name;
    	$dataName = City::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }

    public function searchDistrict(Request $request)
    {
    	$search = $request->name;
    	$dataName = District::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }

    public function searchNation(Request $request)
    {
    	$search = $request->name;
    	$dataName = Nation::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }

    public function searchRace(Request $request)
    {
    	$search = $request->name;
    	$dataName = Race::where('name', 'LIKE', "%$search%")->get();
        return $dataName;
    }


}