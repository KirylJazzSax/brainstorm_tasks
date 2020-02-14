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

function convertArrayToString(array $arr): string
{
    $i = 0;
    $result = null;
    while (true) {
        if (!isset($arr[$i])) return $result;
        $result .= $arr[$i];
        $i++;
    }
}

function replaceNumsWithLetters(int $n): string
{
    switch ($n) {
        case 10:
            return 'A';
        case 11:
            return 'B';
        case 12:
            return 'C';
        case 13:
            return 'D';
        case 14:
            return 'E';
        case 15:
            return 'F';
    }
}


function toBinary(int $n): string
{
    $result = [];
    while (true) {
        if ($n == 1) {
            $result[] = 1;
            break;
        }
        $result[] = $n % 2 == 0 ? 0 : 1;
        $n = (int)($n / 2);
    }
    return convertArrayToString(reverseArray($result));
}

function toHex(int $n): string
{
    $result = [];
    while (true) {
        if ($n == 0) break;
        $result[] = $n % 16 > 9 ? replaceNumsWithLetters($n % 16) : $n % 16;
        $n = (int)($n / 16);
    }

    return convertArrayToString(reverseArray($result));
}

function printNumInBinaryAndHex(int $n)
{
    if (!isNaturalNums($n)) return;

    echo 'В двоичной ' . toBinary($n) . ' В шестнадцатиричной ' . toHex($n) . PHP_EOL;
}


##################################################################################

printNumInBinaryAndHex(23452736);