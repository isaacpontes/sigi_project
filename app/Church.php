<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    // Permit creating new Church on RegisterController and filling the email
    protected $fillable = ['name', 'email'];

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
}
