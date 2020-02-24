<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function getColumns(array $array): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array[0]); $i++) {
        $column = [];
        for ($j = 0; $j < arrayLength($array); $j++) {
            $column[] = $array[$j][$i];
        }
        $result[] = $column;
    }
    return $result;
}

function columnsToRows(array $columns): array
{
    return getColumns($columns);
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

function prepareSorterMultiArrayDesc(callable $value): callable
{
    return function (array $array) use ($value): array {
        for ($i = 0; $i < arrayLength($array); $i++) {
            for ($j = $i; $j > 0; $j--) {
                if ($value($array[$j]) > $value($array[$j - 1])) {
                    $num = $array[$j];
                    $array[$j] = $array[$j - 1];
                    $array[$j - 1] = $num;
                }
            }
        }
        return $array;
    };
}

function sortColumnsByMaxElement(callable $sorter): callable
{
    return function (array $array) use ($sorter): array {
        $columns = getColumns($array);
        return columnsToRows(
            $sorter($columns)
        );
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
$resultArray = sortColumnsByMaxElement($sorter);

echoMultiDimensionalArrayWithKeys(
    $resultArray($array)
);
