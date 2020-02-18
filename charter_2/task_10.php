<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function arrayMap(array $arr, callable $func): array
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) break;
        $arr[$i] = $func($arr[$i]);
        $i++;
    }
    return $arr;
}

function isEven(int $num): bool
{
    return $num % 2 == 0 ? true : false;
}

function isOdd(int $num): bool
{
    return $num % 2 != 0 ? true : false;
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

function replaceIt(array $arr): array
{
    $biggestIndex = getIndexOfBiggestElementInArray($arr);
    $smallestIndex = getIndexOfSmallestElementInArray($arr);

    return arrayMap($arr, function ($element) use ($arr, $smallestIndex, $biggestIndex) {
        return isOdd($element) ? $arr[$smallestIndex] : $arr[$biggestIndex];
    });
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

#####################################################################################################################

$array = [12, 13, 14, 15, 21, 17, 18, 19];

echoArrayWithKeys(
    replaceIt($array)
);