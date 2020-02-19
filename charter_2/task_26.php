<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function isEven(int $num): bool
{
    return $num % 2 == 0 ? true : false;
}

function isNegative(int $num): bool
{
    return $num < 0 ? true : false;
}

function getBiggestElementInArray(array $arr): int
{
    $max = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($max < $arr[$i]) $max = $arr[$i];
    }
    return $max;
}

function insertAfterEachElement(array $array, int $element, callable $func): array
{
    $result = [];
    for ($i = 0; $i < arrayLength($array); $i++) {
        $result[] = $array[$i];
        if ($func($array[$i])) $result[] = $element;
    }
    return $result;
}

function conditionForInsert(int $element): bool
{
    return isNegative($element) && isEven($element) ? true : false;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

###################################################################################################################

$array = [3, -4, 5, -6, 8, 7, 2];

echoArrayWithKeys(
    insertAfterEachElement(
        $array,
        getBiggestElementInArray($array),
        'conditionForInsert'
    )
);