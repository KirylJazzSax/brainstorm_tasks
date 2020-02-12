<?php

function isIncreasing($n)
{
    if ($n < 0) return false;
    $n = (int)$n;

    while(true) {
        if ($n < 1) return true;

        $lastNumber = $n % 10;
        $n = (int)$n / 10;
        $beforeLastNumber = $n % 10;

        if ($beforeLastNumber >= $lastNumber) return false;
    }
}

echo isIncreasing(123458)
    ? 'Числа идут по возрастанию' . PHP_EOL
    : 'Числа не идут по возрастанию или число отрицательное' . PHP_EOL;