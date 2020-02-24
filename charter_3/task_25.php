<?php

function isSimple(int $n): bool
{
    if ($n < 0) return false;
    if ($n == 1 || $n == 2) return true;

    if ($n % 1 == 0) {
        $i = 2;
        while ($i < $n) {
            if ($i == $n - 1) return true;
            if ($n % $i == 0) return false;
            $i++;
        }
    }
}

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

###############################################################################################################

function makeCounter(callable $func): callable
{
    return function (array $array) use ($func): int {
        $counter = 0;
        for ($i = 0; $i < arrayLength($array); $i++) {
            if ($func($array[$i])) $counter++;
        }
        return $counter;
    };
}

function prepareSorterMultiArrayAsc(callable $value): callable
{
    return function (array $array) use ($value): array {
        for ($i = 0; $i < arrayLength($array); $i++) {
            for ($j = $i; $j < arrayLength($array) - 1; $j++) {
                if ($value($array[$j]) > $value($array[$j + 1])) {
                    $num = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $num;
                }
            }
        }
        return $array;
    };
}

function sortBySimpleElements(callable $sorter): callable
{
    return function (array $array) use ($sorter) {
        return $sorter($array);
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
    [3, 7, 6, 5, 11, 124],
    [8, 10, 11, 5, 8, 3],
    [20, 7, 3, 5, 2, 2],
    [1, 2, 3, 6, 10, 12],
];

$counter = makeCounter('isSimple');
$sorter = prepareSorterMultiArrayAsc($counter);
$result = sortBySimpleElements($sorter);

echoMultiDimensionalArrayWithKeys(
    $result($array)
);
