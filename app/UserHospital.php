<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHospital extends Model
{
    //

    protected $table = 'user_hospital';

    protected $fillable = [
        'id_user',
        'id',
        'id_hospital',

    ];

    public function user() {
        return $this->belongsTo(App\User::class);
    }

}
