<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function repositionFirstAndLast(array $arr): array
{
    $length = arrayLength($arr);

    $num = $arr[0];
    $arr[0] = $arr[$length - 1];
    $arr[$length - 1] = $num;

    return $arr;
}

function echoArray(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $arr[$i] . PHP_EOL;
    }
}

#####################################################################################################################

$array = [21, 1, 2, -3];

echoArray(
    repositionFirstAndLast($array)
);