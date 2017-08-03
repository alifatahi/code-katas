<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class BowlingGameSpec
 * @package spec
 */
class BowlingGameSpec extends ObjectBehavior
{
    //its for when we hit no pins
    function it_scores_a_gutter_game_as_zero()
    {
        //so we loop 20 times but we get nothing
        $this->rollTimes(20, 0);
        $this->score()->shouldBe(0);
    }

    //get award for sum of all knocked down pins
    function it_scores_the_sum_of_all_knocked_down_pins_for_a_game()
    {
        $this->rollTimes(20, 1);
        //our score would be 20
        $this->score()->shouldBe(20);
    }

    //we get award for spare
    function it_awards_a_one_roll_bonus_for_every_spare()
    {
        //so as we know we have 20 rolls
        $this->rollSpare();
        //next we hti 5
        $this->roll(5);
        //so we already  use 3 rolls so we have 17 left
        $this->rollTimes(17, 0);
        //and our score should be 20
        $this->score()->shouldBe(20);
    }

    /**
     * We Get 2 Bonus if we get strike (hit all Pins in ove roll)
     */
    public function it_awards_a_two_roll_bonus_for_a_strike_in_the_previous_frame()
    {
        //we hit all 10 so we get strike
        $this->roll(10);
        $this->roll(7);
        $this->roll(2);
        //so now instead of 19 we get 28 because we have 2 * 9
        $this->rollTimes(17, 0);

        $this->score()->shouldBe(28);
    }

    /**
     * make method to check if we add less 0 rolls
     */
    function it_takes_exception_with_invalid_rolls(){
        $this->shouldThrow('InvalidArgumentException')->duringRoll(-10);
    }

    /**
     * @return mixed
     */
    private function rollSpare()
    {
        $this->roll(2);
        $this->roll(8);//we get spare because we hit all pins
    }

    private function rollTimes($count, $pins)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->roll($pins);
        }
    }
}
