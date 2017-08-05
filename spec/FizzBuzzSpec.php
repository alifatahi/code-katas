<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class FizzBuzzSpec
 * @package spec
 */
class FizzBuzzSpec extends ObjectBehavior
{
    /**
     * translate to 1
     */
    function it_translate_1_for_fizzBuzz()
    {
        $this->execute(1)->shouldReturn(1);
    }


    /**
     * translate 2
     */
    function it_translate_2_for_fizzBuzz()
    {
        $this->execute(2)->shouldReturn(2);
    }


    /**
     * translate 3 to fizz
     */
    function it_translate_3_for_fizzBuzz()
    {
        $this->execute(3)->shouldReturn('fizz');
    }


    /**
     * 5 to buzz
     */
    function it_translate_5_for_fizzBuzz()
    {
        $this->execute(5)->shouldReturn('buzz');
    }


    /**
     * 6 to fizz
     */
    function it_translate_6_for_fizzBuzz()
    {
        $this->execute(6)->shouldReturn('fizz');
    }


    /**
     * 10 to buzz
     */
    function it_translate_10_for_fizzBuzz()
    {
        $this->execute(10)->shouldReturn('buzz');
    }


    /**
     * 15 fizzbuzz
     */
    function it_translate_15_for_fizzBuzz()
    {
        $this->execute(15)->shouldReturn('fizzbuzz');
    }


    /**
     * 123 to fizz
     */
    function it_translate_123_for_fizzBuzz()
    {
        $this->execute(123)->shouldReturn('fizz');
    }


    /**
     * 1 to 5 to 1,2,fizz,4,buzz
     */
    function it_translate_sequence_of_number_for_fizzBuzz()
    {
        //we return all number from 1 to 5 in fizzbuzz Mode
        $this->executeUpTo(5)->shouldReturn([1, 2, 'fizz', 4, 'buzz']);
    }
}
