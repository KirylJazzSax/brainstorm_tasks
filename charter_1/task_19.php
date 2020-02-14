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

function getDividers(int $n): array
{
    if (isSimple($n)) {
        return [$n];
    }

    $dividers = null;
    $i = 0;
    while (true) {
        if (isSimple($n)) {
            $dividers[] = $n;
            break;
        }
        if ($n % generateSimpleNums()[$i] == 0) {
            $dividers[] = generateSimpleNums()[$i];
            $n = $n / generateSimpleNums()[$i];
        } else {
            $i++;
        }
    }
    return $dividers;
}

function multiplyValuesInArray(array $arr)
{
    $i = 0;
    $result = 1;
    while (true) {
        if (empty($arr[$i])) break;
        $result *= $arr[$i];
        $i++;
    }
    return $result;
}

function compareDividers($dividerToCompare, $compareDividers): bool
{
    $i = 0;
    while (true) {
        if (!empty($compareDividers[$i])) {
            if ($compareDividers[$i] == $dividerToCompare) return true;
            $i++;
        } else {
            break;
        }
    }
    return false;
}

function getNOK(int $n, int $m): int
{
    if ($n < 0 || $m < 0) return 0;

    $result = multiplyValuesInArray(getDividers($m));
    $i = 0;
    while (true) {
        if (empty(getDividers($n)[$i])) break;
        if (!compareDividers(getDividers($n)[$i], getDividers($m))) {
            $result *= getDividers($n)[$i];
        }
        $i++;
    }
    return $result;
}

echo getNOK(333, 567) . PHP_EOL;

