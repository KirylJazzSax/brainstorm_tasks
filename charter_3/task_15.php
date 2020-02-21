<?php

function isSimple(int $n): bool
{
    if ($n < 0) return false;
    if ($n == 1 || $n == 2) return true;

    if ($n % 1 == 0) {
        $i = 2;
        while ($i < $n) {
            if ($i == $n - 1) return true;
            if ($n % $i == 0) return false;
            $i++;
        }
    }
}

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

function checkEach(array $array, callable $func): bool
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        if (!$func($array[$i])) return false;
    }
    return true;
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

function getResultArray(array $array)
{
    $columns = getColumns($array);

    for ($i = 0; $i < arrayLength($columns); $i++) {
        if (checkEach($columns[$i], 'isSimple')) {
            $columns = arraySplice($columns, $i);
            $i--;
        }
    }

    return columnsToRows($columns);
}

function echoMultiDimensionalArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        for ($j = 0; $j < arrayLength($arr[$i]); $j++) {
            echo ' ' . $arr[$i][$j];
        }
        echo PHP_EOL;
        echo '------------------------------------';
        echo PHP_EOL;
    }
}

#################################################################################################################

$array = [
    [3, 4, 5, 6, 13, 5, 5],
    [1, 20, 3, 5, 3, 3, 5],
    [10, 7, 7, 3, 11, 16, 2],
    [1, 61, 11, 5, 2, 5, 7],
];

echoMultiDimensionalArrayWithKeys(
    getResultArray($array)
);
