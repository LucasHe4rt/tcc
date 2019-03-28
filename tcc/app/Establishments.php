<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishments extends Model
{

    protected $fillable = [

        'name', 'cnpj', 'address', 'description'

    ];

}
