<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class)->withTrashed();
    }
    public function round()
    {
        return $this->belongsTo(Round::class);
    }
}
