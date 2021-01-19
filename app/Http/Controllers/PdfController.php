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
use App\SurgeryHistory;

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

        if ($vitalData->patient_id) {
            $patientInfo = addPatient::findOrFail($vitalData->patient_id);
        }
        if ($vitalData->vital_id) {
            $vital = Vital::findOrFail($vitalData->vital_id);
        }
        if ($vitalData->treatment_id) {
            $treatment = Treatment::findOrFail($vitalData->treatment_id);
        }

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf.SinhHieu", [
            'data' => $vitalData->vital,
            'patientInfo' => $patientInfo,
            'vital' => $vital,
            'treatment' => $treatment,

            ])->setPaper('A4', 'Portrait');
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
        $imaging = ImagingResult::findOrFail($data->imaging_id);
        $surgery = SurgeryHistory::findOrFail($data->surgery_id);

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
            'imaging' => $imaging,
            'surgery' => $surgery,

            ])->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }

    public function phieuChamSocPDF($id)
    {
        $vitalData = Emr::findOrFail($id);

        if ($vitalData->patient_id) {
            $patientInfo = addPatient::findOrFail($vitalData->patient_id);
        }
        if ($vitalData->vital_id) {
            $vital = Vital::findOrFail($vitalData->vital_id);
        }
        if ($vitalData->treatment_id) {
            $treatment = Treatment::findOrFail($vitalData->treatment_id);
        }

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf.PhieuChamSoc", [
            'data' => $vitalData->vital,
            'patientInfo' => $patientInfo,
            'vital' => $vital,
            'treatment' => $treatment,

            ])->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }

    public function phieuTruyenDichPDF($id)
    {
        $vitalData = Emr::findOrFail($id);

        if ($vitalData->patient_id) {
            $patientInfo = addPatient::findOrFail($vitalData->patient_id);
        }
        if ($vitalData->vital_id) {
            $vital = Vital::findOrFail($vitalData->vital_id);
        }
        if ($vitalData->treatment_id) {
            $treatment = Treatment::findOrFail($vitalData->treatment_id);
        }

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf.PhieuTruyenDich", [
            'data' => $vitalData->vital,
            'patientInfo' => $patientInfo,
            'vital' => $vital,
            'treatment' => $treatment,

            ])->setPaper('A4', 'Landscape');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }

    public function phieuThuThuocPDF($id)
    {
        $vitalData = Emr::findOrFail($id);

        if ($vitalData->patient_id) {
            $patientInfo = addPatient::findOrFail($vitalData->patient_id);
        }
        if ($vitalData->vital_id) {
            $vital = Vital::findOrFail($vitalData->vital_id);
        }
        if ($vitalData->treatment_id) {
            $treatment = Treatment::findOrFail($vitalData->treatment_id);
        }

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf.PhieuThuThuoc", [
            'data' => $vitalData->vital,
            'patientInfo' => $patientInfo,
            'vital' => $vital,
            'treatment' => $treatment,

            ])->setPaper('A4', 'Landscape');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }

    public function phieuHoiChanPDF($id)
    {
        $vitalData = Emr::findOrFail($id);

        if ($vitalData->patient_id) {
            $patientInfo = addPatient::findOrFail($vitalData->patient_id);
        }
        if ($vitalData->vital_id) {
            $vital = Vital::findOrFail($vitalData->vital_id);
        }
        if ($vitalData->treatment_id) {
            $treatment = Treatment::findOrFail($vitalData->treatment_id);
        }

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf.PhieuHoiChan", [
            'data' => $vitalData->vital,
            'patientInfo' => $patientInfo,
            'vital' => $vital,
            'treatment' => $treatment,

            ])->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }

    public function phieuPhauThuatPDF($id)
    {
        $vitalData = Emr::findOrFail($id);

        if ($vitalData->patient_id) {
            $patientInfo = addPatient::findOrFail($vitalData->patient_id);
        }
        if ($vitalData->vital_id) {
            $vital = Vital::findOrFail($vitalData->vital_id);
        }
        if ($vitalData->treatment_id) {
            $treatment = Treatment::findOrFail($vitalData->treatment_id);
        }

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf.PhieuPhauThuat", [
            'data' => $vitalData->vital,
            'patientInfo' => $patientInfo,
            'vital' => $vital,
            'treatment' => $treatment,

            ])->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }

    public function phieuHinhAnhPDF($id)
    {
        $vitalData = Emr::findOrFail($id);

        if ($vitalData->patient_id) {
            $patientInfo = addPatient::findOrFail($vitalData->patient_id);
        }
        if ($vitalData->vital_id) {
            $vital = Vital::findOrFail($vitalData->vital_id);
        }
        if ($vitalData->treatment_id) {
            $treatment = Treatment::findOrFail($vitalData->treatment_id);
        }
        if ($vitalData->imaging_id) {
            $imaging = ImagingResult::findOrFail($vitalData->imaging_id);
        }

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf.PhieuHinhAnh", [
            'data' => $vitalData->vital,
            'patientInfo' => $patientInfo,
            'vital' => $vital,
            'treatment' => $treatment,
            'imaging' => $imaging,

            ])->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }

    public function phieuXetNghiemPDF($id)
    {
        $vitalData = Emr::findOrFail($id);

        if ($vitalData->patient_id) {
            $patientInfo = addPatient::findOrFail($vitalData->patient_id);
        }
        if ($vitalData->vital_id) {
            $vital = Vital::findOrFail($vitalData->vital_id);
        }
        if ($vitalData->treatment_id) {
            $treatment = Treatment::findOrFail($vitalData->treatment_id);
        }
        if ($vitalData->lab_id) {
            $lab = LabResult::findOrFail($vitalData->lab_id);
        }

        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf.PhieuXetNghiem", [
            'data' => $vitalData->vital,
            'patientInfo' => $patientInfo,
            'vital' => $vital,
            'treatment' => $treatment,
            'lab' => $lab,

            ])->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return response()->file(public_path("pdf/" . $name . ".pdf"));
    }
}
