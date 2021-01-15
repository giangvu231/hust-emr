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
use App\ImagingResult;
use App\Pham;
use App\SurgeryHistory;
use App\Vital;
use App\Soap;
use App\Diagnosishealth;
use App\Subclinical;
use App\Appointment;
use App\Treatment;
use App\EmrSummary;
use App\Emr;
use App\User;
use App\Job;
use App\Race;
use App\City;
use App\District;
use App\Nation;
use Auth;
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
            'unique_id' => 'required',
            'pid' => 'required',
            'full_name' => 'required | string | max:191',
            'email' => 'required | string | email | max:191',
            'title' => 'required',
            'phone_number' => 'required',

        ]);

        // $userName= $request->user()->name;


        $data = addPatient::create($request->all());

        Emr::create([
            'emr_id' => $data->unique_id,
            'patient_id' => $data->id,
        ]);

        if ( $data->job_id ) {
            $job = Job::findOrFail($data->job_id);
            addPatient::where('job_id', $job->id)->update([
                'job_code' => $job->code,
                'job_name' => $job->name,
            ]);
        };

        if ($data->race_id) {
            $race = Race::findOrFail($data->race_id);
            addPatient::where('race_id', $race->id)->update([
                'race_code' => $race->code,
                'race_name' => $race->name,
            ]);
        };

        if ($data->city_id) {
            $city = City::findOrFail($data->city_id);
            addPatient::where('city_id', $city->id)->update([
                'city_code' => $city->code,
                'city_name' => $city->name,
            ]);
        };


        if ($data->district_id) {
            $district = District::findOrFail($data->district_id);
            addPatient::where('district_id', $district->id)->update([
                'district_code' => $district->code,
                'district_name' => $district->name,
            ]);
        };

        if ($data->nation_id) {
            $nation = Nation::findOrFail($data->nation_id);
            addPatient::where('nation_id', $nation->id)->update([
                'nation_code' => $nation->code,
                'nation_name' => $nation->name,
            ]);
        };


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
            // 'occupation' => 'required',
            // 'sex' => 'required',
            // 'dob' => 'required',
            // 'religion' => 'required',
            // 'nationality' => 'required',
            // 'home_address' => 'required',
            // 'place_of_birth' => 'required',
            // 'marital_status' => 'required',
            // 'home_next_of_kin' => 'required',
            // 'phone_next_of_kin' => 'required',
            // 'name_next_of_kin' => 'required',
            // 'work_address' => 'required',
            // 'type_of_object' => 'required',
            // 'race' => 'required',
            // 'foreign' => 'required',
            // 'health_insurance_id' => 'required',
            // 'health_insurance_date' => 'required',
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
        Treatment::where('patient_id',$id)->delete();
        EmrSummary::where('patient_id',$id)->delete();

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
