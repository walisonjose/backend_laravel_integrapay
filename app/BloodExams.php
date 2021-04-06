<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodExams extends Model
{
    //
    protected $table = 'request_blood_exams';

    protected $fillable = [
        'irradiado',
        'id',
        'filtro_leucocitos',
        'hb',
        'ht',
        'plq',
    ];

}
