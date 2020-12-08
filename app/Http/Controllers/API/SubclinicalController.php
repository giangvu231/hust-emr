<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addPatient;
use App\Subclinical;
use App\Emr;

class SubclinicalController extends Controller
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
        return Subclinical::with('patient')->get();
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
            'lab_order' => 'required',
            'lab_result' => 'required',
            'imaging_order' => 'required',
            'imaging_result' => 'required',
        ]);
        $data = Subclinical::create($request->all());
        Emr::where('patient_id', $data->patient_id)->update([
            'subclinical_id' => $data->id
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
        $subclinical = Subclinical::findOrFail($id);

        $this->validate($request, [
            'patient_id' => 'required',
            'lab_order' => 'required',
            'lab_result' => 'required',
            'imaging_order' => 'required',
            'imaging_result' => 'required',
        ]);
        $subclinical->update($request->all());
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
        $subclinical = Subclinical::findOrFail($id);

        $subclinical->delete();
    }
}
