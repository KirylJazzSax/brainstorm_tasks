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

function isNull($element): bool
{
    return $element == 0;
}

function notNull($element): bool
{
    return $element != 0;
}

function arrayFilter(array $arr, callable $func): array
{
    $result = [];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($func($arr[$i])) {
            $result[] = $arr[$i];
        }
    }

    return $result;
}

function arrayPushElements(array &$array, array $elements): array
{
    for ($i = 0; $i < arrayLength($elements); $i++) {
        $array[] = $elements[$i];
    }
    return $array;
}

#######################################################################################################

function prepareRow(callable $sort, callable $isNull, callable $notNull): callable
{
    return function (array &$row) use ($sort, $isNull, $notNull) {
        $removeNull = arrayFilter($row, $notNull);
        $getNull = arrayFilter($row, $isNull);
        $sort($removeNull);
        $row = arrayPushElements($removeNull, $getNull);
        return $row;
    };
}

function pushNullAndSortRows(callable $prepareRow): callable
{
    return function (array $array) use ($prepareRow) {
        for ($i = 0; $i< arrayLength($array); $i++) {
            $prepareRow($array[$i]);
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
    [3, 0, 4, -2, 0, -3],
    [0, 0, 4, 5, 3, 3],
    [20, 7, 0, 5, 0, 16],
    [1, 61, 4, -5, 6, 5],
];

$preparedRow = prepareRow('arraySortDesc', 'isNull', 'notNull');
$resultArray = pushNullAndSortRows($preparedRow);

echoMultiDimensionalArrayWithKeys(
    $resultArray($array)
);
