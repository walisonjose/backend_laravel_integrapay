<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTransfusion extends Model
{
    //
    protected $table = 'type_transfusion';

    protected $fillable = [
        'name',
        'id',
    ];
}
