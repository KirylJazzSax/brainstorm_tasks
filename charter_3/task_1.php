<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
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

function main(int $i, int $j): bool
{
    return $i === $j;
}

function higher(int $i, int $j): bool
{
    return $i > $j;
}

function lower(int $i, int $j): bool
{
    return $i < $j;
}


/**
 * @param array $array
 * @param callable $func condition for sum
 * @return int
 */
function findSumDiagonal(array $array, callable $func): int
{
    $sum = null;

    for ($i = 0; $i < arrayLength($array); $i++) {
        for ($j = 0; $j < arrayLength($array[$i]); $j++) {
            if ($func($i, $j)) $sum = $sum + $array[$i][$j];
        }
    }

    return $sum;
}

#################################################################################################################

$array = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];

echo 'Сумма главной диагонали ' . findSumDiagonal($array, 'main') . PHP_EOL;
echo 'Сумма выше главной диагонали ' . findSumDiagonal($array, 'higher') . PHP_EOL;
echo 'Сумма ниже главной диагонали ' . findSumDiagonal($array, 'lower') . PHP_EOL;
