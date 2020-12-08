<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Subclinical extends Model
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'patient_id', 'lab_order', 'lab_result', 'imaging_order', 'imaging_result'
    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }

   protected $casts = ['immunization' => 'array'];
}
