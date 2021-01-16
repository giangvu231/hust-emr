<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class addPatient extends Model
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'unique_id',
        'pid',
        'title',
        'full_name',
        'email',
        'phone_number',
        'occupation',
        'sex',
        'dob',
        // 'role',
        'religion',
        'nationality',
        'home_address',
        'work_address',
        'place_of_birth',
        'marital_status',
        'name_next_of_kin',
        'phone_next_of_kin',
        'home_next_of_kin',
        'type_of_object',
        'race',
        // 'foreign',
        'health_insurance_id',
        'health_insurance_date',
        'job_id',
        'job_code',
        'job_name',
        'race_id',
        'race_code',
        'race_name',
        'city_id',
        'city_code',
        'city_name',
        'district_id',
        'district_code',
        'district_name',
        'nation_id',
        'nation_code',
        'nation_name',
    ];

    public function emrs()
    {
        return $this->hasMany('App\Emr', 'patient_id', 'id');
    }

    public function vitals(){
        return $this->hasOne('App\Vital');
    }

    public function soaps(){
        return $this->hasOne('App\Soap');
    }

    public function diagnosishealths(){
        return $this->hasOne('App\Diagnosishealth');
    }

    public function subclinicals(){
        return $this->hasOne('App\Subclinical');
    }
    public function treatments(){
        return $this->hasOne('App\Treatment');
    }

    public function hospitals(){
        return $this->hasMany('App\HospitalHistory');
    }

    public function surgeries(){
        return $this->hasMany('App\SurgeryHistory');
    }

    public function diagnose(){
        return $this->hasMany('App\Diagnose');
    }

    public function payment(){
        return $this->hasMany('App\Payment');
    }

    public function appointment(){
        return $this->hasMany('App\Appointment');
    }

    public function emrsummary(){
        return $this->hasMany('App\EmrSummary');
    }

    public function photos(){
        return $this->hasMany('App\Photo', 'unique_id', 'unique_id');
    }
    
    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }
}
