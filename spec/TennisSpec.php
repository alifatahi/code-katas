<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Player;
/**
 * Class TennisSpec
 * @package spec
 */
class TennisSpec extends ObjectBehavior
{
    //our Player Property
    protected $john;
    protected $jane;
    //build user
    function let(){
        $this->john = new Player('John Doe',0);
        $this->jane = new Player('Jane Doe',0);
        $this->beConstructedWith($this->john, $this->jane);
    }
    /**
     * it means 0-0 at begin of game
     */
    function it_score_a_scoreless_game()
    {
        $this->score()->shouldReturn('Love-All');
    }

    /**
     * it means 1-0
     */
    function it_score_a_1_0_game()
    {
        //add Point 1(Fifteen) to User John
        $this->john->earnPoints(1);

        $this->score()->shouldReturn('Fifteen-Love');
    }

    /**
     * it means 2-0
     */
    function it_score_a_2_0_game()
    {
        //add Point 1(Fifteen) to User John
        $this->john->earnPoints(2);

        $this->score()->shouldReturn('Thirty-Love');
    }


    /**
     * it means 3-0
     */
    function it_score_a_3_0_game()
    {
        //add Point 1(Fifteen) to User John
        $this->john->earnPoints(3);

        $this->score()->shouldReturn('Forty-Love');
    }


    /**
     * it means 4-0
     */
    function it_score_a_4_0_game()
    {
        //add Point 4(Forty) to User John
        $this->john->earnPoints(4);

        $this->score()->shouldReturn('Win for John Doe');
    }


    /**
     * it means 0-4
     */
    function it_score_a_0_4_game()
    {
        //add Point 4(Forty) to User Jane
        $this->jane->earnPoints(4);

        $this->score()->shouldReturn('Win for Jane Doe');
    }


    /**
     * it means 4-3
     */
    function it_score_a_4_3_game()
    {
        //add Point 4(Forty) to User John
        $this->john->earnPoints(4);
        $this->jane->earnPoints(3);

        $this->score()->shouldReturn('Advantage John Doe');
    }

    /**
     * it means 3-3
     */
    function it_score_a_3_3_game()
    {
        //add Point 4(Forty) to User John
        $this->john->earnPoints(3);
        $this->jane->earnPoints(3);

        $this->score()->shouldReturn('Deuce');
    }


}
