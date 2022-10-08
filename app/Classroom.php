<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Classroom extends Model
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

    public function members()
    {
        return $this->hasMany('App\Member');
    }

    public function getActiveMembers()
    {
        return DB::table('members')
            ->where('church_id', auth()->user()->church_id)
            ->where('classroom_id', $this->id)
            ->whereNull('demission')
            ->orderBy('name', 'asc')
            ->paginate(8);
    }
}
