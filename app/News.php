<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class News extends Model
{
    //
    public static function getNewsSet($offset = 0) : Collection
    {
        $setSize = sco_setting('newssetsize', true, 3);
        $now = (new Carbon())->toDateTimeString();
        $set = News::where([
          ['published', '<=', $now],
          ['active', '=', 1]
        ])->orderby('published', 'DESC')->limit($setSize)->offset($offset*$setSize);

        return $set->get();
    }
}
