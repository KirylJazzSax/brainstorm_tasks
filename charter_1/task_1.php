<?php

function countNaturalDigits($n)
{
    if ($n < 0) return 'Введите положительное число!';
    $n = (int)$n;

    $flag = true;
    $counter = 0;

    while ($flag) {
        $number = $n % 10;
        if ($n === 0) return $counter;
        if ($number < 5) {
            $counter++;
        }
        $n = (int)($n / 10);
    }

    return $counter;
}

echo countNaturalDigits(125601295) . PHP_EOL;