<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Medicine extends Model
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'patient_id', 'start_date', 'ref_doctor_name', 'ref_doctor_id', 'medicine_name',  'amount', 'dose', 'note'
    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }

   protected $casts = ['immunization' => 'array'];
}
