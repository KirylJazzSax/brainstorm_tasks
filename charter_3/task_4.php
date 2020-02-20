<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
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

function isEqualToCertainNums(int $element)
{
    return $element === 0 || $element === 1 || $element === 3 || $element === 8;
}

function isContainsOnly(array $array, callable $func): bool
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        if (!$func($array[$i])) return false;
    }
    return true;
}

function getSumElements(array $array): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        if (isContainsOnly($array[$i], 'isEqualToCertainNums')) {
            // Если соответствует условию то помещаем в массив индекс строки и сумму его элементов
            $result[] = [$i, getSumNumsInArray($array[$i])];
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

$array = [[3, 8, 1], [0, 1, 8, 3, 8], [-4, -5, 7], [6, 6, 6]];

echoMultiDimensionalArrayWithKeys(
    getSumElements($array)
);
