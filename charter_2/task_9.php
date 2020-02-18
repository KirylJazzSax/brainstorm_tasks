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

function isOdd(int $num): bool
{
    return $num % 2 != 0 ? true : false;
}

function getFirstIndexElementInArray(array $arr): int
{
    $length = arrayLength($arr);
    while (true) {
        if (!isset($arr[$length - 1])) return $length;
    }
}

function arrayFilter(array $arr, callable $func): array
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if (!$func($arr[$i])) array_splice($arr, $i, 1);
    }

    return $arr;
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

#################################################################################################################

$array = [12, 13, 14, 15, 16, 17, 18, 19];

$smallestOddNum = getSmallestElementInArray(
    arrayFilter($array, 'isOdd')
);

$biggestEvenNum = getBiggestElementInArray(
    arrayFilter($array, 'isEven')
);

echo "Максимальное среди четных $biggestEvenNum минимальное среди нечетных $smallestOddNum\n";
