<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function drivers()
    {
        return $this->belongsToMany(Driver::class);
    }
    public function manager()
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
