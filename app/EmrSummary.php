<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class EmrSummary extends Model
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'patient_id',
        'therapy',
        'patient_condition',
        'therapy_plan',

        'discharge_type',
        'discharge_time',

        'discharge_maindisease_id',
        'discharge_maindisease_code',
        'discharge_maindisease_name',

        'discharge_subdisease_id',
        'discharge_subdisease_code',
        'discharge_subdisease_name',

        'death_reason_id',
        'death_reason_code',
        'death_reason_name',

        'autopsy_diagnosis_id',
        'autopsy_diagnosis_code',
        'autopsy_diagnosis_name',

        'discharge_stroke',
        'discharge_complication',

        'treatment_result',
        'anapath',

        'death_type',
        'death_time',
        'death_time_range',

        'autopsy',

        'dx_count',
        'ct_count',
        'us_count',
        'lab_count',
        'other_count',
        'total_count',

        'reason_of_stroke_complication',

        'emr_type',
    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }
}
