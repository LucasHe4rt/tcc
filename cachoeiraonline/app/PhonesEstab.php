<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhonesEstab extends Model
{

    protected $table = 'phones_estab';

    protected $fillable = [

        'number','establishments_id'

        ];

    public function establishment(){

        return $this->belongsTo(Establishments::class,'establishments_id');

    }

}
