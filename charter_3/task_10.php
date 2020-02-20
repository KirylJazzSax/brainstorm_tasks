<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function arraySplice(array $array, int $index, int $amount = 1): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        if ($i == $index) {
            $i += $amount - 1;
            continue;
        }
        $result[] = $array[$i];
    }

    return $result;
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

function getResultArray(array $array):array
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        $array[$i] = arraySplice($array[$i], getIndexOfBiggestElementInArray($array[$i]));
    }
    return $array;
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

$array = [
    [4, -88, -18],
    [-8, -20, -16],
    [6, -7, 6],
    [1, -61, -5],
];

print_r(getResultArray($array));
