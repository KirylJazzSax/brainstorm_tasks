<?php

function isNaturalNums(...$nums): bool
{
    $i = 0;
    while (true) {
        if (empty($nums[$i])) return true;
        if ($nums[$i] < 0) return false;
        $i++;
    }
}


function revertNumber(int $n): int
{
    if ($n < 0) return false;

    $m = null;

    while (true) {
        if ($n < 1) return (int)$m;
        $m .= $n % 10;
        $n = (int)($n / 10);
    }
}

function isDecreasing(int $n): bool
{
    while(true) {
        if ($n == 0) return true;

        $lastNumber = $n % 10;
        $n = (int)($n / 10);
        $beforeLastNumber = $n % 10;
        if ($beforeLastNumber <= $lastNumber && $n != 0) return false;
    }
}

function getAmountValuesInArray(array $arr): int
{
    $i = 0;
    while (true) {
        if (empty($arr[$i])) return $i;
        $i++;
    }
}

function reverseArray(array $arr): array
{
    $i = getAmountValuesInArray($arr);
    $result = [];
    while ($i > 0) {
        $result[] = $arr[$i - 1];
        $i--;
    }
    return $result;
}

function convertDigitsToArray(int $n): array
{
    $result = [];
    while (true) {
        if ($n < 1) return $result;
        $result[] = $n % 10;
        $n = (int)($n / 10);
    }
}

function convertArrayToDigits(array $arr): int
{
    $i = 0;
    $result = null;
    while (true) {
        if (empty($arr[$i])) return (int)$result;
        $result .= $arr[$i];
        $i++;
    }
}

function makeItBig(int $n): int
{
    if (isDecreasing($n)) return $n;

    $result = reverseArray(convertDigitsToArray($n));
    $counter = getAmountValuesInArray($result);
    $i = 0;
    while($i < $counter) {
        if (empty($result[$i + 1])) break;
        $j = 0;
        while ($j < $counter - 1) {
            if ($result[$j] < $result[$j + 1]) {
                $num = $result[$j];
                $result[$j] = $result[$j + 1];
                $result[$j + 1] = $num;
            }
            $j++;
        }
        $i++;
    }
    return convertArrayToDigits($result);
}

function printTransformedNums(...$nums): void
{
    if (!isNaturalNums($nums)) return;

    $i = 0;
    while (true) {
        if (!isset($nums[$i])) break;
        echo makeItBig($nums[$i]) . PHP_EOL;
        $i++;
    }
}

################################################################################################################

printTransformedNums(637, 6372, 43534, 2342, 4352);
