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
        if ($arr[$i] === $element) return $element;
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

function removeNullFromArray(array &$array): array
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        if ($array[$i] == 0) $array = arraySplice($array, getIndexOf($array, 0));
    }

    return $array;
}

function removeAllCertainElementsFromArray(array $array, int $element): array
{
    while (find($array, $element)) {
        $array = arraySplice($array, getIndexOf($array, $element));
    }

    return $array;
}

/**
 * @param array $array
 * @param array $elements
 * @param null $index после какого элемента вставить элементы
 * @return array
 */
function insertIntoArray(array &$array, array $elements, $index = null): array
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

#################################################################################################################

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

/**
 * @param array $array
 * @return int|false
 */
function getElementWithBiggestRepeat(array $array)
{
    $counter = 0;
    $countBiggest = 0;
    $element = null;
    $repeatedElements = getRepeatedElements($array);
    if (!isset($repeatedElements[0])) return false;

    for ($i = 0; $i < arrayLength($repeatedElements); $i++) {
        $counter = 0;
        for ($j = 0; $j < arrayLength($array); $j++) {
            if ($array[$j] === $repeatedElements[$i]) $counter++;
        }
        if ($countBiggest < $counter) {
            $countBiggest = $counter;
            $element = $repeatedElements[$i];
        }
    }

    return $element;
}

function getSortOrder(array $array): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        $elementWithBiggestRepeat = getElementWithBiggestRepeat($array);
        $result[] = $elementWithBiggestRepeat;
        $array = removeAllCertainElementsFromArray($array, $elementWithBiggestRepeat);
    }

    removeNullFromArray($result);
    insertIntoArray($result, $array);
    return $result;
}

function arraySortWithOrder(array $array, array $order): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($order); $i++) {
        for ($j = 0; $j < arrayLength($array); $j++) {
            if ($array[$j] === $order[$i]) {
                $result[] = $array[$j];
            }
        }
    }
    return $result;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

##########################################################################################################

$array = [2, 3, 6, 3, 1, 2, 3, 4, 3, 4, 5, 7, 2, 3];

echoArrayWithKeys(
    arraySortWithOrder(
        $array, getSortOrder($array)
    )
);
