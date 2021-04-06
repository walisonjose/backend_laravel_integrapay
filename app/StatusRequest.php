<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusRequest extends Model
{
    //

    protected $table = 'status_request';

    protected $fillable = [
        'name',
        'id',
    ];
}
