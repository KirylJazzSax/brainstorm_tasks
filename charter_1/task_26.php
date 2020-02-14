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

function getSumNumsInArray(array $nums): int
{
    $sum = 0;
    $i = 0;
    while (true) {
        if (!isset($nums[$i])) break;
        $sum += $nums[$i];
        $i++;
    }
    return $sum;
}

function getDividers(int $n): array
{
    if (isSimple($n)) {
        return [$n, 1];
    }

    $dividers = null;
    $i = $n - 1;

    while (true) {
        if ($i == 1) {
            $dividers[] = 1;
            break;
        }
        if ($n % $i == 0) {
            $dividers[] = $i;
        }
        $i--;
    }

    return $dividers;
}

function getMaxSumDividers(...$dividers): int
{
    if (!isNaturalNums($dividers)) return 0;

    $i = 0;
    $max = 0;
    while (true) {
        if (!isset($dividers[$i])) return $max;
        if ($max < getSumNumsInArray(getDividers($dividers[$i]))) $max = getSumNumsInArray(getDividers($dividers[$i]));
        $i++;
    }
}

######################################################################################################################

echo getMaxSumDividers(390,590,490,690) . PHP_EOL;
