<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
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

function replaceElements(array &$arr, int $firstIndex, int $secondIndex): array
{
    $num = $arr[$firstIndex];
    $arr[$firstIndex] = $arr[$secondIndex];
    $arr[$secondIndex] = $num;

    return $arr;
}

function replaceInEachRow(array $array): array
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        replaceElements(
            $array[$i],
            getIndexOfBiggestElementInArray($array[$i]),
            getIndexOfSmallestElementInArray($array[$i])
        );
    }
    return $array;
}

function echoMultiDimensionalArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo '###############################################################################' . PHP_EOL;
        for ($j = 0; $j < arrayLength($arr[$i]); $j++) {
            echo $j . ' => ' . $arr[$i][$j] . PHP_EOL;
        }
    }
}

#################################################################################################################

$array = [
    [4, 8, 18],
    [8, 20, 16],
    [6, 7, 6],
    [1, 61, 5]
];

echoMultiDimensionalArrayWithKeys(
    replaceInEachRow($array)
);
