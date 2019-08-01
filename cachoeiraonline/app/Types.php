<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{

    protected $fillable = [

        'name','establishment_id'

    ];

    public function establishment(){

        return $this->hasOne(Establishments::class);

    }

}
