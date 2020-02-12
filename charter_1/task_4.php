<?php

function increaseOrDecrease(int $n)
{
    if ($n < 0) return false;
    $increase = (int)(($n % 100) / 10) < $n % 10 ? 1 : 0;

    while(true) {
        if ($n < 1) return true;

        $lastNumber = $n % 10;
        $n = (int)$n / 10;
        $beforeLastNumber = $n % 10;

        if ($increase == 1) {
            if ($beforeLastNumber >= $lastNumber) return false;
        } else {
            if ($beforeLastNumber <= $lastNumber && $n >= 1) return false;
        }
    }
}

function getEvenFourDigitsNumber()
{
    $i = 1000;

    while ($i < 10000) {
        if (increaseOrDecrease($i) && $i % 2 == 0) echo $i . PHP_EOL;
        $i++;
    }
}

getEvenFourDigitsNumber();
