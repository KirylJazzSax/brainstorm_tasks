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

function isMutuallySimple(int $n, int $m): bool
{
    if ($n < 0 || $m < 0) return false;

    $i = 0;
    while (true) {
        if (getDividers($n)[$i] == 1) return true;
        if (compareDividers(getDividers($n)[$i], getDividers($m)) && getDividers($n)[$i] > 1) return false;
        $i++;
    }
}

echo isMutuallySimple(15, 49) ? "Взаимно простые\n" : "Не взаимно простые\n";
