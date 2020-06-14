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

    public function congregation()
    {
    	return $this->hasMany('App\Congregation');
    }
}
