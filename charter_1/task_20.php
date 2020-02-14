<?php

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

function getSumNumsInArray(array $nums): int
{
    $sum = 0;
    $i = 0;
    while (true) {
        if (empty($nums[$i])) break;
            $sum += $nums[$i];
        $i++;
    }
    return $sum;
}

function getBiggestSumOfDividers(int $n, int $m): int
{
    $sumDividers = 0;
    $num = 0;
    while ($n < $m) {
        if ($sumDividers < getSumNumsInArray(getDividers($n))) {
            $sumDividers = getSumNumsInArray(getDividers($n));
            $num = $n;
        }
        $n++;
    }
    return $num;
}

echo getBiggestSumOfDividers(391, 394) . PHP_EOL;
