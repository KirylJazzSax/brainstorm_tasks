<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function countElementsBeforeNegativeNum(array $arr): int
{
    $counter = 0;
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] < 0) return $counter;
        $counter++;
    }
    return $counter;
}

function roundNum(float $num): int
{
    return (($num * 10) % 10) > 4 ? ++$num : (int)$num;
}

function getAverageValueOfArray(array $arr): int
{
    $length = arrayLength($arr);
    $sum = 0;
    for ($i = 0; $i < $length; $i++) {
        $sum += $arr[$i];
    }

    return roundNum($sum / $length);
}

function makeArrayWithAverageValues(array $arr): array
{
    $result = [];
    $copyOfArr = [];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        $copyOfArr[] = $arr[$i];
        $result[$i] = $i < 2 ? $arr[0] : getAverageValueOfArray($copyOfArr);
    }
    return $result;
}

function printResult(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $arr[$i] . PHP_EOL;
    }
}

###################################################################################################################

$array = [15, 13, 14, 20, 20];

printResult(
    makeArrayWithAverageValues($array)
);

