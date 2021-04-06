<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestBloodProcedures extends Model
{
    //

    protected $table = 'request_blood_procedures';

    protected $fillable = [
        'id_request_blood',
        'id_procedures',
        'othersdescription',
        'id',
    ];
}
