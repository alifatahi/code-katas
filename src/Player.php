<?php

/**
 * Class Player
 */
class Player{
    //Player Property
    public $name;
    public $points;

    /**
     * Player constructor.
     * @param $name
     * @param $score
     */
    public function __construct($name,$points)
    {
        $this->name = $name;
        $this->points = $points;

    }

    //Earn point method
    public function earnPoints($points)
    {
        $this->points = $points;
    }
}