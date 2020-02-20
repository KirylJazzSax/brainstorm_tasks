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


function getSumNumsInArray(array $nums): int
{
    $sum = 0;
    $i = 0;
    while (true) {
        if (isset($nums[$i])) {
            $sum += $nums[$i];
        } else {
            break;
        }
        $i++;
    }
    return $sum;
}

function arraySplice(array $array, int $index, int $amount = 1): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        if ($i == $index) {
            $i += $amount - 1;
            continue;
        }
        $result = arrayPush($result, $array[$i]);
    }

    return $result;
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

function getRowWithSmallestAverage(array $array): int
{
    $firstRow = arrayFilter($array[0], 'isPositive');
    $smallestAverage = getSumNumsInArray($firstRow) / arrayLength($firstRow);
    $rowNumber = 0;

    for ($i = 0; $i < arrayLength($array); $i++) {
        $row = arrayFilter($array[$i], 'isPositive');
        $average = getSumNumsInArray($row) / arrayLength($row);
        if ($smallestAverage > $average) {
            $smallestAverage = $average;
            $rowNumber = $i;
        }
    }

    return $rowNumber;
}

#################################################################################################################

$array = [[7, -8, -9], [7, 8, -9], [-4, -5, 7], [6, 6, 6]];

echo 'Номер строки с наименьшим средним арифметическим ' . getRowWithSmallestAverage($array) . PHP_EOL;
