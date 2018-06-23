<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
