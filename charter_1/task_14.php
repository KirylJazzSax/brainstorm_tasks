<?php

function isSimple(int $n): bool
{
    if ($n < 0) return false;
    if ($n == 1 || $n == 2) return true;

    if ($n % 1 == 0) {
        $i = 2;
        while ($i < $n) {
            if ($i == $n - 1) return true;
            if ($n % $i == 0) return false;
            $i++;
        }
    }
}

function printCoupleNumsSimple(): void
{
    $num = 2;
    $counter = 0;
    while ($counter < 10) {
        if (isSimple($num) && isSimple($num + 2)) {
            echo $num . ' ' . ($num + 2) . PHP_EOL;
            $counter++;
        }
        $num++;
    }
}

printCoupleNumsSimple();