<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{

    protected $fillable = [

        'ratings', 'description','establishment_id', 'user_id'

    ];

    public function establishment(){

        return $this->belongsTo(Establishments::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

}
