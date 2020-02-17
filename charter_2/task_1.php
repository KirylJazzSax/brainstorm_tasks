<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
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

function countElementsBeforeNegativeNum(array $arr): int
{
    $counter = 0;
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] < 0) return $counter;
        $counter++;
    }
    return $counter;
}

function getIndexAfterFirstNegativeElement(array $arr): int
{
    return countElementsBeforeNegativeNum($arr) + 1;
}

function sumElementsAfterFirstNegativeNum(array $arr): int
{
    $result = [];
    for ($i = getIndexAfterFirstNegativeElement($arr); $i < arrayLength($arr); $i++) {
        $result[] = $arr[$i];
    }
    return getSumNumsInArray($result);
}

function printResult(array $arr): void
{
    echo 'а) число число  элементов,  предшествующих  первому отрицательному элементу '
        . countElementsBeforeNegativeNum($arr) . PHP_EOL;
    echo 'б) сумму нечетных элементов массива, следующих за последним отрицательным элементом '
        . sumElementsAfterFirstNegativeNum($arr) . PHP_EOL;
}

##############################################################################################################

printResult([123, 123, 321, -123, 123, 123]);
