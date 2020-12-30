<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Diagnosishealth extends Model
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'patient_id',
        'diagnosis_tuanhoan',
        'diagnosis_hohap',
        'diagnosis_tieuhoa',
        'diagnosis_than_tietnieu_sinhduc',
        'diagnosis_thankinh',
        'diagnosis_coxuongkhop',
        'diagnosis_taimuihong',
        'diagnosis_ranghammat',
        'diagnosis_mat',
        'diagnosis_noitiet_dinhduong_khac',
        'diagnosis_syndrome',
    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }
}
