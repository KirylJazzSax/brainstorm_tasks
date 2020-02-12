<?php

function getSumDigits($n): int
{
    $sum = 0;

    while (true) {
        if ($n === 0) break;
        $lastDigit = $n % 10;
        $sum += $lastDigit;
        $n = (int)$n / 10;
    }

    return $sum;
}

function getFourDigitsNumbers(int $n): void
{
    if ($n > 0) {
        $i = 1000;
        $j = 10000;
    } else {
        $i = -10000;
        $j = -1000;
    }

    while ($i < $j) {
        if (getSumDigits($i) === $n) echo $i . PHP_EOL;
        $i++;
    }
}

getFourDigitsNumbers(33);
