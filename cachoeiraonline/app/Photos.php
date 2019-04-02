<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{

    protected $fillable = [

        'directory','establishments_id'

        ];


    public function establishment(){

        return $this->belongsTo(Establishments::class,'establishments_id');

    }
}
