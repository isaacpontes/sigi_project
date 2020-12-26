<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    public function church()
    {
        return $this->belongsTo('App\Church');
    }

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
}
