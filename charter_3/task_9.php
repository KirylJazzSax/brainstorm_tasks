<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function getSumDigits(int $n): int
{
    $sum = 0;

    while (true) {
        if ($n === 0) break;
        $lastDigit = $n % 10;
        $sum += $lastDigit;
        $n = (int)$n / 10;
    }

    return $sum;
}

function getColumn(array $array, int $index): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        $result[] = $array[$i][$index];
    }
    return $result;
}

function isNegative(int $num): bool
{
    return $num < 0;
}

function isContainsOnly(array $array, callable $func): bool
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        if (!$func($array[$i])) return false;
    }
    return true;
}

function getResultArray(array $array): array
{
    for ($i = 0; $i < arrayLength($array[$i]); $i++) {
        if (isContainsOnly(getColumn($array, $i), 'isNegative')) {
            for ($j = 0; $j < arrayLength($array); $j++) {
                $array[$j][$i] = getSumDigits($array[$j][$i]);
            }
        }

    }
    return $array;
}

function echoMultiDimensionalArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo '###############################################################################' . PHP_EOL;
        for ($j = 0; $j < arrayLength($arr[$i]); $j++) {
            echo $j . ' => ' . $arr[$i][$j] . PHP_EOL;
        }
    }
}

#################################################################################################################

$array = [
    [4, -88, -18],
    [-8, -20, -16],
    [6, -7, 6],
    [1, -61, -5],
];

echoMultiDimensionalArrayWithKeys(
    getResultArray($array)
);
