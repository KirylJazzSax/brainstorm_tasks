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

function getSumDividers(array $dividers): int
{
    $sum = 0;
    $i = 0;
    while (true) {
        if (!empty($dividers[$i])) {
            $sum += $dividers[$i];
        } else {
            break;
        }
        $i++;
    }
    return $sum;
}

function printDividers(int $n): array
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

function getPerfectNums($n, $m): void
{
    while ($n < $m) {
        if (getSumDividers(printDividers($n)) == $n) echo $n . ' ';
        $n++;
    }
    echo PHP_EOL;
}

getPerfectNums(5, 500);
