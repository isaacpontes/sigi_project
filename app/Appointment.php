<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'happens_at',
        'completed',
        'add_info',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
