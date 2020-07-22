<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    //

    public function church()
    {
        return $this->belongsTo('App\Church');
    }

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
}
