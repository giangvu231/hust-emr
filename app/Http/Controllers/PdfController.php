<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\addPatient;
use App\District;
use App\HospitalHistory;
use App\Vital;
use App\Diagnosishealth;
use App\LabResult;
use App\ImagingResult;
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
        $hospitalHistory = HospitalHistory::findOrFail($data->hospital_histories_id);
        $treatment = Treatment::findOrFail($data->treatment_id);
        $summary = EmrSummary::findOrFail($data->emr_summary_id);
        $vital = Vital::findOrFail($data->vital_id);
        $body = Diagnosishealth::findOrFail($data->diagnosishealth_id);
        $lab = LabResult::findOrFail($data->lab_id);

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;

        if($data->emr_type == 'Bệnh án Nội khoa') {
            $template = "pdf.NoiKhoa";
        }else{
            $template = "pdf.NgoaiKhoa";
        };

        $pdf = PDF::loadView($template, [
            'data' => $data,
            'patientInfo' => $patientInfo,
            'hospitalHistory' => $hospitalHistory,
            'treatment' => $treatment,
            'summary' => $summary,
            'vital' => $vital,
            'body' => $body,
            'lab' => $lab,

            ])->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }
}
