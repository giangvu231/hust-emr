<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addPatient;
use App\User;
use App\Treatment;
use App\Emr;
use App\Icd10;
use App\Search;

class TreatmentController extends Controller
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
        return Vital::with('patient')->get();
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

        ]);

        $data = Treatment::create($request->all());
        Emr::where('patient_id', $data->patient_id)->update([
            'treatment_id' => $data->id
        ]);

        $userData= $request->user();
        Emr::where('patient_id', $data->patient_id)->update([
            'medical_user_id' => $userData->id,
            'medical_user_name' => $userData->name
        ]);

        $icd10_admit_disease = Icd10::findOrFail($data->icd10_admit_id);
        Treatment::where('icd10_admit_id', $icd10_admit_disease->id)->update([
            'icd10_admit_code' => $icd10_admit_disease->code,
            'icd10_admit_name' => $icd10_admit_disease->name,
        ]);

        $icd10_emergency_disease = Icd10::findOrFail($data->icd10_emergency_id);
        Treatment::where('icd10_emergency_id', $icd10_emergency_disease->id)->update([
            'icd10_emergency_code' => $icd10_emergency_disease->code,
            'icd10_emergency_name' => $icd10_emergency_disease->name,
        ]);

        $icd10_treatment_disease = Icd10::findOrFail($data->icd10_treatment_id);
        Treatment::where('icd10_treatment_id', $icd10_treatment_disease->id)->update([
            'icd10_treatment_code' => $icd10_treatment_disease->code,
            'icd10_treatment_name' => $icd10_treatment_disease->name,
        ]);

        return response()->json(['data' => $data], 200);
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
        $treatment = Treatment::findOrFail($id);

        $this->validate($request, [
            'patient_id' => 'required',

        ]);
        $treatment->update($request->all());
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->delete();
    }
}
