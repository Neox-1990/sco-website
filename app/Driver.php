<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
