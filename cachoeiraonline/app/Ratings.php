<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{

    protected $fillable = [

        'ratings', 'description','establishments_id', 'users_id'

    ];

    public function establishment(){

        return $this->belongsTo(Establishments::class,'establishments_id');

    }

    public function user(){

        return $this->belongsTo(User::class,'users_id');

    }

}
