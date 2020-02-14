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
    if ($n < 0) return false;
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

function generateSimpleNums(): array
{
    $i = 2;
    $counter = 0;
    $nums = [];
    while ($counter < 10) {
        if (isSimple($i)) {
            $nums[] = $i;
            $counter++;
        }
        $i++;
    }
    return $nums;
}

function getMultipliers(int $n): array
{
    if (isSimple($n)) return [$n];


    $multipliers = null;
    $i = 0;
    while (true) {
        if (isSimple($n)) {
            $multipliers[] = $n;
            break;
        }
        if ($n % generateSimpleNums()[$i] == 0) {
            $multipliers[] = generateSimpleNums()[$i];
            $n = $n / generateSimpleNums()[$i];
        } else {
            $i++;
        }
    }
    return $multipliers;
}

function printArrayValues(array $arr): void
{
    $i = 0;
    while (true) {
        if (empty($arr[$i])) break;
        echo $arr[$i] . PHP_EOL;
        $i++;
    }
}

function printMultipliers(int $n): void
{
    if (!isNaturalNums($n)) return;
    printArrayValues(getMultipliers($n));
}

##################################################

printMultipliers(390);