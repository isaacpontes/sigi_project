<?php

namespace App;

use Carbon\Carbon;
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

    public function legibleDate()
    {
        $date_time = new Carbon($this->happens_at);
        return $date_time->formatLocalized('%a, %R');
    }
}
