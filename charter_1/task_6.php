<?php

function isEqual(int $n): bool
{
    return $n == 0 || $n == 2 || $n == 3 || $n == 7 ? true : false;
}

/**
 * @param int $n
 * @return bool|int
 */
function revertNumber(int $n)
{
    if ($n < 0) return false;

    $m = null;

    while (true) {
        if ($n < 1) return (int)$m;
        $m .= $n % 10;
        $n = (int)($n / 10);
    }
}

function isNumberContains($n): int
{
    $result = null;
    while (true) {
        if ($n < 1) return revertNumber((int)$result);
        $number = $n % 10;
        !isEqual($number) ?: $result .= $number;
        $n = (int)($n / 10);
    }
}

function printNumbers(): void
{
    $i = 1000;
    while ($i < 10000) {
        $number = isNumberContains($i);
        if ($number < 1000) {
            $i++;
            continue;
        } else {
            echo $number . PHP_EOL;
        }
        $i++;
    }
}

printNumbers();
