<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //

    public function church()
    {
        return $this->belongsTo('App\Church');
    }

    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
