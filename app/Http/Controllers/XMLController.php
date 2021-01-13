<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addPatient;
use App\Emr;
use App\HospitalHistory;
use App\Treatment;
use App\EmrSummary;
use App\Vital;
use App\Diagnosishealth;
use App\LabResult;
use App\ImagingResult;
use App\Appointment;
use App\Pham;
use App\Soap;

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
        $treatment = Treatment::findOrFail($emr->treatment_id);
        $hospital_histories = HospitalHistory::findOrFail($emr->hospital_histories_id);
        $emr_summary = EmrSummary::findOrFail($emr->emr_summary_id);
        $vitals = Vital::findOrFail($emr->vital_id);
        $diagnosishealths = Diagnosishealth::findOrFail($emr->diagnosishealth_id);
        $lab_results = LabResult::findOrFail($emr->lab_id);
        $imaging_results = ImagingResult::findOrFail($emr->imaging_id);
        $appointments = Appointment::findOrFail($emr->appointment_id);
        $phams = Pham::findOrFail($emr->pham_id);
        $soaps = Soap::findOrFail($emr->soap_id);

        createXML(
        $emr,
        $patientInfo,
        $treatment,
        $hospital_histories,
        $emr_summary,
        $vitals,
        $diagnosishealths,
        $lab_results,
        $imaging_results,
        $appointments,
        $phams,
        $soaps
        );

        return response()->json([ 'msg' => 'Xuất XML thành công!' ], 200);
    }
}
