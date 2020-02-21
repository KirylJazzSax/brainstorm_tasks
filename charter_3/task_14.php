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

function removeNullFromArray(array &$array): array
{
    for ($i = 0; $i < arrayLength($array); $i++) {

        if (arrayLength($array[$i]) == 0) {
            $array = arraySplice($array, $i);
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
        echo PHP_EOL;
        echo '------------------------------------';
        echo PHP_EOL;
    }
}

#################################################################################################################

$array = [
    [3, 4, 88, 2, 4, 5],
    [1, 20, 4, 5, 3, 3],
    [],
    [10, 7, 4, 5, 220, 16],
    [],
    [1, 61, 4, 5, 6, 5],
];

echoMultiDimensionalArrayWithKeys(
    removeNullFromArray($array)
);