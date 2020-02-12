<?php

function compareNumber(int $n, int $compareValue): bool
{
    while (true) {
        if ($n < 1) return false;
        if ($compareValue == $n % 10) return true;
        $n = (int)($n / 10);
    }
}

function hasSameNumbers(int $n): bool
{
    if ($n < 0) return false;
    while (true) {
        if ($n < 1) return false;
        if (compareNumber((int)($n / 10), $n % 10)) return true;
        $n = (int)($n / 10);
    }
}

function printNumbersWithoutSameDigits()
{
    $i = 1000;
    while ($i < 10000) {
        if (!hasSameNumbers($i)) echo $i . ' ' . -$i . PHP_EOL;
        $i++;
    }
}

printNumbersWithoutSameDigits();