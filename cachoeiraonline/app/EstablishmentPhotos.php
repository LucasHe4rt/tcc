<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstablishmentPhotos extends Model
{

    protected $table = 'establishment_photos';

    protected $fillable = [

        'photo', 'establishment_id'

        ];

    public function establishment(){

        return $this->belongsTo(Establishments::class);

    }

}
