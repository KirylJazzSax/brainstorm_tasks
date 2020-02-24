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

function pushToTheEnd(array &$array, int $indexElement): array
{
    for ($j = $indexElement; $j < arrayLength($array) - 1; $j++) {
        $e = $array[$j];
        $array[$j] = $array[$j + 1];
        $array[$j + 1] = $e;
    }

    return $array;
}

function isMultipleOf(int $element, int $p): bool
{
    return $element % $p === 0;
}

#################################################################################################################

function prepareSortedRow(callable $sorting, callable $condition, callable $doSome): callable
{
    return function (array &$array, int $p) use ($sorting, $condition, $doSome): array {
        $sorting($array);

        for ($i = arrayLength($array) - 1; $i >= 0; $i--) {
            if (!$condition($array[$i], $p)) $doSome($array, $i);
        }
        return $array;
    };
}

function prepareArrayWithSortedRows(callable $preparedRow): callable
{
    return function (array $array, int $p) use ($preparedRow): array {
        for ($i = 0; $i < arrayLength($array); $i++) {
            $preparedRow($array[$i], $p);
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

$p = 2;


$preparedRow = prepareSortedRow('arraySort', 'isMultipleOf', 'pushToTheEnd');
$resultArray = prepareArrayWithSortedRows($preparedRow);

echoMultiDimensionalArrayWithKeys(
    $resultArray($array, $p)
);