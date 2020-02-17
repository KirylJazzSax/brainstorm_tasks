<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function getBiggestElementInArray(array $arr): int
{
    $max = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($max < $arr[$i]) $max = $arr[$i];
    }
    return $max;
}

function getSmallestElementInArray(array $arr): int
{
    $min = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($min > $arr[$i]) $min = $arr[$i];
    }
    return $min;
}

/**
 * @param array $arr
 * @param int $element
 * @return int|bool index елемента если не нашёл то false
 */
function findInArray(array $arr, int $element)
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] == $element) return $i;
    }
    return false;
}

function replaceBiggestAndSmallest(array $arr): array
{
    $indexSmallest = findInArray(
        $arr, getSmallestElementInArray($arr)
    );
    $indexBiggest = findInArray(
        $arr, getBiggestElementInArray($arr)
    );

    // Переставляем
    $num = $arr[$indexSmallest];
    $arr[$indexSmallest] = $arr[$indexBiggest];
    $arr[$indexBiggest] = $num;

    return $arr;
}

function echoArray(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $arr[$i] . PHP_EOL;
    }
}

#######################################################################################################################

$array = [5,7,6,4,6,2,3];

echoArray(
    replaceBiggestAndSmallest($array)
);
