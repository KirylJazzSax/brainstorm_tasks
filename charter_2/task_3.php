<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

/**
 * @param array $arr
 * @return int|bool false если нет отрицательных элементов
 */
function getIndexOfLastNegativeElement(array $arr)
{
    for ($i = arrayLength($arr) - 1; $i >= 0; $i--) {
        if ($arr[$i] < 0) return $i;
    }
    return false;
}

/**
 * @param array $arr
 * @return int|bool false если нет положительных элементов
 */
function getIndexOfFirstPositiveElement(array $arr)
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] > 0) return $i;
    }
    return false;
}

function replaceElements(array $arr, $firstIndex, $secondIndex): array
{
    $num = $arr[$firstIndex];
    $arr[$firstIndex] = $arr[$secondIndex];
    $arr[$secondIndex] = $num;

    return $arr;
}

function repositionFirstAndLast(array $arr): array
{
    return replaceElements(
        $arr,
        getIndexOfLastNegativeElement($arr),
        getIndexOfFirstPositiveElement($arr)
    );
}

function echoArray(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $arr[$i] . PHP_EOL;
    }
}

#####################################################################################################################

$array = [-21, 1, 2, 3, -32, 3, 5];

echoArray(
    repositionFirstAndLast($array)
);