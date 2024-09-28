<?php

$numbers = [2,9,1,7,8,11,5];

// input (array )  numbers
//output
/*
 *  1- max even
 *  2- max odd
 *  3- min even
 *  4- min odd
 */

$maxOdd = $numbers[0];
$maxEven = $numbers[0];
$minOdd = $numbers[0];
$minEven = $numbers[0];
$countOfArr = count($numbers);


for ($i = 0; $i < $countOfArr; $i++) {
    // first check if it even then return max and min even
    if($numbers[$i] % 2 == 0){
        if ($numbers[$i] > $maxEven ) {
            $maxEven = $numbers[$i];
        }
        if ($numbers[$i] < $minEven) {
            $minEven = $numbers[$i];
        }

    }else {
        if ($numbers[$i] > $maxOdd) {
            $maxOdd = $numbers[$i];
        }

        if ($numbers[$i] < $minOdd) {
            $minOdd = $numbers[$i];
        }
    }
}

echo "Min Even Value is = " .$minEven . "\n";
echo "Min Odd Value is = " .$minOdd . "\n";
echo "Max Even Value is = " .$maxEven . "\n";
echo "Max Odd Value is = " .$maxOdd . "\n";