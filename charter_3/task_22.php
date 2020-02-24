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

function columnsToRows(array $columns): array
{
    return getColumns($columns);
}

function sortColumns(array $array): array
{
    $columns = getColumns($array);

    for ($i = 0; $i < arrayLength($columns); $i++) {
        arraySort($columns[$i]);
    }
    return columnsToRows($columns);
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
    [3, 4, 88, 2, 4, -5],
    [-8, -20, 4, 5, 3, 3],
    [-20, -7, 4, 5, 2, -16],
    [1, -61, 4, -5, 6, -5],
];

echoMultiDimensionalArrayWithKeys(
    sortColumns($array)
);
