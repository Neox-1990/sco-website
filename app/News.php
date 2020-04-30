<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;

class News extends Model
{
    /**
     * Get Offset of News
     * @param  integer    $offset Page pffset
     * @return Collection         Collection of News
     */
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

    /**
     * Is News already public?
     * @return bool News is public
     */
    public function isPublic() : bool
    {
        $publishdate = new Carbon($this->published);
        $now = new Carbon();

        return $this->active && $now >= $publishdate;
    }
}
