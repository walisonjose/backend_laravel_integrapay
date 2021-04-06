<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GitProfile extends Model
{
    //

    protected $table = 'git_profiles';

    protected $fillable = [
        'photo_url',
        'id',
        'login',
        'profile_id',

    ];
}
