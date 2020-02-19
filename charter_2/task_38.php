<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function isNegative(int $num): bool
{
    return $num < 0 ? true : false;
}

function isPositive(int $num): bool
{
    return $num > 0 ? true : false;
}

function reverseArray(array $arr): array
{
    $i = arrayLength($arr);
    $result = [];
    while ($i > 0) {
        $result[] = $arr[$i - 1];
        $i--;
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

function arraySort(array $arr): array
{
    $i = 0;
    $length = arrayLength($arr);
    while ($i < $length) {
        if (!isset($arr[$i + 1])) break;
        $j = 0;
        while ($j < $length - 1) {
            if ($arr[$j] > $arr[$j + 1]) {
                $num = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $num;
            }
            $j++;
        }
        $i++;
    }
    return $arr;
}

/**
 * @param array $array
 * @param array $elements
 * @param null $index после какого элемента вставить элементы
 * @return array
 */
function insertIntoArray(array $array, array $elements, $index = null): array
{
    if ($index === null) {
        for ($i = 0; $i < arrayLength($elements); $i++) {
            $array[] = $elements[$i];
        }
        return $array;
    }

    $result = [];

    for ($i = 0; $i <= $index; $i++) {
        $result[] = $array[$i];
    }

    for ($i = 0; $i < arrayLength($elements); $i++) {
        $result[] = $elements[$i];
    }

    for ($i = $index + 1; $i < arrayLength($array); $i++) {
        $result[] = $array[$i];
    }

    return $result;
}

function getNegativeElements(array $array): array
{
    return arrayFilter($array, 'isNegative');
}

function getPositiveElements(array $array): array
{
    return arrayFilter($array, 'isPositive');
}

function getResultArray(array $array): array
{
    $negativeSorted = arraySort(
        getNegativeElements($array)
    );

    $positiveSortedOtherWay = reverseArray(
        arraySort(
            getPositiveElements($array)
        )
    );

    return insertIntoArray($negativeSorted, $positiveSortedOtherWay);
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

###################################################################################################################

$array = [2, 3, 6, -5, -8, -7, -4, 8, 9, 5, 3];

echoArrayWithKeys(
    getResultArray($array)
);


