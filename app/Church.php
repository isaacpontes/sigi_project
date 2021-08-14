<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    use HasFactory;

    // Permit creating new Church on RegisterController and filling the email
    protected $fillable = ['name', 'email', 'phone'];

    /**
     * The users that belong to the church.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function congregations()
    {
        return $this->hasMany('App\Congregation');
    }

    public function classrooms()
    {
        return $this->hasMany('App\Classroom');
    }

    public function members()
    {
        return $this->hasMany('App\Member');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function accounts()
    {
        return $this->hasMany('App\Account');
    }

    public function incomeCategories()
    {
        return $this->hasMany('App\IncomeCategory');
    }

    public function expenseCategories()
    {
        return $this->hasMany('App\ExpenseCategory');
    }

    public function incomes()
    {
        return $this->hasMany('App\Income');
    }

    public function expense()
    {
        return $this->hasMany('App\Expense');
    }
}
