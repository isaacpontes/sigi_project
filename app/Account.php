<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'add_info'
    ];

    public function church()
    {
        return $this->belongsTo('App\Church');
    }

    public function incomes()
    {
        return $this->hasMany('App\Income');
    }

    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
}
