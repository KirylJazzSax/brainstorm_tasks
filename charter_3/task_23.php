<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function isPositive(int $num): bool
{
    return $num > 0;
}

function countPositiveElements(array $array): int
{
    $counter = 0;

    for ($i = 0; $i < arrayLength($array); $i++) {
        if (isPositive($array[$i])) $counter++;
    }
    return $counter;
}

function sortMultiByPositiveElementsDesc(array $array): array
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        $j = $i;
        while ($j >= 0) {
            if ($j > 0 && countPositiveElements($array[$j - 1]) < countPositiveElements($array[$j])) {
                $row = $array[$j];
                $array[$j] = $array[$j - 1];
                $array[$j - 1] = $row;
            }
            $j--;
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
    [3, 4, -88, -2, -4, -5],
    [-8, -20, 4, 5, 3, 3],
    [20, 7, 4, 5, 2, 16],
    [1, 61, 4, -5, 6, 5],
];

echoMultiDimensionalArrayWithKeys(
    sortMultiByPositiveElementsDesc($array)
);

