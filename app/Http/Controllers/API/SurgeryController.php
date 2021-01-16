<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SurgeryHistory;
use App\Diagnose;
use App\Icd10;
use App\Emr;

class SurgeryController extends Controller
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
        return SurgeryHistory::with('patient')->get();
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
            // 'operations' => 'required',
            // 'date_of_operation' => 'required',
            // 'surgeon' => 'required',
        ]);
        // $surgery = new SurgeryHistory;
        // $surgery->patient_id = $request->patient_id;
        // $surgery->operations = $request->operations;
        // $surgery->date_of_operation = $request->date_of_operation;
        // $surgery->surgeon = $request->surgeon;
        // $surgery->modal_id = strtolower(str_random(8));

        // $surgery->save();

        $data = SurgeryHistory::create($request->all());

        $icd10_before_procedure = Icd10::findOrFail($data->id_before_procedure);
        SurgeryHistory::where('id_before_procedure', $icd10_before_procedure->id)->update([
            'code_before_procedure' => $icd10_before_procedure->code,
            'icd10_before_procedure' => $icd10_before_procedure->name,
        ]);

        $icd10_after_procedure = Icd10::findOrFail($data->id_after_procedure);
        SurgeryHistory::where('id_after_procedure', $icd10_after_procedure->id)->update([
            'code_after_procedure' => $icd10_after_procedure->code,
            'icd10_after_procedure' => $icd10_after_procedure->name,
        ]);

        Emr::where('patient_id', $data->patient_id)->update([
            'surgery_id' => $data->id
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
        //
        $surgery = SurgeryHistory::findOrFail($id);

        $this->validate($request, [
            'patient_id' => 'required',
            // 'operations' => 'required',
            // 'date_of_operation' => 'required',
            // 'surgeon' => 'required',
        ]);
        $surgery->update($request->all());
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
        $surgery = SurgeryHistory::findOrFail($id);

        $surgery->delete();
    }
}
