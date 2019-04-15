<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhonesEstab extends Model
{

    protected $table = 'phones_estab';

    protected $fillable = [

        'number','establishment_id'

        ];

    public function establishment(){

        return $this->belongsTo(Establishments::class);

    }

}
