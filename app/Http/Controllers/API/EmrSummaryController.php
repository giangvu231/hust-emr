<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addPatient;
use App\EmrSummary;
use App\Emr;
use App\User;
use App\Icd10;

class EmrSummaryController extends Controller
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
        return EmrSummary::with('patient')->get();
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

        $data = EmrSummary::create($request->all());
        Emr::where('patient_id', $data->patient_id)->update([
            'emr_summary_id' => $data->id,
            'emr_type' => $data->emr_type,
        ]);

        $userData= $request->user();
        Emr::where('patient_id', $data->patient_id)->update([
            'treatment_user_id' => $userData->id,
            'treatment_user_name' => $userData->name,
        ]);

        $icd10_maindisease = Icd10::findOrFail($data->discharge_maindisease_id);
        EmrSummary::where('discharge_maindisease_id', $icd10_maindisease->id)->update([
            'discharge_maindisease_code' => $icd10_maindisease->code,
            'discharge_maindisease_name' => $icd10_maindisease->name,
        ]);

        $icd10_subdisease = Icd10::findOrFail($data->discharge_subdisease_id);
        EmrSummary::where('discharge_subdisease_id', $icd10_subdisease->id)->update([
            'discharge_subdisease_code' => $icd10_subdisease->code,
            'discharge_subdisease_name' => $icd10_subdisease->name,
        ]);

        $icd10_death_reason = Icd10::findOrFail($data->death_reason_id);
        EmrSummary::where('death_reason_id', $icd10_death_reason->id)->update([
            'death_reason_code' => $icd10_death_reason->code,
            'death_reason_name' => $icd10_death_reason->name,
        ]);

        $icd10_autopsy_diagnosis = Icd10::findOrFail($data->autopsy_diagnosis_id);
        EmrSummary::where('autopsy_diagnosis_id', $icd10_autopsy_diagnosis->id)->update([
            'autopsy_diagnosis_code' => $icd10_autopsy_diagnosis->code,
            'autopsy_diagnosis_name' => $icd10_autopsy_diagnosis->name,
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
        $emrSummary = EmrSummary::findOrFail($id);

        $this->validate($request, [
            'patient_id' => 'required',

        ]);
        $emrSummary->update($request->all());
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emrSummary = EmrSummary::findOrFail($id);
        $emrSummary->delete();
    }
}
