<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{

    protected $fillable = [

        'name','establishment_id'

    ];

    public function establishment(){

        return $this->hasMany(Establishments::class,'type_id');

    }

}
