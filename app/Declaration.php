<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Declaration extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'massage','id_doctor','id_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

}

