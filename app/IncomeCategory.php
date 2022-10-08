<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeCategory extends Model
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

    public function incomes()
    {
        return $this->hasMany('App\Income');
    }
}
