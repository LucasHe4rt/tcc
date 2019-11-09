<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establishments extends Model
{

    protected $fillable = [

        'name', 'cnpj', 'address', 'description', 'type_id'

    ];


    public function type()
    {

        return $this->belongsTo(Types::class,'type_id');

    }

    public function ratings()
    {

        return $this->hasMany(Establishments::class);

    }

    public function photos()
    {

        return $this->hasMany(EstablishmentPhotos::class);
    }

    public function phones()
    {

        return $this->hasMany(PhonesEstab::class,'establishment_id');

    }

    public function rates()
    {

        return $this->hasMany(Ratings::class,'establishment_id');

    }

}
