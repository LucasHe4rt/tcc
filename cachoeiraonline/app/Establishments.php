<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishments extends Model
{

    protected $fillable = [

        'name', 'cnpj', 'address', 'description', 'users_id'

    ];

    public function user(){

        return $this->belongsTo(User::class,'users_id');

    }

    public function ratings(){

        return $this->hasMany(Establishments::class);

    }

}
