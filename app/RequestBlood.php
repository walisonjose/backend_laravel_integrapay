<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestBlood extends Model
{
    //
    protected $table = 'request_blood';

    protected $fillable = ['id_patient', 'id_clinical_indication', 'id_request_blood_exams', 'id_patient',
    'id_type_transfusion','id_status_request','id_hospital','id_deliveryman',
    'id_user','id_doctor','date_type_transfusion', 'date_request', ];


    public function patient(){
        return $this->hasOne(Patient::class);
    }

    public function hospital(){
        return $this->hasOne(Hospital::class);
    }

    public function clinicalIndication(){
        return $this->hasOne(ClinicalIndication::class);
    }

    public function typeTransfusion(){
        return $this->hasOne(Hospital::class);
    }



}
