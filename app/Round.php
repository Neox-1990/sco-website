<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
