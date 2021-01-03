<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Icd10;
use App\HospitalHistory;

class SearchController extends Controller
{
    public function postSearch(Request $request)
    {
    	$search = $request->name;
    	$dataName = Icd10::where('name', 'LIKE', "%$search%")->get();
        return $dataName;

        // $data = HospitalHistory::create($request->all());
        // HospitalHistory::where('patient_id', $data->patient_id)->update([
        //     'icd10_name' => $dataName->name
        // ]);
    }

}
