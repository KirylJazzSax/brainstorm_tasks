<?php

function isNaturalNums(...$nums): bool
{
    $i = 0;
    while (true) {
        if (empty($nums[$i])) return true;
        if ($nums[$i] < 0) return false;
        $i++;
    }
}

function getFactorial(int $n)
{
    return $n == 1 || $n == 0 ? 1 : $n * getFactorial($n - 1);
}


function getSumNumsInArray(array $nums): int
{
    $sum = 0;
    $i = 0;
    while (true) {
        if (!isset($nums[$i])) break;
        $sum += $nums[$i];
        $i++;
    }
    return $sum;
}

function doSomeWithEveryDigit(int $num, callable $func): array
{
    $result = [];
    while (true) {
        if ($num == 0) break;
        $result[] = $func($num % 10);
        $num = (int)($num / 10);
    }
    return $result;
}

function arrayMap(array $arr, callable $func): array
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) break;
        $arr[$i] = $func($arr[$i]);
        $i++;
    }
    return $arr;
}


###########################################################################################


function isEqualFactorialsAndNum(int $n)
{
    return $n == getSumNumsInArray(doSomeWithEveryDigit($n, 'getFactorial'));
}

function checkIsFactorion(int $num): int
{
    return isEqualFactorialsAndNum($num) ? $num : 0;
}

function countFactorions(array $factorions): int
{
    $i = 0;
    $counter = 0;
    while (true) {
        if (!isset($factorions[$i])) break;
        if ($factorions[$i] != 0) $counter++;
        $i++;
    }
    return $counter;
}

function getFactorions(array $nums): array
{
    return arrayMap($nums, 'checkIsFactorion');
}

function printResult(...$nums): void
{
    if (!isNaturalNums($nums)) {
        echo 'не все числа натуральные' . PHP_EOL;
        return;
    }

    echo 'Сумма факторионов '
        . getSumNumsInArray(getFactorions($nums))
        . ' колличество '
        . countFactorions(getFactorions($nums)) . PHP_EOL;
}

########################################################################################################

printResult(1, 2, 3, 145, 555);
