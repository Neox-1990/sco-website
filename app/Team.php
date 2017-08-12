<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    public function drivers()
    {
        return $this->belongsToMany(Driver::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
