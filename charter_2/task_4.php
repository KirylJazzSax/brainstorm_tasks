<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function countPairs(array $arr): int
{
    $counter = 0;
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if (isset($arr[$i + 1]) && $arr[$i] == $arr[$i + 1]) {
            $counter++;
            $i++;
        }
    }
    return $counter;
}

##############################################################################################################

$array = [13,13,14,15,16,16];

echo countPairs($array) . PHP_EOL;