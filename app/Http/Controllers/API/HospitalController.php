<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HospitalHistory;
use App\Diagnose;
use App\Emr;
use App\Icd10;

class HospitalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /***
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HospitalHistory::with('patient')->get();
        return HospitalHistory::all();
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
            // 'date_attented' => 'required',
            // 'date_admitted' => 'required',
            // 'refered_by' => 'required',
            // 'ward' => 'required',
            // 'date_discharged' => 'required',
            // 'discharged_to' => 'required',
            // 'outcome_of_care' => 'required',
            // 'symptoms' => 'required',
            // 'physician' => 'required',
            // 'comment_box' => 'required',
            // 'department' => 'required',
            // 'room' => 'required',
            // 'bed_id' => 'required',
            // 'admit_dept' => 'required',
            // 'refer_dept' => 'required',
            // 'reason_count' => 'required',
        ]);
        // $hospital = new HospitalHistory;
        // $hospital->patient_id = $request->patient_id;
        // $hospital->date_attented = $request->date_attented;
        // $hospital->date_admitted = $request->date_admitted;
        // $hospital->refered_by = $request->refered_by;
        // $hospital->ward = $request->ward;
        // $hospital->date_discharged = $request->date_discharged;
        // $hospital->discharged_to = $request->discharged_to;
        // $hospital->outcome_of_care = $request->outcome_of_care;
        // $hospital->physician = $request->physician;
        // $hospital->symptoms = $request->symptoms;
        // $hospital->comment_box = $request->comment_box;
        // $hospital->modal_id = strtolower(str_random(8));

        // $hospital->save();

        $data = HospitalHistory::create($request->all());

        // $icd10 = Icd10::findOrFail($data->icd10_id);
        // HospitalHistory::where('icd10_id', $icd10->id)->update([
        //     'icd10_code' => $icd10->code,
        //     'icd10_name' => $icd10->name,
        // ]);

        Emr::where('patient_id', $data->patient_id)->update([
            'hospital_histories_id' => $data->id
        ]);

        Diagnose::create([
            'patient_id' => $data->patient_id,
            'hospital_id' => $data->id,
            'diagnosis' => $data->symptoms,
            'comment' => $data->comment_box,
            // 'modal_id' => $data->modal_id,
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
        $hospital = HospitalHistory::findOrFail($id);

        $this->validate($request, [
            'patient_id' => 'required',
            // 'date_attented' => 'required',
            // 'date_admitted' => 'required',
            // 'refered_by' => 'required',
            // 'ward' => 'required',
            // 'date_discharged' => 'required',
            // 'discharged_to' => 'required',
            // 'outcome_of_care' => 'required',
            // 'symptoms' => 'required',
            // 'physician' => 'required',
            // 'comment_box' => 'required',
            // 'department' => 'required',
            // 'room' => 'required',
            // 'bed_id' => 'required',
            // 'admit_dept' => 'required',
            // 'refer_dept' => 'required',
            // 'reason_count' => 'required',
        ]);
        $hospital->update($request->all());
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
        $hospital = HospitalHistory::findOrFail($id);

        Diagnose::where('hospital_id',$id)->delete();

        $hospital->delete();
    }
}
