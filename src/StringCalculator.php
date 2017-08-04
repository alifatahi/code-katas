<?php

/**
 * Class StringCalculator
 */
class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    /**
     * @return int
     * add Method for calculate
     */
    public function add($numbers)
    {
        //explode , from numbers
//        $numbers = explode(',', $numbers);

        //build Regular Expression (first we declare extra space before or after
        // then we also add \n to allow calculate)
        $numbers = $this->parseNumbers($numbers);

//        $solution = 0;
//        foreach ($numbers as $number) {
//            $this->guardAgainstInvalidNumber($number);
//            if ($number >= self::MAX_NUMBER_ALLOWED) continue;
//            $solution += $number;
//        }
//        return $solution;
        return array_sum(array_map(function ($number) {
            $this->guardAgainstInvalidNumber($number);
            if ($number >= self::MAX_NUMBER_ALLOWED) {
                return 0;
            }
            return $number;
        }, $numbers));

    }

    /**
     * @param $number
     */
    private function guardAgainstInvalidNumber($number)
    {
        if ($number < 0) throw new InvalidArgumentException("Invalid number provided: {$number}");
    }

    /**
     * @param $numbers
     * @return array
     */
    private function parseNumbers($numbers)
    {
        //with using intval we declare we want value as int
        return array_map('intval', preg_split('/\s*(,|\\\n)\s*/', $numbers));
    }
}
