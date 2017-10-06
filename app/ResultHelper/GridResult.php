<?php

namespace App\ResultHelper;

use App\ResultHelper\SingleResult;

/**
 *
 */
class GridResult
{
    private $grid;
    private $gridClasses;


    public function createFromArray(array $input)
    {
        $this->grid = array();
        foreach ($input as $line) {
            $result = new SingleResult();
            $result->createFromArray($line);
            array_push($this->grid, $result);
        }
    }
    public function sortByClass()
    {
        foreach ($this->grid as $key => $result) {
            $this->grid[$key]->setCar(config('constants.ircars_to_car')[$result->getCar()]);
        }
        foreach ($this->grid as $key => $result) {
            $this->grid[$key]->setCarClass(config('constants.cars_to_classes')[config('constants.curent_season')][$result->getCar()]);
        }
        foreach ($this->grid as $result) {
            $this->gridClasses[$result->getCarClass()][] = $result;
        }
        foreach ($this->gridClasses as $className => $class) {
            foreach ($class as $key => $result) {
                $this->gridClasses[$className][$key]->setClassPos($key+1);
            }
        }
        foreach ($this->gridClasses as $className => $class) {
            foreach ($class as $key => $result) {
                $this->gridClasses[$className][$key]->setPoints(config('constants.points')[$result->getClassPos()]);
            }
        }
    }
}
