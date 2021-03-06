<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\HospitalHistory;
use App\Diagnose;
use App\LabResult;
use App\ImagingResult;
use App\Imaging;
use App\Lab;

class DiagnoseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Old code
        return Diagnose::with('patient', 'hospital')->get();

        // $appointment = Appointment::all();
        $addPatient = addPatient::all();
        // $vital = Vital::all();
        // $soap = Soap::all();
        // $diagnosishealth = Diagnosishealth::all();
        // $subclinical = Subclinical::all();
        // $phams = Pham::all();
        // $payment = Payment::all();
        // $diagnose = Diagnose::all();
        // $labResult = LabResult::all();
        $hospitalhistory = HospitalHistory::all();

        return response()->json([
            // 'appointment' => $appointment,
            'addPatient' => $addPatient,
            // 'vital' => $vital,
            // 'soap' => $soap,
            // 'diagnosishealth' => $diagnosishealth,
            // 'subclinical' => $subclinical,
            // 'phams' => $phams,
            // 'payment' => $payment,
            // 'diagnose' => $diagnose,
            // 'labResult' => $labResult
            // 'labResult' => $labResult
            'hospitalHistory' => $hospitalhistory
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'patient_id' => 'required',
            'hospital_id' => 'required',
            'diagnosis' => 'required',
            'comment' => 'required',
        ]);
        // $diagnose = new Diagnose;
        // $diagnose->patient_id = $request->patient_id;
        // $diagnose->hospital_id = $request->hospital_id;
        // $diagnose->diagnosis = $request->diagnosis;
        // $diagnose->comment = $request->comment;
        // $diagnose->modal_id = strtolower(str_random(8));

        // $diagnose->save();

        return HospitalHistory::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $diagnose = Diagnose::findOrFail($id);

        $this->validate($request, [
            'diagnosis' => 'required',
            'comment' => 'required',
        ]);
        $diagnose->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $diagnose = Diagnose::findOrFail($id);

        LabResult::where('patient_id',$id)->delete();

        $diagnose->delete();
    }

    public function imagingtest()
    {
        //
        return Diagnose::where('refer_imaging', 1)->with('patient', 'hospital')->get();
    }


    public function labtest()
    {
        //
        return Diagnose::where('refer_lab', 1)->with('patient', 'hospital')->get();
    }

    public function phamtest()
    {
        //
        return Diagnose::where('refer_pham', 1)->with('patient', 'hospital')->get();

    }
}
