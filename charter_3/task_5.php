<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function multiple(int $element, int $p)
{
    return $element % $p == 0;
}

function isContainsOnly(array $array, int $p, callable $func): bool
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        if (!$func($array[$i], $p)) return false;
    }
    return true;
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

function getColumn(array $array, int $index): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        $result[] = $array[$i][$index];
    }
    return $result;
}

function getSumCertainColumns(array $array, int $p): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array[$i]); $i++) {
        $column = getColumn($array, $i);
        if (isContainsOnly($column, $p, 'multiple')) {
            // Если соответствует условию то помещаем в массив индекс столбца и сумму его элементов
            $result[] = [$i, getSumNumsInArray($column)];
        }
    }

    return $result;
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

$array = [[4, 8, 2], [2, 4, 16], [-4, -5, 8], [6, 6, 6]];
$p = 2;

echoMultiDimensionalArrayWithKeys(
    getSumCertainColumns($array, $p)
);
