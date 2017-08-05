<?php

/**
 * Class FizzBuzz
 */
class FizzBuzz
{

    /**
     *Execute method to execute number in FizzBuzz Mode
     */
    public function execute($number)
    {
        //we divide number to 15,3,5 so if number left is == 0 we return value
        if ($number % 15 == 0) return 'fizzbuzz';
        if ($number % 3 == 0) return 'fizz';
        if ($number % 5 == 0) return 'buzz';
        //other wise we return number
        return $number;
    }

    /**
     * @param $number
     * @return array
     *  Method to Execute our number up to any number we declare in FizzBuzz Mode
     */
    public function executeUpTo($number)
    {
        $output = [];
        //here we use range method which is create array of range element so in here we say:
        //take range from 1 to number that we declare in method like 5 so 1,2,3,4,5
        foreach (range(1, $number) as $i) {
            //then we use our execute to return number in FizzBuzz Mode
            $output[] = $this->execute($i);
        }
        return $output;

        //we also have another way

//        return array_map(function ($i) {
//            return $this->execute($i);
//        }, range(1, $number));
    }


}
