<?php

/**
 * @param int $n
 * @return int|string
 */
function countNaturalDigits(int $n)
{
    if ($n < 0) return 'Введите положительное число!';

    $counter = 0;

    while (true) {
        if ($n === 0) return $counter;
        $number = $n % 10;
        if ($number < 5) {
            $counter++;
        }
        $n = (int)($n / 10);
    }

    return $counter;
}

echo countNaturalDigits(125605594) . PHP_EOL;