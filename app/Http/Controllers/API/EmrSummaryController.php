<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addPatient;
use App\EmrSummary;
use App\Emr;
use App\User;

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

        $data = EmrSummary::create($request->all());
        Emr::where('patient_id', $data->patient_id)->update([
            'emr_summary_id' => $data->id
        ]);

        $userData= $request->user();
        Emr::where('patient_id', $data->patient_id)->update([
            'treatment_user_id' => $userData->id,
            'treatment_user_name' => $userData->name
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
