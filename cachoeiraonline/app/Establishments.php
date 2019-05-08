<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishments extends Model
{

    protected $fillable = [

        'name', 'cnpj', 'address', 'description', 'user_id','type_id'

    ];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function type(){

        return $this->belongsTo(Types::class);

    }

    public function ratings(){

        return $this->hasMany(Establishments::class);

    }

    public function photos(){

        return $this->hasMany(EstablishmentPhotos::class);
    }

    public function phones(){

        return $this->hasMany(PhonesEstab::class);

    }

}
