<?php

namespace App\Http\Controllers\API;

use App\Diagnosishealth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addPatient;
use App\Emr;

class DiagnosishealthController extends Controller
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
        return Diagnosishealth::with('patient')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'patient_id' => 'required',
            'diagnosis_type' => 'required',
            'diagnosis_header' => 'required',
            'icd10_id' => 'required',
            'icd10_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'diagnosis_status' => 'required',
            'diagnosis_note' => 'required',
        ]);
        $data = Diagnosishealth::create($request->all());
        Emr::where('patient_id', $data->patient_id)->update([
            'diagnosishealth_id' => $data->id
        ]);
        return response()->json(['data' => $data], 200);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diagnosishealth  $diagnosishealth
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosishealth $diagnosishealth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $diagnosishealth = Diagnosishealth::findOrFail($id);

        $this->validate($request, [
            'patient_id' => 'required',
            'diagnosis_type' => 'required',
            'diagnosis_header' => 'required',
            'icd10_id' => 'required',
            'icd10_name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'diagnosis_status' => 'required',
            'diagnosis_note' => 'required',
        ]);
        $diagnosishealth->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $diagnosishealth = Diagnosishealth::findOrFail($id);

        $diagnosishealth->delete();
    }
}
