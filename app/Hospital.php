<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    //
    protected $table = 'hospital';

    protected $fillable = [
        'name',
        'id',
        'address',
        'longitude',
        'latitude',
    ];


}
