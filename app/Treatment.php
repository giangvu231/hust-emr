<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Treatment extends Model
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'patient_id',
        'disease_main',
        'disease_sub',
        'disease_difference',
        'disease_prognosis',
        'disease_plan',
        'department',
        'room',
        'bed_id',
        'reason_count',

        'icd10_admit_id',
        'icd10_admit_code',
        'icd10_admit_name',

        'icd10_treatment_id',
        'icd10_treatment_code',
        'icd10_treatment_name',

        'dept_name_2nd',
        'dept_time_2nd',
        'dept_name_3rd',
        'dept_time_3rd',
        'dept_name_4th',
        'dept_time_4th',

        'hosp_transfer_type',
        'hosp_transfer_name',

        'diagnosis_procedure',
        'diagnosis_surgery',

        'icd10_emergency_id',
        'icd10_emergency_code',
        'icd10_emergency_name',

        'icd10_treatment_id',
        'icd10_treatment_code',
        'icd10_treatment_name',


    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }
}
