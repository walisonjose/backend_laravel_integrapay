<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestBloodLogs extends Model
{
    //
    protected $table = 'request_blood_logs';

    protected $fillable = ['id_request_blood', 'log',  ];

}
