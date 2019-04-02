<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{

    protected $fillable = [

        'name','establishments_id'

    ];

    public function establishment(){

        return $this->belongsTo(Establishments::class,'establishments_id');

    }

}
