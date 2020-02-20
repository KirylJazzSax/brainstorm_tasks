<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function arraySort(array &$arr): array
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

function getResultArray(array $a, array $b): array
{
    $c = [];
    arraySort($a);
    arraySort($b);

    $biggest = arrayLength($a) > arrayLength($b) ? $a : $b;
    $smallest = arrayLength($a) < arrayLength($b) ? $a : $b;

    for ($i = 0; $i < arrayLength($biggest); $i++) {
        $c[] = $biggest[$i] + ($smallest[$i] ? $smallest[$i] : 0);
    }

    return arraySort($c);
}


function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

###################################################################################################################

$arrayN = [2, 3, 6, 5, 7, 11];
$arrayM = [2, 3, 4, 5, 6];

echoArrayWithKeys(
    getResultArray($arrayN, $arrayM)
);