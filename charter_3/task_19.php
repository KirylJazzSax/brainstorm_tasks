<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function replaceElementsInMultidimensional(array $array, array $first, array $second): array
{
    $value = $array[$first[0]][$first[1]];
    $array[$first[0]][$first[1]] = $array[$second[0]][$second[1]];
    $array[$second[0]][$second[1]] = $value;

    return $array;
}

function replaceSymmetricSquares(array $array): array
{
    $lengthSubArray = arrayLength($array) / 2;

    for ($i = 0; $i < arrayLength($array); $i++) {
        for ($j = 0; $j < $lengthSubArray; $j++) {
            $forReplace = $i >= $lengthSubArray
                ? [$i - $lengthSubArray, $j + $lengthSubArray]
                : [$i + $lengthSubArray, $j + $lengthSubArray];
            $array = replaceElementsInMultidimensional($array, [$i, $j], $forReplace);
        }
    }
    return $array;
}

function echoMultiDimensionalArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        for ($j = 0; $j < arrayLength($arr[$i]); $j++) {
            echo ' ' . $arr[$i][$j];
        }
        echo PHP_EOL . '------------------------------------' . PHP_EOL;
    }
}

#################################################################################################################

$array = [
    [3, 4, 88, 2],
    [-8, -20, 3, 5],
    [-20, -7, 4, 5],
    [1, -61, 4, -5],
];

echoMultiDimensionalArrayWithKeys(
    replaceSymmetricSquares($array)
);
