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
    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }
}
