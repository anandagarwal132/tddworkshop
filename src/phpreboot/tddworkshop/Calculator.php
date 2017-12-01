<?php
namespace phpreboot\tddworkshop;

class Calculator{

    public function add($numbers = '')
    {
        if (empty($numbers)) {
            return 0;
        }
        if (!is_string($numbers) ) {
            throw new \InvalidArgumentException('Parameters must be a string');
        }

        $numbers = str_replace("\\\\","", $numbers);
        $negativeNumbers=array();
        $numbersArray = $this->multiexplode(array("\\n",",",";"), $numbers);
        $numbersArray = array_filter($numbersArray, function($number){
            return $number < 1000;
        });
        $negativeNumbers = array_filter($numbersArray, function($number){
                return $number < 0;
        });

        if (array_filter($numbersArray, 'is_numeric') !== $numbersArray) {
            throw new \InvalidArgumentException('Parameters string must contain numbers');
        } elseif (!empty($negativeNumbers)){
            throw new \InvalidArgumentException('Negative numbers ('.implode(',',$negativeNumbers).') not allowed');
        }
        return array_sum($numbersArray);
    }

    function multiexplode ($delimiters,$string) {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }

    public function multiply($numbers = '')
    {
        if (empty($numbers)) {
            return 0;
        }
        if (!is_string($numbers) ) {
            throw new \InvalidArgumentException('Parameters must be a string');
        }
        $numbers = str_replace("\\\\","", $numbers);
        $negativeNumbers=array();
        $numbersArray = $this->multiexplode(array("\\n",",",";"), $numbers);
        $numbersArray = array_filter($numbersArray, function($number){
            return $number < 1000;
        });
        $negativeNumbers = array_filter($numbersArray, function($number){
            return $number < 0;
        });
        if (array_filter($numbersArray, 'is_numeric') !== $numbersArray) {
            throw new \InvalidArgumentException('Parameters string must contain numbers');
        } elseif (!empty($negativeNumbers)){
            throw new \InvalidArgumentException('Negative numbers ('.implode(',',$negativeNumbers).') not allowed');
        }
        return array_product($numbersArray);
    }
}