<?php

function increaseOrDecrease(int $n): bool
{
    $increase = (int)(($n % 100) / 10) < $n % 10 ? 1 : 0;

    while(true) {
        if ($n == 0) return true;

        $lastNumber = $n % 10;
        $n = (int)($n / 10);
        $beforeLastNumber = $n % 10;

        if ($increase == 1) {
            if ($beforeLastNumber >= $lastNumber && $n != 0) return false;
        } else {
            if ($beforeLastNumber <= $lastNumber && $n != 0)  return false;
        }
    }
}

function getEvenFourDigitsNumber(): void
{
    $i = -10000;
    $j = -1000;

    while ($i < $j) {
        if (increaseOrDecrease($i) && $i % 2 == 0) echo $i . PHP_EOL;
        $i++;

        if ($i == -1000) {
            $i = 1000;
            $j = 10000;
        }
    }
}

getEvenFourDigitsNumber();
