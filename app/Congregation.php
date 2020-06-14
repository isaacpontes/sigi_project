<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Congregation extends Model
{
    //

    public function church()
    {
    	return $this->belongsTo('App\Church');
    }
}
