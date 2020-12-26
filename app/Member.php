<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function church()
    {
        return $this->belongsTo('App\Church');
    }

    public function congregation()
    {
        return $this->belongsTo('App\Congregation');
    }

    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function incomes()
    {
        return $this->hasMany('App\Income');
    }
}
