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
 * @param int $element
 * @param null $offset с какого элемента начинать поиск
 * @return bool|int|null
 */
function getIndexOf(array $arr, int $element, $offset = null)
{
    for ($i = $offset ? $offset : 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] === $element) return $i;
    }
    return false;
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


function arrayPush(array $array, $element): array
{
    $array[] = $element;
    return $array;
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

function arrayPop(array $array, int $amount = null)
{
    if (!$amount) return $array[arrayLength($array) - 1];

    $length = arrayLength($array) - 1;
    $index = $length - $amount;
    $result = [];
    for ($i = $length; $i > $index; $i--) {
        $result[] = $array[$i];
    }
    return array_reverse($result);
}

function getIndexOfSmallestElementInArray(array $arr): int
{
    $min = $arr[0];
    $index = 0;
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($min > $arr[$i]) {
            $min = $arr[$i];
            $index = $i;
        }
    }
    return $index;
}

function getIndexOfBiggestElementInArray(array $arr): int
{
    $max = $arr[0];
    $index = 0;
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($max < $arr[$i]) {
            $max = $arr[$i];
            $index = $i;
        }
    }
    return $index;
}

function getSmallestElements(array $array, int $k): array
{
    $result = [];

    for ($i = 0; $i < $k; $i++) {
        $indexSmallest = getIndexOfSmallestElementInArray($array);
        $result[] = $array[$indexSmallest];
        $array = arraySplice($array, $indexSmallest);
    }

    return $result;
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

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

###################################################################################################################

$array = [3,4,5,6,8,7,2];

$k = 4;

echoArrayWithKeys(
    insertIntoArray(
        $array,
        getSmallestElements($array, $k),
        getIndexOfBiggestElementInArray($array)
    )
);

