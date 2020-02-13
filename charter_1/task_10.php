<?php

/**
 * @param int|null $n
 * @return bool|int
 */
function revertNumber(int $n = null)
{
    if ($n < 0 || $n == null) return false;

    $m = null;

    while (true) {
        if ($n < 1) return (int)$m;
        $m .= $n % 10;
        $n = (int)($n / 10);
    }
}


function countDigits(int $n): int
{
    $counter = 0;
    while (true) {
        if ($n == 0) break;
        $n = (int)($n / 10);
        $counter++;
    }
    return $counter;
}

/**
 * @param int $n
 * @return bool|int
 */
function getLastDigits(int $n)
{
    if (countDigits($n) % 2 != 0 || countDigits($n) == 2) {
        $countPart = (int)(countDigits($n) / 2);
        $i = 0;
        $lastDigits = null;

        while ($i < $countPart) {
            $lastDigits = $lastDigits ? (int)(($n % 10) . $lastDigits) : $n % 10;
            $n = (int)$n / 10;
            $i++;
        }
        return $lastDigits;
    } else {
        return false;
    }
}

function getFirstDigits(int $n): int
{
    return revertNumber(getLastDigits(revertNumber($n)));
}

function isPalindrome(int $n): bool
{
    return revertNumber(getLastDigits($n)) === getFirstDigits($n);
}

function printPalindromes(): void
{
    $i = 11;
    while ($i < 100) {
        if (isPalindrome($i) && isPalindrome($i * $i)) echo $i . PHP_EOL;
        $i++;
    }
}

printPalindromes();
