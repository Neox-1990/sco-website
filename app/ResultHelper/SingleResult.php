<?php

namespace App\ResultHelper;

/**
 *
 */
class SingleResult
{
    private $totalPos;
    private $classPos;
    private $car;
    private $carclass;
    private $team;
    private $points;
    private $out;

    public function __construct()
    {
    }
    public function createFromArray(array $input)
    {
        $this->totalPos = $input[0];
        $this->classPos = 0;
        $this->car = $input[1];
        $this->carclass = '';
        $this->team = intval($input[5])*-1;
        $this->points = 0.0;
        $this->out = $input[10];
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
}
