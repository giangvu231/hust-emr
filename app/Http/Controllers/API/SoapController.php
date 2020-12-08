<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\addPatient;
use App\Soap;
use App\Emr;

class SoapController extends Controller
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
        return Soap::with('patient')->get();
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
            'subjective' => 'required',
            'objective' => 'required',
            'assessment' => 'required',
            'plan' => 'required',
        ]);
        $data = Soap::create($request->all());
        Emr::where('patient_id', $data->patient_id)->update([
            'soap_id' => $data->id
        ]);
        return response()->json(['data' => $data], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Soap  $soap
     * @return \Illuminate\Http\Response
     */
    public function show(Soap $soap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Soap  $soap
     * @return \Illuminate\Http\Response
     */
    public function edit(Soap $soap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Soap  $soap
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $soap = Soap::findOrFail($id);

        $this->validate($request, [
            'patient_id' => 'required',
            'subjective' => 'required',
            'objective' => 'required',
            'assessment' => 'required',
            'plan' => 'required',
        ]);
        $soap->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Soap  $soap
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soap $soap)
    {
        $soap->delete();
        $soap = Soap::findOrFail($id);
    }
}
