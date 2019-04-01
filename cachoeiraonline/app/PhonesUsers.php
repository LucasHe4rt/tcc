<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhonesUsers extends Model
{

    protected $fillable = [

        'number', 'users_id'

        ];


    public function user(){

        return $this->belongsTo(User::class,'users_id');

    }

}
