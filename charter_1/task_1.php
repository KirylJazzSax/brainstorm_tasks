<?php

function countNaturalDigits($n)
{
    if ($n < 0) return 'Введите положительное число';

    if ($n > 5) {
        $n = 5;
    }

    $result = [];

    for ($i = 0; $i < $n; $i++) {
        $result[] = $i;
    }
    return count($result);
}

echo countNaturalDigits(6) . PHP_EOL;