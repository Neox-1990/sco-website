<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
