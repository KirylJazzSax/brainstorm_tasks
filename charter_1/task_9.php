<?php

function isAutomorphic(int $n): bool
{
    $number = $n;
    $lastDigit = null;

    while (true) {
        if ($n == 0) return false;
        $lastDigit = $lastDigit ? (int)(($n % 10) . $lastDigit) : $n % 10;
        if ((int)($number / $lastDigit) == $lastDigit) return true;
        $n = (int)($n / 10);
    }
}

echo isAutomorphic(87909376) ? "Автоморфное\n" : "Не автоморфное\n";