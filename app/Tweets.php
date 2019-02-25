<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    //

    protected $table = 'tweets';

    public function users(){
        return $this->belongsTo('\App\User');
    }
}
