<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $table = 'patient';

    protected $fillable = [
        'patient_name',
        'id',
        'patient_sex',
        'patient_birthday',
        'patient_bed',
        'patient_weight',
        'patient_medical_record',
    ];
}
