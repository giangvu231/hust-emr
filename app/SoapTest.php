<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Soap extends Model
{
    //
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'patient_id', 'subjective', 'objective', 'assessment', 'plan'
    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }

   protected $casts = ['immunization' => 'array'];
}
