<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function isIncreasingOrDecreasing(array $array): bool
{
    if (isset($array[1])) {
        $increase = $array[0] < $array[1] ? 1 : 0;
    } else {
        return false;
    }

    for ($i = 0; $i < arrayLength($array); $i++) {
        if ($increase === 1 && isset($array[$i + 1]) && $array[$i] >= $array[$i + 1]) {
            return false;
        } else if ($increase === 0 && isset($array[$i + 1]) && $array[$i] <= $array[$i + 1]) {
            return false;
        }
    }
    return true;
}

function getSmallestElementInArray(array $arr): int
{
    $min = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($min > $arr[$i]) $min = $arr[$i];
    }
    return $min;
}

function getBiggestElementInArray(array $arr): int
{
    $max = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($max < $arr[$i]) $max = $arr[$i];
    }
    return $max;
}

function getMaxMin(array $array): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        if (isIncreasingOrDecreasing($array[$i])) {
            $result[] = [getSmallestElementInArray($array[$i]), getBiggestElementInArray($array[$i])];
        }
    }

    return $result;
}

function echoMultiDimensionalArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo '###############################################################################' . PHP_EOL;
        for ($j = 0; $j < arrayLength($arr[$i]); $j++) {
            echo $j . ' => ' . $arr[$i][$j] . PHP_EOL;
        }
    }
}

#################################################################################################################

$array = [[7, -8, -9], [7, 8, 9], [-4, -5, 7], [6, 6, 6]];

echoMultiDimensionalArrayWithKeys(
    getMaxMin($array)
);
