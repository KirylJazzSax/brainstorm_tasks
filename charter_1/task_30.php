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

function isSimple(int $n): bool
{
    if ($n <= 0) return false;
    if ($n == 1 || $n == 2) return true;

    if ($n % 1 == 0) {
        $i = 2;
        while ($i < $n) {
            if ($i == $n - 1) return true;
            if ($n % $i == 0) return false;
            $i++;
        }
    }
}

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
    $i = 0;
    $length = arrayLength($arr);

    while ($i < $length) {
        $arr[$i] = $func($arr[$i]) ? $arr[$i] : 0;
        $i++;
    }
    return $arr;
}

function isIncreasing(int $n): bool
{
    while (true) {
        if ($n == 0) return true;

        $lastNumber = $n % 10;
        $n = (int)($n / 10);
        $beforeLastNumber = $n % 10;

        if ($beforeLastNumber >= $lastNumber) return false;
    }
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

function printNumsTwins(...$nums): void
{
    if (!isNaturalNums($nums)) return;
    $i = 0;
    $simpleNumsArray = arraySort(arrayFilter($nums, 'isSimple'));
    $length = arrayLength($simpleNumsArray);
    while ($i < $length) {
        if (!isset($nums[$i + 1])) break;
        if (($simpleNumsArray[$i + 1] - $simpleNumsArray[$i]) == 2)
            echo $simpleNumsArray[$i + 1] . ' ' . $simpleNumsArray[$i] . PHP_EOL;
        $i++;
    }
}

#############################################################################################

printNumsTwins(5, 6, 13, 234, 478, 126371, 11, 234, 123, 7);
