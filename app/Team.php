<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function drivers()
    {
        return $this->belongsToMany(Driver::class);
    }
    public function user()
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
    public static function getClassNumbers()
    {
        $classNumbers = [];

        foreach (config('constants.classNumbers')[config('constants.curent_season')] as $className => $value) {
            $classNumbers[$className] = [];
            for ($i=$value['min']; $i <= $value['max'] ; $i++) {
                $classNumbers[$className][$i] = $i;
            }
        }
        $teams = Team::where('season_id', config('constants.curent_season'))->get();
        $classCarLUT = [];
        foreach (config('constants.classes')[config('constants.curent_season')] as $className => $cars) {
            foreach ($cars as $value) {
                $classCarLUT [$value] = $className;
            }
        }

        foreach ($teams as $team) {
            $number = $team->number;
            $car = $classCarLUT[$team->car];
            $id = array_search($number, $classNumbers[$car]);
            if ($id) {
                unset($classNumbers[$classCarLUT[$team->car]][$id]);
            }
        }

        $carNumbers = [];
        foreach ($classCarLUT as $key => $value) {
            $carNumbers[$key] = $classNumbers[$value];
        }
        return $carNumbers;
    }
}
