<?php

function revertNumber(int $n): int
{
    if ($n < 0) return false;

    $m = null;

    while (true) {
        if ($n < 1) return (int)$m;
        $m .= $n % 10;
        $n = (int)($n / 10);
    }
}

function isIncreasing(int $n): bool
{
    while(true) {
        if ($n == 0) return true;

        $lastNumber = $n % 10;
        $n = (int)($n / 10);
        $beforeLastNumber = $n % 10;

        if ($beforeLastNumber >= $lastNumber) return false;
    }
}

function increaseItArray(int $n): array
{
    if (isIncreasing($n)) return convertDigitsToArray($n);

    $result = reverseArray(convertDigitsToArray($n));
    $counter = getAmountValuesInArray($result);
    $i = 0;
    while($i < $counter) {
        if (!isset($result[$i + 1])) break;
        $j = 0;
        while ($j < $counter - 1) {
            if ($result[$j] > $result[$j + 1]) {
                $num = $result[$j];
                $result[$j] = $result[$j + 1];
                $result[$j + 1] = $num;
            }
            $j++;
        }
        $i++;
    }

    return $result;
}



function isNaturalNums(...$nums): bool
{
    $i = 0;
    while (true) {
        if (empty($nums[$i])) return true;
        if ($nums[$i] < 0) return false;
        $i++;
    }
}

function getAmountValuesInArray(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function reverseArray(array $arr): array
{
    $i = getAmountValuesInArray($arr);
    $result = [];
    while ($i > 0) {
        $result[] = $arr[$i - 1];
        $i--;
    }
    return $result;
}


function convertDigitsToArray(int $n): array
{
    $result = [];
    while (true) {
        if ($n < 1) return reverseArray($result);
        $result[] = $n % 10;
        $n = (int)($n / 10);
    }
}

function convertArrayToDigits(array $arr)
{
    $i = 0;
    $result = null;
    while (true) {
        if (!isset($arr[$i])) return (int)$result;
        $result .= $arr[$i];
        $i++;
    }
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

#######################################################################################################

/**
 * Выбираем цифру из массива и суммируем её с каждой цифрой из массива поочередно
 * @param array $arr
 * @param int $sum
 * @return bool true если сумма выбранной цифры и какой либо цифры из массива равна $sum
 */
function sumOneDigitWithEachOne(array $arr, int $sum): bool
{
    $length = getAmountValuesInArray($arr);
    $i = 0;
    while ($i <= $length) {
        if ($i == $length) return false;
        $numForSum = $arr[$i];
        $j = 0;
        while($j < $length) {
            if ($j != $i) {
                if (($numForSum + $arr[$j]) == $sum) return true;
            }
            $j++;
        }
        $i++;
    }
}

function isEqualToSum(int $num, int $sum): bool
{
    $digitsArray = increaseItArray($num);
    if (getSumNumsInArray($digitsArray) == $sum) return true;
    $i = 0;
    $digitsArrayLength = getAmountValuesInArray($digitsArray);

    if (sumOneDigitWithEachOne($digitsArray, $sum)) return true;

    // Если метод sumOneDigitWithEachOne вернул false то мы поочередно складываем все цифры
    // и сразу проверяем равно ли сложение $sum
    while ($i <= $digitsArrayLength) {
        if ($i == $digitsArrayLength) return false;
        $a = $digitsArray;
        $a[$i] = 0;
        if (getSumNumsInArray($a) == $sum) return true;
        $j = $i;
        while ($j < $digitsArrayLength) {
            $a[$j] = 0;
            if (getSumNumsInArray($a) == $sum) return true;
            $j++;
        }
        $i++;
    }
}

###############################################################################################





$k = 4;

$canDigitsBeSumOfK = function (...$nums) use ($k): void
{
    if (!isNaturalNums($nums)) return;
    $i = 0;
    while (true) {
        if (!isset($nums[$i])) break;
        echo isEqualToSum($nums[$i], $k)
            ? "Если убрать некоторые цифры в $nums[$i] то сумма цифр будет равна $k\n"
            : "Если убрать некоторые цифры в $nums[$i] то сумма цифр не будет равна $k\n";
        $i++;
    }
};

$canDigitsBeSumOfK(5640054, 123, 5968589);

