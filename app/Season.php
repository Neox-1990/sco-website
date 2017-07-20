<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
    public function rounds()
    {
        return $this->hasMany(Round::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
