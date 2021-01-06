<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addPatient;
use App\Emr;
use App\HospitalHistory;

class XMLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $emr = Emr::findOrFail($id);
        $patientInfo = addPatient::findOrFail($emr->patient_id);

        createXML($patientInfo);

        return response()->json([ 'msg' => 'Xuất tệp XML thành công!' ], 200);
    }
}
