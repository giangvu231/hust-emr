<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class SurgeryHistory extends Model
{
    //
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'patient_id',
        'operations',
        'date_of_operation',
        'surgeon',
        'anesthetist',
        'modal_id',
        'icd10_before_procedure',
        'code_before_procedure',
        'id_before_procedure',
        'icd10_after_procedure',
        'code_after_procedure',
        'id_after_procedure',
    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }
}
