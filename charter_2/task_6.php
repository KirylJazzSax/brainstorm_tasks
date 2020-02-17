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
    return $num % 2 == 0;
}

function getSmallestElementInArray(array $arr): int
{
    $min = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($min > $arr[$i]) $min = $arr[$i];
    }
    return $min;
}

function replaceWithIndex($arr): array
{
    $smallestValue = getSmallestElementInArray($arr);

    for ($i = 0; $i < arrayLength($arr); $i++) {
        if (isEven($arr[$i]) && $arr[$i] != $smallestValue) $arr[$i] = $i;
    }

    return $arr;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

#####################################################################################################################

$array = [12, 13, 15, 16, 17, 18];

echoArrayWithKeys(
    replaceWithIndex($array)
);
