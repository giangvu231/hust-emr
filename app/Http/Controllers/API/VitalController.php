<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addPatient;
use App\Vital;
use App\Emr;

class VitalController extends Controller
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
        //
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
        //
        $this->validate($request, [
            'patient_id' => 'required',
            'temperature' => 'required',
            'blood_pressure' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'pulse' => 'required',
            'blood_group' => 'required',
            'blood_type' => 'required',
            'immunization' => 'required',
            'systolic' => 'required',
            'diastolic' => 'required',
            'respiration' => 'required',
            'note' => 'required',
        ]);
        $data = Vital::create($request->all());
        Emr::where('patient_id', $data->patient_id)->update([
            'vital_id' => $data->id
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
        $vital = Vital::findOrFail($id);

        $this->validate($request, [
            'patient_id' => 'required',
            'temperature' => 'required',
            'blood_pressure' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'pulse' => 'required',
            'blood_group' => 'required',
            'blood_type' => 'required',
            'immunization' => 'required',
        ]);
        $vital->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vital = Vital::findOrFail($id);
        $vital->delete();
    }
}
