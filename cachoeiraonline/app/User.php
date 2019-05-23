<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email','cpf','profile_photo', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function establishments(){

        return $this->hasMany(Establishments::class);

    }

    public function ratings(){

        return $this->hasMany(Ratings::class);

    }

    public function phones(){

        return $this->hasMany(PhonesUsers::class);

    }

}
