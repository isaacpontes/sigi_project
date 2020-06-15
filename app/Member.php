<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //

    public function congregation()
    {
        return $this->belongsTo('App\Congregation');
    }
}
