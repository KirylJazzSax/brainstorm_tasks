<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function getElementsIndexWithBiggestSum(array $arr): int
{
    $index = 0;
    $maxSum = isset($arr[1]) ? $arr[0] + $arr[1] : $arr[0];

    for ($i = 0; $i < arrayLength($arr); $i++) {
        if (isset($arr[$i + 1]) && $maxSum < ($arr[$i] + $arr[$i + 1])) {
            $maxSum = $arr[$i] + $arr[$i + 1];
            $index = $i;
        }
    }
    return $index;
}

function getElementsIndexWithSmallestSum(array $arr): int
{
    $index = 1;
    $minSum = isset($arr[1]) ? $arr[0] + $arr[1] : $arr[0];

    for ($i = 0; $i < arrayLength($arr); $i++) {
        if (isset($arr[$i + 1]) && $minSum > ($arr[$i] + $arr[$i + 1])) {
            $minSum = $arr[$i] + $arr[$i + 1];
            $index = $i + 1;
        }
    }
    return $index;
}

####################################################################################################################

$array = [14, 15, 13, 12, 11, 22, 25, 1, 5, 1, 2];

echo 'Номер  элемента,  сумма  которого  со  следующим за ним элементом максимальна '
    . getElementsIndexWithBiggestSum($array) . PHP_EOL
    . 'Номер элемента, сумма которого с предыдущим элементом минимальна '
    . getElementsIndexWithSmallestSum($array) . PHP_EOL;
