<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Diagnosishealth extends Model
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'patient_id', 'diagnosis_type', 'diagnosis_header', 'icd10_id', 'icd10_name',  'start_date', 'end_date', 'diagnosis_status', 'diagnosis_note'
    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }

   protected $casts = ['immunization' => 'array'];
}
