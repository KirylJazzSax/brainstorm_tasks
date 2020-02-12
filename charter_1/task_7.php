<?php

function compareNumber(int $n, int $compareValue): bool
{
    while (true) {
        if ($n < 1) return false;
        echo $compareValue . ' ' . ($n % 10) . ' ' . PHP_EOL;
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

echo hasSameNumbers(134556789) ? "Есть\n" : "Нет\n";