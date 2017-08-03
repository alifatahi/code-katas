<?php

/**
 * Class BowlingGame
 */
class BowlingGame
{
    //set default rolls to array
    protected $rolls = [];

    //our roll method
    /**
     * @param $pins
     */
    public function roll($pins)
    {
        //check Validation
        $this->guardAgainstInvalidRoll($pins);
        //we set each array rolls to pins
        $this->rolls[] = $pins;
    }

    //score method
    /**
     * @return int|mixed
     */
    public function score()
    {
        //set score and rolls to 0
        $score = 0;
        $roll = 0;
        //then we loop through each frame and increment to get to 10 which is last pins
        for ($frame = 1; $frame <= 10; $frame++) {
            //so if our roll is hit all 10 pins we get strike
            if ($this->isStrike($roll)) {
                //check our second and third roll to add our total score + 1 time again because of strike
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
            } //first we check if our first roll + second roll is == 10 so we get spare
            elseif ($this->isSpare($roll)) {
                //then our score + 10 which is our spare
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            } else {
                //Get Default Score
                $score += $this->getDefaultFrameScore($roll);
                $roll += 2;
            }
        }
        return $score;
    }

    /**
     * @param $roll
     * @return bool
     * Check to see if we get Spare
     */
    public function isSpare($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1] == 10;
    }

    /**
     * @param $roll
     * @return mixed
     * Get Default Score
     */
    public function getDefaultFrameScore($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    /**
     * @param $roll
     * @return bool
     * Check to see if we get Strike
     */
    private function isStrike($roll)
    {
        return $this->rolls[$roll] == 10;
    }

    /**
     * @param $roll
     * @return mixed
     * Get our Bonus
     */
    private function strikeBonus($roll)
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    /**
     * @param $roll
     * @return mixed
     *
     */
    private function spareBonus($roll)
    {
        return $this->rolls[$roll + 2];
    }

    /**
     * @param $pins
     */
    private function guardAgainstInvalidRoll($pins)
    {
        if ($pins < 0) {
            throw new InvalidArgumentException;
        }
    }
}
