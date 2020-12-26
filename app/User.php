<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'system_admin',
        'church_admin',
        'finances_admin',
        'members_admin',
        'church_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // /**
    //  * The roles that belong to the user.
    //  */
    // public function roles()
    // {
    //     return $this->belongsToMany('App\Role');
    // }

    /**
     * Get the church which the user belongs to.
     */
    public function church()
    {
        return $this->belongsTo('App\Church');
    }


    // public function hasAnyRoles($roles)
    // {
    //   if($this->roles()->whereIn('name', $roles)->first()){
    //     return true;
    //   }

    //   return false;
    // }

    // public function hasRole($role)
    // {
    //   if($this->roles()->where('name', $role)->first()){
    //     return true;
    //   }

    //   return false;
    // }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }
}
