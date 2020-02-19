<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}


function arraySortWithOrder(array $array, array $order): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($order); $i++) {
        for ($j = 0; $j < arrayLength($array); $j++) {
            if ($array[$j] === $order[$i]) {
                $result[] = $array[$j];
            }
        }
    }
    return $result;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

##################################################################################################

$array = [2, 0, 0, 1, 1, 2, 0, 0, 1, 2, 2, 3,4,5,6];

$sortOrder = [0, 2, 1];

echoArrayWithKeys(
    arraySortWithOrder($array, $sortOrder)
);
