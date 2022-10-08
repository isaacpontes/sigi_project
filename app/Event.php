<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'happens_at'
    ];

    public function church()
    {
        return $this->belongsTo('App\Church');
    }

    public function finished(): bool
    {
        $now = new DateTime();
        $event = new DateTime($this->happens_at);
        return $now > $event;
    }
}
