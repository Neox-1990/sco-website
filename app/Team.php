<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

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
    public static function getSortedTeams()
    {
        $teams = [];
        $classes = config('constants.classes')[config('constants.curent_season')];
        foreach ($classes as $name => $cararray) {
            $teams[$name] = [
            'pending' => new Collection,
            'waitinglist' => new Collection,
            'confirmed' => new Collection
          ];
            foreach ($cararray as $value) {
                $teams[$name]['pending'] = $teams[$name]['pending']->merge(Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 0], ['car','=',$value]])->orderBy('created_at', 'asc')->get());
                $waitinglist = Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 1], ['car','=',$value]])->orderBy('created_at', 'asc')->get();
                $teams[$name]['waitinglist'] = $teams[$name]['waitinglist']->merge($waitinglist);
                $teams[$name]['confirmed'] = $teams[$name]['confirmed']->merge(Team::where([['season_id','=',config('constants.curent_season')], ['status', '=', 2], ['car','=',$value]])->orderBy('created_at', 'asc')->get());
            }
            $waitinglist = ($teams[$name]['waitinglist'])->sort(function ($team1, $team2) {
                $date1;
                $date2;
                if (LogEntry::where([['title','like','%car class changed%'],['action','like','%| Teamid: '.$team1['id'].' |%']])->count() != 0) {
                    $date1 = new Carbon((LogEntry::where([['title','like','%car class changed%'],['action','like','%| Teamid: '.$team1['id'].' |%']])->orderBy('created_at', 'desc')->first())['created_at']);
                } else {
                    $date1 = new Carbon($team1['created_at']);
                }
                if (LogEntry::where([['title','like','%car class changed%'],['action','like','%| Teamid: '.$team2['id'].' |%']])->count() != 0) {
                    $date2 = new Carbon((LogEntry::where([['title','like','%car class changed%'],['action','like','%| Teamid: '.$team2['id'].' |%']])->orderBy('created_at', 'desc')->first())['created_at']);
                } else {
                    $date2 = new Carbon($team2['created_at']);
                }
                return ($date1->eq($date2)?0:($date1->lt($date2)?-1:1));
            });
            $teams[$name]['waitinglist'] = $waitinglist;
        }

        return $teams;
    }
    public static function getCarToClassArray()
    {
        $result = [];
        foreach (config('constants.classes')[config('constants.curent_season')] as $class => $cars) {
            foreach ($cars as $value) {
                $result[$value] = $class;
            }
        }
        return $result;
    }
}
