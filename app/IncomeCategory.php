<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
{
    //

    public function church()
    {
        return $this->belongsTo('App\Church');
    }

    public function incomes()
    {
        return $this->hasMany('App\Income');
    }
}
