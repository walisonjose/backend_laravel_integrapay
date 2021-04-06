<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicalIndication extends Model
{
    //

    protected $table = 'clinical_indication';

    protected $fillable = [
        'is_oncological',
        'id',
        'is_pregnant',
        'has_transfusion_reaction',
        'has_transfusion_history',
    ];

}
