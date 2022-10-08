<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function church()
    {
        return $this->belongsTo('App\Church');
    }

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
}
