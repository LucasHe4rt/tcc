<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{

    protected $fillable = [

        'ratings', 'description','establishments_id', 'user_id'

    ];

    public function establishment(){

        return $this->belongsTo(Establishments::class,'establishments_id');

    }

}
