<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function countDigits(int $n): int
{
    $counter = 0;
    while (true) {
        if ($n == 0) break;
        $n = (int)($n / 10);
        $counter++;
    }
    return $counter;
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

function getElementsAfterMaxValue(array $array): array
{
    $amount = (arrayLength($array) - 1) - getIndexOfBiggestElementInArray($array);
    return arrayPop($array, $amount);
}

function getElementsWithCertainAmountOfDigits(array $array, int $k): array
{
    return arrayFilter($array, function ($element) use ($k) {
         return countDigits($element) == $k ? true : false;
    });
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}


################################################################################################################

$array = [343, -42, 5333, -632, 832, 73, 2111];
$k = 4;

echoArrayWithKeys(
    getElementsWithCertainAmountOfDigits(
        getElementsAfterMaxValue($array),
        $k
    )
);
