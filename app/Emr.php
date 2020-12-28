<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Emr extends Model
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'emr_id',
        'patient_id',
        'emr_mngtcol',
        'patient_history_id',
        'vital_id',
        'soap_id',
        'diagnosishealth_id',
        'subclinical_id',
        'lab_id',
        'diagnosis_id',
    ];

    public function vital()
    {
        return $this->hasOne('App\Vital', 'id', 'vital_id');
    }

    public function soap()
    {
        return $this->hasOne('App\Soap', 'id', 'soap_id');
    }

    public function treatment()
    {
        return $this->hasOne('App\Treatment', 'id', 'treatment_id');
    }

    public function emrsummary()
    {
        return $this->hasMany('App\EmrSummary', 'id', 'emrsummary_id');
    }

    public function diagnosishealth()
    {
        return $this->hasOne('App\Diagnosishealth', 'id', 'diagnosishealth_id');
    }

    public function subclinical()
    {
        return $this->hasOne('App\Subclinical', 'id', 'subclinical_id');
    }

    public function diagnose()
    {
        return $this->hasOne('App\Diagnose', 'id', 'diagnosis_id');
    }
}
