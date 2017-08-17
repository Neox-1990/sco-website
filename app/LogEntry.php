<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogEntry extends Model
{
    protected $hidden = [];
    protected $table = 'logentry';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
