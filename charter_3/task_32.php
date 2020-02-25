<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function isNegative(int $num): bool
{
    return $num < 0;
}

function replaceElementsInMultidimensional(array &$array, array $first, array $second): array
{
    $value = $array[$first[0]][$first[1]];
    $array[$first[0]][$first[1]] = $array[$second[0]][$second[1]];
    $array[$second[0]][$second[1]] = $value;

    return $array;
}

#################################################################################################################

function prepareFinder(callable $condition): callable
{
    return function (array $row) use ($condition) {
        for ($i = 0; $i < arrayLength($row); $i++) {
            if ($condition($row[$i])) return $i;
        }
        return false;
    };
}

function prepareReplacerMainDiagonal(callable $finder, callable $replacer): callable
{
    return function (array $array) use ($finder, $replacer): array {
        for ($i = 0; $i < arrayLength($array); $i++) {
            $indexInRowOfNegativeElement = $finder($array[$i]);
            $replacer($array, [$i, $indexInRowOfNegativeElement], [$i, $i]);
        }
        return $array;
    };
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
    [3, 7, -6, 8, 11],
    [8, 10, -11, 5, 8],
    [20, -7, 3, 5, 2],
    [1, -2, 3, 6, 10],
    [1, 2, -3, 6, 10],
];

$finder = prepareFinder('isNegative');
$replacer = prepareReplacerMainDiagonal($finder, 'replaceElementsInMultidimensional');

echoMultiDimensionalArrayWithKeys(
    $replacer($array)
);
