<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\addPatient;
use App\HospitalHistory;
use App\Vital;
use App\Diagnosishealth;
use App\LabResult;
use App\Treatment;
use App\EmrSummary;
use App\Emr;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf")->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return $pdf->stream($name . '.pdf');
    }

    public function vitalPDF($id)
    {
        $vitalData = Emr::findOrFail($id);
        $patientInfo = addPatient::findOrFail($vitalData->patient_id);

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf.SinhHieu", ['data' => $vitalData->vital, 'patientInfo' => $patientInfo])->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }

    public function addPatientPDF($id)
    {
        $data = Emr::findOrFail($id);
        $patientInfo = addPatient::findOrFail($data->patient_id);
        $hospitalHistory = HospitalHistory::findOrFail($data->patient_id);
        $patientVital = Vital::findOrFail($data->patient_id);
        $patientBody = Diagnosishealth::findOrFail($data->patient_id);
        $patientLab = LabResult::findOrFail($data->patient_id);
        $patientTreatment = Treatment::findOrFail($data->patient_id);
        $patientSummary = EmrSummary::findOrFail($data->patient_id);

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf.NoiKhoa", [
            'data' => $data,
            'patientInfo' => $patientInfo,
            'hospitalHistory' => $hospitalHistory,
            'patientVital' => $patientVital,
            'patientBody' => $patientBody,
            'patientLab' => $patientLab,
            'patientTreatment' => $patientTreatment,
            'patientSummary' => $patientSummary,

            ])->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }
}
