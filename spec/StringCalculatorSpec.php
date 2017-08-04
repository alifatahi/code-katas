<?php

namespace spec;

use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class StringCalculatorSpec
 * @package spec
 */
class StringCalculatorSpec extends ObjectBehavior
{
    /**
     * Return 0 for empty string
     */
    function it_translate_empty_string_to_zero()
    {
        $this->add('')->shouldEqual(0);
    }

    /**
     * Get Sum of one Number
     */
    function it_find_sum_of_one_number()
    {
        $this->add('5')->shouldEqual(5);
    }

    /**
     * Get Sum of two number
     */
    function it_find_sum_of_two_numbers()
    {
        $this->add('1,2')->shouldEqual(3);
    }

    /**
     * get sum of amount number
     */
    function it_should_return_sum_of_any_numbers()
    {
        $this->add('1,2,3,4,5')->shouldEqual(15);
    }

    /**
     * Disallow Negative Number
     */
    function it_disallows_negative_numbers()
    {
        $this->shouldThrow(new InvalidArgumentException('Invalid number provided: -2'))->duringAdd('3,-2');
    }

    /**
     *  ignore 1000 or upper Number
     */
    function it_ignore_any_numbers_that_one_thousand_or_greater()
    {
        $this->add('1,2,1000')->shouldEqual(3);
    }

    /**
     *  allow different delimiters
     */
    function it_allow_different_delimiter()
    {
        $this->add('1,2\n2')->shouldEqual(5);
    }

}
