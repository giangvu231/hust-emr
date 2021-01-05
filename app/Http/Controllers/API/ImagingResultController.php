<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ImagingResult;
use App\Emr;
use App\Imaging;

class ImagingResultController extends Controller
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
        return ImagingResult::with('patient', 'diagnose')->get();

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
        //
        $this->validate($request, [
            'patient_id' => 'required',
            'diagnose_id' => 'required',
            'type' => 'required',
            'comment' => 'required',
        ]);

        $data = ImagingResult::create($request->all());

        $imaging = Imaging::findOrFail($data->imaging_id);
        ImagingResult::where('imaging_id', $imaging->id)->update([
            'imaging_code' => $imaging->code,
            'imaging_name' => $imaging->name,
        ]);

        // Emr::where('patient_id', $data->patient_id)->update([
        //     'imaging_id' => $data->id
        // ]);

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImagingResult  $imagingResult
     * @return \Illuminate\Http\Response
     */
    public function edit(ImagingResult $imagingResult)
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
        $imagingresult = ImagingResult::findOrFail($id);

        $this->validate($request, [
            'type' => 'required',
            'comment' => 'required',
        ]);
        $imagingresult->update($request->all());
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
    }

    public function loguser()
    {
        //
        return Auth::user();
        // return LabResult::with('patient', 'diagnose')->get();

    }
}
