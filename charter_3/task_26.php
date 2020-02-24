<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

#################################################################################################################

function moveToTheEndEmptyRows(array $array): array
{
    for ($i = arrayLength($array) - 1; $i >= 0; $i--) {
        if (arrayLength($array[$i]) == 0) {
            for ($j = $i; $j < arrayLength($array) - 1; $j++) {
                $element = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $element;
            }
        }
    }
    return $array;
}

function echoMultiDimensionalArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        for ($j = 0; $j < arrayLength($arr[$i]); $j++) {
            echo ' ' . $arr[$i][$j];
        }
        echo PHP_EOL . '------------------------------------' . PHP_EOL;
    }
}

#################################################################################################################

$array = [
    [3, 7, 0, 0, 11, 124],
    [],
    [8, 10, 11, 5, 8, 3],
    [20, 7, 3, 5, 2, 2],
    [],
    [],
    [1, 2, 3, 6, 10, 12],
];

echoMultiDimensionalArrayWithKeys(
    moveToTheEndEmptyRows($array)
);
