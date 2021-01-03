<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class HospitalHistory extends Model
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'patient_id',
        'date_attented',
        'date_admitted',
        'symptoms',
        'comment_box',
        // 'modal_id',
        'admit_dept',
        'refer_dept',
        'disease_in',
        'disease_out',
        'reason',
        'reason_date',
        'disease_diung',
        'disease_diung_time',
        'disease_matuy',
        'disease_matuy_time',
        'disease_ruoubia',
        'disease_ruoubia_time',
        'disease_thuocla',
        'disease_thuocla_time',
        'disease_thuoclao',
        'disease_thuoclao_time',
        'disease_khac',
        'disease_khac_time',
        'icd10_id',
        'icd10_code',
        'icd10_name',
    ];

   public function patient(){
       return $this->belongsTo('App\addPatient');
   }

   public function diagnose(){
        return $this->hasOne('App\Diagnose');
   }
}
