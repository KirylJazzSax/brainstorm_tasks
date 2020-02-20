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

function isPositive(int $num): bool
{
    return $num > 0;
}

function isContainsOnly(array $array, callable $func): bool
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        if (!$func($array[$i])) return false;
    }
    return true;
}

function multiplyElementsInArrayWithSameLength(array $first, array $second): array
{
    for ($i = 0; $i < arrayLength($first); $i++) {
        $first[$i] *= $second[$i];
    }
    return $first;
}

function getColumn(array $array, int $index): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        $result[] = $array[$i][$index];
    }
    return $result;
}

/**
 * @param array $array
 * @return bool|mixed первую попавшуюся строку без отрицательных элементов, или false если такой нет
 */
function getVector(array $array)
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        if (isContainsOnly($array[$i], 'isPositive')) return $array[$i];
    }
    return false;
}

function getResult(array $array): array
{
    $result = [];
    $vector = getVector($array);

    for ($i = 0; $i < arrayLength($array); $i++) {
        $result[] = getSumNumsInArray(
            multiplyElementsInArrayWithSameLength(
                getColumn($array, $i),
                $vector
            )
        );
    }
    return $result;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

###########################################################################################################

$array = [[4, 8, -2], [2, 4, 16], [6, 6, 6]];

echoArrayWithKeys(
    getResult($array)
);
