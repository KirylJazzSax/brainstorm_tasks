<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

/**
 * @param array $arr
 * @param $element
 * @return bool|int элемент если найден в другом случае false
 */
function find(array $arr, $element)
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] == $element) return $element;
    }
    return false;
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

function arrayPush(array $array, $element): array
{
    $array[] = $element;
    return $array;
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

function getRepeatedElements(array $array): array
{
    $repeatedElementsArray = [];
    for ($i = 0; $i < arrayLength($array); $i++) {

        $repeatedElements = arrayFilter($array, function ($element) use ($array, $i) {
            return $element == $array[$i] ? true : false;
        });

        if (arrayLength($repeatedElements) > 1 && !find($repeatedElementsArray, $repeatedElements[0])) {
            $repeatedElementsArray = arrayPush($repeatedElementsArray, $repeatedElements[0]);
        }
    }
    return $repeatedElementsArray;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

#####################################################################################################################

$array = [12, 13, 12, -14, 25, 18, -19, 20, 25, 20, -14, 13, 15, 15, 15, -20, 15, 15, 15];

echoArrayWithKeys(
    getRepeatedElements($array)
);
