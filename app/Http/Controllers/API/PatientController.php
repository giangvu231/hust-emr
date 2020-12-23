<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\addPatient;
use App\Diagnose;
use App\HospitalHistory;
use App\Hospital;
use App\Payment;
use App\LabResult;
use App\Pham;
use App\SurgeryHistory;
use App\Vital;
use App\Soap;
use App\Diagnosishealth;
use App\Subclinical;
use App\Appointment;
use App\Emr;
use PDF;

class PatientController extends Controller
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
        return addPatient::all();
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
            'unique_id' => 'required | unique:add_patients',
            'full_name' => 'required | string | max:191',
            'email' => 'required | string | email | max:191 | unique:add_patients',
            'title' => 'required',
            'phone_number' => 'required',
            'occupation' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'nationality' => 'required',
            'home_address' => 'required',
            'place_of_birth' => 'required',
            'marital_status' => 'required',
            'home_next_of_kin' => 'required',
            'phone_next_of_kin' => 'required',
            'name_next_of_kin' => 'required',
            'work_address' => 'required',
            'type_of_object' => 'required',
            'reason' => 'required',
            'medical_reason' => 'required',
            'race' => 'required',
            'foreign' => 'required',
            'health_insurance_id' => 'required',
            'health_insurance_date' => 'required',
        ]);

        $data = addPatient::create($request->all());
        Emr::create([
            'emr_id' => $data->unique_id,
            'patient_id' => $data->id,
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
        $patient = addPatient::findOrFail($id);

        $this->validate($request, [
            'unique_id' => 'required | unique:add_patients',
            'full_name' => 'required | string | max:191',
            'email' => 'required | string | email | max:191 | unique:add_patients',
            'title' => 'required',
            'phone_number' => 'required',
            'occupation' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'religion' => 'required',
            'nationality' => 'required',
            'home_address' => 'required',
            'place_of_birth' => 'required',
            'marital_status' => 'required',
            'home_next_of_kin' => 'required',
            'phone_next_of_kin' => 'required',
            'name_next_of_kin' => 'required',
            'work_address' => 'required',
            'type_of_object' => 'required',
            'reason' => 'required',
            'medical_reason' => 'required',
            'medical_history' => 'required',
            'race' => 'required',
            'foreign' => 'required',
            'health_insurance_id' => 'required',
            'health_insurance_date' => 'required',
        ]);

        $patient->update($request->all());

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
        $patient = addPatient::findOrFail($id);

        Diagnose::where('patient_id',$id)->delete();
        HospitalHistory::where('patient_id',$id)->delete();
        LabResult::where('patient_id',$id)->delete();
        Payment::where('patient_id',$id)->delete();
        Pham::where('patient_id',$id)->delete();
        SurgeryHistory::where('patient_id',$id)->delete();
        Vital::where('patient_id',$id)->delete();
        Soap::where('patient_id',$id)->delete();
        Diagnosishealth::where('patient_id',$id)->delete();
        Subclinical::where('patient_id',$id)->delete();
        Appointment::where('patient_id',$id)->delete();

        $patient->delete();


    }

    public function search()
    {
        //
        if($search = \Request::get('q')){
            return addPatient::where(function($query) use ($search){
                $query->where('full_name', 'LIKE', "%$search%" )->orWhere('title', 'LIKE', "%$search%" );
            })->paginate(30);
        }

        // echo $patients;
    }
}
