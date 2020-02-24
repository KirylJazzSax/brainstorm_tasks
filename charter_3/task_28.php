<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function arraySort(array &$arr): array
{
    $i = 0;
    $length = arrayLength($arr);
    while ($i < $length) {
        if (!isset($arr[$i + 1])) break;
        $j = 0;
        while ($j < $length - 1) {
            if ($arr[$j] > $arr[$j + 1]) {
                $num = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $num;
            }
            $j++;
        }
        $i++;
    }
    return $arr;
}

function isNegative(int $num): bool
{
    return $num < 0;
}

#################################################################################################################

function prepareResultArray(callable $sorter): callable
{
    return function (array $array) use ($sorter): array {
        for ($i = 0; $i < arrayLength($array); $i++) {
            if (isNegative($array[$i][0])) $sorter($array[$i]);
        }
        return $array;
    };
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
    [-8, 10, 11, 5, 8, 3],
    [-20, 7, 3, 5, 2, 2],
    [1, 2, 3, 15, 10, 12],
];

$result = prepareResultArray('arraySort');

echoMultiDimensionalArrayWithKeys(
    $result($array)
);
