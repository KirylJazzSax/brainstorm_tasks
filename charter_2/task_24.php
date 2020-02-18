<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

/**
 * @param array $arr
 * @param int $element
 * @param null $offset с какого элемента начинать поиск
 * @return bool|int|null
 */
function getIndexOf(array $arr, int $element, $offset = null)
{
    for ($i = $offset ? $offset : 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] === $element) return $i;
    }
    return false;
}

/**
 * @param array $arr
 * @param $element
 * @return bool|int элемент если найден в другом случае false
 */
function find(array $arr, $element)
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] == $element) return $element;
    }
    return false;
}

function arrayFilter(array $arr, callable $func): array
{
    $result = [];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($func($arr[$i])) {
            $result[] = $arr[$i];
        }
    }

    return $result;
}


function arrayPush(array $array, $element): array
{
    $array[] = $element;
    return $array;
}

function arraySplice(array $array, int $index, int $amount = 1): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        if ($i == $index) {
            $i += $amount - 1;
            continue;
        }
        $result = arrayPush($result, $array[$i]);
    }

    return $result;
}

function getSequence(array $arr, $elementInSequence, $offset = null): array
{
    $index = getIndexOf($arr, $elementInSequence, $offset ? $offset : 0);
    $result = [];

    for ($i = $index; $i < arrayLength($arr); $i++) {
        if (isset($arr[$i + 1]) && $arr[$i] === $arr[$i + 1]) {
            $result = arrayPush($result, $arr[$i]);
        } else {
            $result = arrayPush($result, $arr[$i]);
            break;
        }
    }

    return $result;
}

function getIndexesOfBiggestZeroSequence(array $array)
{
    $biggestZeroSequence = [];
    $index = null;

    for ($i = 0; $i < arrayLength($array); $i++) {
        if ($array[$i] == 0) {
            $zeroSequence = getSequence($array, $array[$i], $i);
            if (arrayLength($biggestZeroSequence) < arrayLength($zeroSequence)) {
                $biggestZeroSequence = $zeroSequence;
                $index = $i;
            }
        }
    }
    return [$index, $index + arrayLength($biggestZeroSequence) - 1];
}

function printResult(array $indexes): void
{
    echo 'Индексы самого длинного участка из 0' . PHP_EOL;

    for ($i = 0; $i < arrayLength($indexes); $i++) {
        echo $indexes[$i] . ' ';
    }

    echo PHP_EOL;
}

#################################################################################################################

$array = [12, 0, 0, -14, 25, 18, -19, 25, 0, 0, 0, 0, 20, -15, 0, 0, 0, 0, 0, 0, 15, 0, -20, 0, 0, 0];

printResult(
    getIndexesOfBiggestZeroSequence($array)
);