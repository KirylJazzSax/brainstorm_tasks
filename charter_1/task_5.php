<?php

function revertNumber(int $n): int
{
    if ($n < 0) return false;

    $m = null;

    while (true) {
        if ($n < 1) return (int)$m;
        $m .= $n % 10;
        $n = (int)($n / 10);
    }
}

echo revertNumber(123456789) . PHP_EOL;