<?php

function countNaturalDigits($n)
{
    if ($n < 0) return 'Введите положительное число';

    if ($n > 5 || $n === 5) {
        return 5;
    }

    return $n + 1;
}

echo countNaturalDigits(5) . PHP_EOL;