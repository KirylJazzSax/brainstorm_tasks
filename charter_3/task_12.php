<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function isNegative(int $num): bool
{
    return $num < 0;
}

/**
 * @param array $array
 * @param callable $condition
 * @return int|bool индекс первого элемента который соответствует условию
 */
function findFirstByCondition(array $array, callable $condition): int
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        if ($condition($array[$i])) return $i;
    }
    return false;
}

function getColumns(array $array): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array[0]); $i++) {
        $column = [];
        for ($j = 0; $j < arrayLength($array); $j++) {
            $column[] = $array[$j][$i];
        }
        $result[] = $column;
    }
    return $result;
}

function getSmallestElementInArray(array $arr): int
{
    $min = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($min > $arr[$i]) $min = $arr[$i];
    }
    return $min;
}

function arrayUnshift(array $array, array $elements): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($elements); $i++) {
        $result[] = $elements[$i];
    }

    for ($i = 0; $i < arrayLength($array); $i++) {
        $result[] = $array[$i];
    }

    return $result;
}

/**
 * @param array $array
 * @param array $elements
 * @param null $index после какого элемента вставить элементы
 * @return array
 */
function insertIntoArray(array $array, array $elements, $index = null): array
{
    if ($index === null) {
        for ($i = 0; $i < arrayLength($elements); $i++) {
            $array[] = $elements[$i];
        }
        return $array;
    }

    $result = [];

    for ($i = 0; $i <= $index; $i++) {
        $result[] = $array[$i];
    }

    for ($i = 0; $i < arrayLength($elements); $i++) {
        $result[] = $elements[$i];
    }

    for ($i = $index + 1; $i < arrayLength($array); $i++) {
        $result[] = $array[$i];
    }

    return $result;
}

function getResultArray(array $array): array
{
    $result = [];
    $columns = getColumns($array);

    for ($i = 0; $i < arrayLength($columns); $i++) {
        $firstNegative = findFirstByCondition($columns[$i], 'isNegative');
        $smallest = [getSmallestElementInArray($columns[$i])];
        if ($firstNegative) {
            $result[] = insertIntoArray($columns[$i], $smallest, $firstNegative);
        } else {
            $result[] = arrayUnshift($columns[$i], $smallest);
        }
    }

    // Тут получаем массив исходный с добавленными элементами
    return getColumns($result);
}

function echoMultiDimensionalArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        for ($j = 0; $j < arrayLength($arr[$i]); $j++) {
            echo ' ' . $arr[$i][$j];
        }
        echo PHP_EOL;
        echo '------------------------------------';
        echo PHP_EOL;
    }
}

#################################################################################################################

$array = [
    [3, 4, 88, 2, 4, -5],
    [-8, -20, 4, 5, 3, 3],
    [-20, -7, 4, 5, 2, -16],
    [1, -61, 4, -5, 6, -5],
];

echoMultiDimensionalArrayWithKeys(
    getResultArray($array)
);
