<?php

class PrimeFactors {
    public function generate($number)
    {
            //number are empty array
            $primes = [];
        //using for to say as long as our candid number 2 is less than 1 loop
        for ($candid = 2;$number > 1;$candid++){
            //then (we dont pass any first argument,then we say as long as our number divide by candid is 0
            //then divide it)
            for (;$number % $candid == 0;$number /= $candid){
                //and finally our number is pass to primes
                $primes[] = $candid;
            }
        }

        return $primes;
    }
}
