<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addPatient;
use App\Medicine;
use App\Emr;

class MedicineController extends Controller
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
        return Medicine::with('patient')->get();
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
            'start_date' => 'required',
            'ref_doctor_name' => 'required',
            'ref_doctor_id' => 'required',
            'medicine_name' => 'required',
            'amount' => 'required',
            'dose' => 'required',
            'note' => 'required',
        ]);
        $data = Medicine::create($request->all());
        Emr::where('patient_id', $data->patient_id)->update([
            'medicine_id' => $data->id
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
        $medicine = Medicine::findOrFail($id);

        $this->validate($request, [
            'patient_id' => 'required',
            'start_date' => 'required',
            'ref_doctor_name' => 'required',
            'ref_doctor_id' => 'required',
            'medicine_name' => 'required',
            'amount' => 'required',
            'dose' => 'required',
            'note' => 'required',
        ]);
        $medicine->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();
    }
}
