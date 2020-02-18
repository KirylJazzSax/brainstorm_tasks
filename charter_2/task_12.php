<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}


function getIndexOfBiggestElementInArray(array $arr): int
{
    $max = $arr[0];
    $index = 0;
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($max < $arr[$i]) {
            $max = $arr[$i];
            $index = $i;
        }
    }
    return $index;
}

function getIndexOfSmallestElementInArray(array $arr): int
{
    $min = $arr[0];
    $index = 0;
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($min > $arr[$i]) {
            $min = $arr[$i];
            $index = $i;
        }
    }
    return $index;
}

function arrayFilter(array $arr, callable $func): array
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if (!$func($arr[$i])) {
            array_splice($arr, $i, 1);
            $i--;
        }
    }

    return $arr;
}

function printResult(array $array): void
{
    $negativeArray = arrayFilter($array, function ($element) {
        return $element < 0 ? true : false;
    });

    $biggestNegative = $negativeArray[getIndexOfBiggestElementInArray($negativeArray)];

    $positiveArray = arrayFilter($array, function ($element) {
        return $element > 0 ? true : false;
    });

    $smallestPositive = $positiveArray[getIndexOfSmallestElementInArray($positiveArray)];

    echo "наибольший из всех отрицательных элементов $biggestNegative\n"
        . "наименьший из всех положительных $smallestPositive\n";
}

#########################################################################################################################

$array = [-12, 13, -14, -1, 2, 17, -18, 19, 20, -13, -15];

printResult($array);
