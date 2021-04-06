<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestBloodComponent extends Model
{
    //

    protected $table = 'request_blood_component';

    protected $fillable = [
        'id_request_blood',
        'id_blood_components',
        'amount',
        'id',
    ];
}
