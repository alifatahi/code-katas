<?php

class RomanNumeralsConverter
{
    //Array of Numbers
    protected static $lookup = [
        1000 => 'M',
        900  => 'CM',
        500  => 'D',
        400  => 'CD',
        100  => 'C',
        90   => 'XC',
        50   => 'L',
        40   => 'XL',
        10   => 'X',
        9    => 'IX',
        5    => 'V',
        4    => 'IV',
        1    => 'I'
    ];
    //Method to Convert
    public function convert($number)
    {
        $solution = '';
        //First we loop through each number with Associative Array(Numbers,Roman)
        foreach (static::$lookup as $limit => $glyph){
            //then we do while and say as long as 10 is less or == to number
            while ($number >= $limit){
                //then we append Roman type of limit to Solution
                $solution .= $glyph;
                //also we say reduce our number by limit so if number is: 11
                //then it first reduce 10 and we get X then its loop 1 and get I
                // XI = 11
                $number -= $limit;
            }
        }

        //and finally we return it
        return $solution;
    }
}
