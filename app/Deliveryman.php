<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliveryman extends Model
{

    protected $table = 'deliveryman';

/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','latitude', 'longitude',

    ];

}
