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
        'role',
        'religion',
        'nationality',
        'home_address',
        'place_of_birth',
        'marital_status',
        'home_next_of_kin',
        'phone_next_of_kin',
        'name_next_of_kin',
        'work_address',
        'type_of_object',
        'race',
        'foreign',
        'health_insurance_id',
        'health_insurance_date',
        'username'
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
    /**
     * Accessor for Age.
     */
    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['dob'])->age;
    }
}
