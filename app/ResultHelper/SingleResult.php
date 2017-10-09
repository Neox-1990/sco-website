<?php

namespace App\ResultHelper;

use App\Team;

/**
 *
 */
class SingleResult
{
    private $totalPos;
    private $classPos;
    private $car;
    private $carclass;
    private $teamid;
    private $team = null;
    private $points;
    private $out;
    private $laps;
    private $incs;

    public function __construct()
    {
    }
    public function createFromArray(array $input)
    {
        $this->totalPos = $input[0];
        $this->classPos = 0;
        $this->car = $input[1];
        $this->carclass = '';
        $this->teamid = intval($input[5])*-1;
        $this->team = Team::where([['ir_teamid','=',$this->teamid],['season_id','=',config('constants.curent_season')]])->withTrashed()->first();
        $this->points = 0.0;
        $this->out = $input[10];
        $this->laps = intval($input[18]);
        $this->incs = intval($input[19]);
    }

    public function setCar(int $car)
    {
        $this->car = $car;
    }
    public function getCar()
    {
        return $this->car;
    }

    public function setCarClass(string $class)
    {
        $this->carclass = $class;
    }
    public function getCarClass()
    {
        return $this->carclass;
    }

    public function setClassPos(int $pos)
    {
        $this->classPos = $pos;
    }
    public function getClassPos()
    {
        return $this->classPos;
    }

    public function setPoints(float $pts)
    {
        $this->points = $pts;
    }
    public function getPoints()
    {
        return $this->points;
    }

    public function getTeam()
    {
        return $this->team;
    }

    public function getOut()
    {
        return $this->out;
    }

    public function getLaps()
    {
        return $this->laps;
    }

    public function getIncs()
    {
        return $this->incs;
    }
}
