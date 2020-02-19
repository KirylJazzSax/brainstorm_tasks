<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function arrayPush(array $array, $element): array
{
    $array[] = $element;
    return $array;
}


function arraySplice(array $array, int $index, int $amount = 1): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        if ($i == $index) {
            $i += $amount - 1;
            continue;
        }
        $result = arrayPush($result, $array[$i]);
    }

    return $result;
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

function removeElementsAfterMaxValue(array $array): array
{
    $amount = arrayLength($array) - getIndexOfBiggestElementInArray($array);
    return arraySplice($array, getIndexOfBiggestElementInArray($array) + 1, $amount);
}

function getIndexFirstSmallestElement(array $array): int
{
    return getIndexOfSmallestElementInArray(
        removeElementsAfterMaxValue($array)
    );
}

function getAmountOfElementsToDelete(array $array): int
{
    return (getIndexOfBiggestElementInArray($array) - getIndexFirstSmallestElement($array)) - 1;
}

function removeElementsFromArray(array $array): array
{
    $indexFromDelete = getIndexFirstSmallestElement($array) + 1;

    return arraySplice(
        $array,
        $indexFromDelete,
        getAmountOfElementsToDelete($array)
    );
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

##############################################################################################################

$array = [-30, -42, 632, 832, 6000, 5333, 2];

echoArrayWithKeys(
    removeElementsFromArray($array)
);
