<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function pullToTheBeginning(array &$array, int $indexElement): array
{
    for ($i = $indexElement; $i > 0; $i--) {
        $element = $array[$i];
        $array[$i] = $array[$i - 1];
        $array[$i - 1] = $element;
    }
    return $array;
}

function getSumNumsInArray(array $nums): int
{
    $sum = 0;
    $i = 0;
    while (true) {
        if (isset($nums[$i])) {
            $sum += $nums[$i];
        } else {
            break;
        }
        $i++;
    }
    return $sum;
}

#################################################################################################################

function prepareRow(callable $getSum): callable
{
    return function (array $row) use ($getSum): int {
        return $getSum($row);
    };
}

function prepareElementForSorter(): callable
{
    return function ($row) {
        return $row[0];
    };
}

function prepareSorterMultiArrayAsc(callable $prepareElement): callable
{
    return function (array &$array) use ($prepareElement): array {
        for ($i = 0; $i < arrayLength($array); $i++) {
            for ($j = 0; $j < arrayLength($array) - 1; $j++) {
                if ($prepareElement($array[$j]) > $prepareElement($array[$j + 1])) {
                    $num = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $num;
                }
            }
        }
        return $array;
    };
}

function prepareIndexRowWithBiggestSum(callable $prepareRow): callable
{
    return function (array $array) use ($prepareRow): int {
        $sumMax = $prepareRow($array[0]);
        $index = 0;
        for ($i = 0; $i < arrayLength($array); $i++) {
            $sumRow = $prepareRow($array[$i]);
            if ($sumMax < $sumRow) {
                $sumMax = $sumRow;
                $index = $i;
            }
        }
        return $index;
    };
}

function prepareArray(callable $prepareIndexBiggestSum, callable $sorter, callable $doSomeWithElementWithBiggestIndex): callable
{
    return function (array $array) use ($prepareIndexBiggestSum, $sorter, $doSomeWithElementWithBiggestIndex): array {
        $sorter($array);
        $doSomeWithElementWithBiggestIndex($array, $prepareIndexBiggestSum($array));
        return $array;
    };
}

function echoMultiDimensionalArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        for ($j = 0; $j < arrayLength($arr[$i]); $j++) {
            echo ' ' . $arr[$i][$j];
        }
        echo PHP_EOL . '------------------------------------' . PHP_EOL;
    }
}

#################################################################################################################

$array = [
    [3, 7, 6, 8, 11, 1],
    [8, 10, 11, 5, 8, 5],
    [20, 7, 3, 5, 2, 123],
    [6, 2, 3, 6, 10, 12],
];

// Устанавливаем элемент по которому будет проводится сортировка и настраиваем сортировку
$element = prepareElementForSorter();
$sorter = prepareSorterMultiArrayAsc($element);

// В данном случаем мы настраиваем prepareRow чтобы получить сумму всех элементов в строке,
// а затем получаем индекс строки у которой сумма элементов самая большая
$rowSum = prepareRow('getSumNumsInArray');
$indexBiggestSum = prepareIndexRowWithBiggestSum($rowSum);

// Передаем передаем функцию которая находит строку с наибольшей суммой,
// передаем настроенную сортировку,
// и функцию которая делает что то со строкой у которой сумма всех элементов самая большая
$resultArray = prepareArray($indexBiggestSum, $sorter, 'pullToTheBeginning');

echoMultiDimensionalArrayWithKeys(
    $resultArray($array)
);

