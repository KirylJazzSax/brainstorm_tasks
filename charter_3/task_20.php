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

/**
 * @param array $arr
 * @param int $element
 * @return int|bool index елемента если не нашёл то false
 */
function getIndexOf(array $arr, int $element)
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] == $element) return $i;
    }
    return false;
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

function getBiggestElementInArray(array $arr): int
{
    $max = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($max < $arr[$i]) $max = $arr[$i];
    }
    return $max;
}

/**
 * @param array $arr
 * @param $element
 * @return bool|int элемент если найден в другом случае false
 */
function find(array $arr, $element)
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] === $element) return $element;
    }
    return false;
}

function removeRepeatedElements(array $array, array $elements): array
{
    for ($j = 0; $j < arrayLength($elements); $j++) {
        while (find($array, $elements[$j])) {
            $array = arraySplice($array, getIndexOf($array, $elements[$j]));
        }
    }
    return $array;
}

function getRepeatedElements(array $array): array
{
    $repeatedElementsArray = [];
    for ($i = 0; $i < arrayLength($array); $i++) {

        $repeatedElements = arrayFilter($array, function ($element) use ($array, $i) {
            return $element === $array[$i];
        });

        if (arrayLength($repeatedElements) > 1 && !find($repeatedElementsArray, $repeatedElements[0])) {
            $repeatedElementsArray[] = $repeatedElements[0];
        }
    }
    return $repeatedElementsArray;
}

function findMaxUniqueElements(array $array): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        $array[$i] = removeRepeatedElements($array[$i], getRepeatedElements($array[$i]));
    }

    for ($i = 0; $i < arrayLength($array); $i++) {
        $result[] = getBiggestElementInArray($array[$i]);
    }

    return $result;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

#################################################################################################################

$array = [
    [3, 4, 88, 88, 7],
    [-8, -20, 3, 2, 4],
    [-20, -7, 4, 5, 5],
    [1, -61, 4, -5, 7],
];

echoArrayWithKeys(
    findMaxUniqueElements($array)
);