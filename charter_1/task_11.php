<?php

function getSumDigits($n, $sum = 0): int
{
    if ($n == 0) return $sum;
    return getSumDigits($n / 10, ($sum + $n % 10));
}

function isDevOnSumSelf(int $n): bool
{
    return $n % getSumDigits($n) == 0;
}

function printNums(...$nums): void
{
    $i = 0;

    while (true) {
        if (!empty($nums[$i]) && $nums[$i] > 0) {
            echo isDevOnSumSelf($nums[$i]) ? $nums[$i] . PHP_EOL : null;
        } else {
            break;
        }
        $i++;
    }
}

printNums(333,2222,1231,3523,1231,548694867);