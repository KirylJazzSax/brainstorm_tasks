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

function getSumNumsInArray(array $nums): int
{
    $sum = 0;
    $i = 0;
    while (true) {
        if (!empty($nums[$i])) {
            $sum += $nums[$i];
        } else {
            break;
        }
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

function compareSumNumsDividers($n, $m): bool
{
    $sumFirstNum = getSumNumsInArray(getDividers($n));
    $sumSecondNum = getSumNumsInArray(getDividers($m));
    return $sumFirstNum == $m && $sumSecondNum == $n;
}

function printFriendlyNums($n, $m): void
{
    if ($n < 0 || $m < 0) {
        echo "Число не натуральное\n";
        return;
    }

    while ($n < $m) {
        $j = $n;
        while ($j < $m) {
            if (compareSumNumsDividers($j, $n)) {
                echo "$n и $j дружат\n";
            }
            $j++;
        }
        $n++;
    }
}

printFriendlyNums(200, 300);
