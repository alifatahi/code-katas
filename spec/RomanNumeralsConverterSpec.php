<?php
namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RomanNumeralsConverterSpec extends ObjectBehavior
{
    //Convert 1 to I
    function it_calculate_the_roman_numeral_for_1(){
        $this->convert(1)->shouldReturn('I');
    }

    //Convert 2 to II
    function it_calculate_the_roman_numeral_for_2(){
        $this->convert(2)->shouldReturn('II');
    }

    //Convert 4 to IV
    function it_calculate_the_roman_numeral_for_4(){
        $this->convert(4)->shouldReturn('IV');
    }


    //Convert 10 to X
    function it_calculate_the_roman_numeral_for_10(){
        $this->convert(10)->shouldReturn('X');
    }


    //Convert 1 to II
    function it_calculate_the_roman_numeral_for_20(){
        $this->convert(20)->shouldReturn('XX');
    }


    //Convert 1 to II
    function it_calculate_the_roman_numeral_for_100(){
        $this->convert(100)->shouldReturn('C');
    }


    //Convert 1 to II
    function it_calculate_the_roman_numeral_for_1992(){
        $this->convert(1992)->shouldReturn('MCMXCII');
    }


}
