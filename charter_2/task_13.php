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

function arrayFilter(array $arr, callable $func): array
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if (!$func($arr[$i])) {
            array_splice($arr, $i, 1);
            $i--;
        }
    }

    return $arr;
}

function getTwoBiggest(array $array): array
{
    $firstBiggest = $array[getIndexOfBiggestElementInArray($array)];

    $array = arrayFilter($array, function ($element) use ($firstBiggest) {
        return $element != $firstBiggest ? true : false;
    });

    $secondBiggest = $array[getIndexOfBiggestElementInArray($array)];

    return [$secondBiggest, $firstBiggest];
}

function getTwoSmallest(array $array): array
{
    $firstSmallest = $array[getIndexOfSmallestElementInArray($array)];

    $array = arrayFilter($array, function ($element) use ($firstSmallest) {
        return $element != $firstSmallest ? true : false;
    });

    $secondSmallest = $array[getIndexOfSmallestElementInArray($array)];

    return [$firstSmallest, $secondSmallest];
}

function printResult(array $array): void
{
    $biggest = getTwoBiggest($array);
    $smallest = getTwoSmallest($array);

    echo 'Два наибольших элемента ';

    for ($i = 0; $i < arrayLength($biggest); $i++) {
        echo $biggest[$i] . ' ';
    }

    echo PHP_EOL . 'Два наименьших ';

    for ($i = 0; $i < arrayLength($smallest); $i++) {
        echo $smallest[$i] . ' ';
    }

    echo PHP_EOL;
}

####################################################################################################################

$array = [-12, 13, -14, -1, 2, 17, -18, 19, 20, -13, -15];

printResult($array);
