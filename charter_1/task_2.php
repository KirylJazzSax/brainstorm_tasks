<?php

function getSumDigits($n)
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

function getFourDigitsNumbers($n)
{
    if ($n < 0) return 'Введите положительное число!';

    $n = (int)$n;
    $i = 1000;

    while ($i < 10000) {
        if (getSumDigits($i) === $n) echo $i . PHP_EOL;
        $i++;
    }
}
getFourDigitsNumbers(27);

