<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function arrayFilter(array $arr, callable $func): array
{
    $result = [];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($func($arr[$i])) {
            $result[] = $arr[$i];
        }
    }

    return $result;
}

function arraySort(array $arr): array
{
    $i = 0;
    $length = arrayLength($arr);
    while ($i < $length) {
        if (!isset($arr[$i + 1])) break;
        $j = 0;
        while ($j < $length - 1) {
            if ($arr[$j] > $arr[$j + 1]) {
                $num = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $num;
            }
            $j++;
        }
        $i++;
    }
    return $arr;
}


function moveZeroToBegin(array $array):array
{
    for ($i = 0; $i < arrayLength($array); $i++) {

        if ($array[$i] === 0) {
            $k = $i;
            while (isset($array[$k - 1])) {
                $num = $array[$k];
                $array[$k] = $array[$k - 1];
                $array[$k - 1] = $num;
                $k--;
            }
        }
    }
    return $array;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

###########################################################################################################

$array = [2, 3, 6, 0, -5, -8, 0, -7, 0, -4, 8, 9, 5, 3];

echoArrayWithKeys(
    moveZeroToBegin(
        arraySort($array)
    )
);
