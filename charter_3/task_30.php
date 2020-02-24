<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}
function getMax(array $arr): int
{
    $max = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($max < $arr[$i]) $max = $arr[$i];
    }
    return $max;
}

#################################################################################################################

function prepareSorterMultiArrayDesc(callable $getValue): callable
{
    return function (array $array) use ($getValue): array {
        for ($i = 0; $i < arrayLength($array); $i++) {
            for ($j = $i; $j > 0; $j--) {
                if ($getValue($array[$j]) > $getValue($array[$j - 1])) {
                    $num = $array[$j];
                    $array[$j] = $array[$j - 1];
                    $array[$j - 1] = $num;
                }
            }
        }
        return $array;
    };
}

function sortRowsByMaxElementDesc(callable $sorter): callable
{
    return function (array $array) use ($sorter): array {
        return $sorter($array);
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
    [8, 10, 11, 5, 8, 3],
    [20, 7, 3, 5, 2, 2],
    [1, 2, 3, 6, 10, 12],
];

$sorter = prepareSorterMultiArrayDesc('getMax');
$sortRows = sortRowsByMaxElementDesc($sorter);

echoMultiDimensionalArrayWithKeys(
    $sortRows($array)
);
