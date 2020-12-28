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
    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }
}
