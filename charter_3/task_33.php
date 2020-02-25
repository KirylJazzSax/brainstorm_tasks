<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function arraySortDesc(array &$arr): array
{
    $i = 0;
    while ($i < arrayLength($arr)) {
        $j = $i;
        while ($j >= 0) {
            if ($j > 0 && $arr[$j] > $arr[$j - 1]) {
                $num = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $num;
            }
            $j--;
        }
        $i++;
    }
    return $arr;
}

#################################################################################################################

function prepareSortedRow(callable $sorting): callable
{
    return function (array &$array, int $p) use ($sorting): array {
        $array[] = $p;
        return $sorting($array);
    };
}

function prepareArrayWithSortedRows(callable $prepareRow): callable
{
    return function (array $array, int $p) use ($prepareRow): array {
        for ($i = 0; $i < arrayLength($array); $i++) {
            $prepareRow($array[$i], $p);
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
    [3, 7, 6, 8, 11, 124],
    [8, 10, 11, 5, 8, 3],
    [20, 7, 3, 5, 2, 2],
    [1, 2, 3, 6, 10, 12],
];

$p = 7;

$prepareRow = prepareSortedRow('arraySortDesc');
$resultArray = prepareArrayWithSortedRows($prepareRow);

echoMultiDimensionalArrayWithKeys(
    $resultArray($array, $p)
);
