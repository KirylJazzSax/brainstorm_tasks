<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function findSumElementsHigherMainDiagonal(array $array): int
{
    $sum = null;

    for ($i = 0; $i < arrayLength($array); $i++) {
        for ($j = 0; $j < arrayLength($array[$i]); $j++) {
            if ($i > $j) {
                $sum = $sum + $array[$i][$j];
            }
        }
    }

    return $sum;
}

function findSumElementsLowerMainDiagonal(array $array): int
{
    $sum = null;

    for ($i = 0; $i < arrayLength($array); $i++) {
        for ($j = 0; $j < arrayLength($array[$i]); $j++) {
            if ($i < $j) {
                $sum = $sum + $array[$i][$j];
            }
        }
    }

    return $sum;
}

function findSumElementsOnMainDiagonal(array $array): int
{
    $sum = null;

    for ($i = 0; $i < arrayLength($array); $i++) {
        for ($j = 0; $j < arrayLength($array[$i]); $j++) {
            if ($i === $j) {
                $sum += $array[$i][$j];
            }
        }
    }

    return $sum;
}

#################################################################################################################

$array = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];

echo 'Сумма главной диагонали ' . findSumElementsOnMainDiagonal($array) . PHP_EOL;
echo 'Сумма выше главной диагонали ' . findSumElementsHigherMainDiagonal($array) . PHP_EOL;
echo 'Сумма ниже главной диагонали ' . findSumElementsLowerMainDiagonal($array) . PHP_EOL;
