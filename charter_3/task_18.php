<?php

function isOdd(int $num): bool
{
    return $num % 2 != 0;
}

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function arraySplice(array $array, int $index, int $amount = 1): array
{
    $result = [];

    for ($i = 0; $i < arrayLength($array); $i++) {
        if ($i == $index) {
            $i += $amount - 1;
            continue;
        }
        $result[] = $array[$i];
    }

    return $result;
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

function columnsToRows(array $columns): array
{
    return getColumns($columns);
}

function countOddNums(array $array): int
{
    $counter = 0;
    for ($i = 0; $i < arrayLength($array); $i++) {
        if (isOdd($array[$i])) $counter++;
    }
    return $counter;
}

function getIndexColumnWithMinCountOddNums(array $columns): int
{
    $min = countOddNums($columns[0]);
    $index = 0;

    for ($i = 0; $i < arrayLength($columns); $i++) {
        $count = countOddNums($columns[$i]);
        if ($min > $count) {
            $min = $count;
            $index = $i;
        }
    }

    return $index;
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
    $columns = getColumns($array);
    $index = getIndexColumnWithMinCountOddNums($columns);
    $column = $columns[$index];

    // Вырезаем из массива столбец с минимальным количеством отрицательных элементов
    $columns = arraySplice($columns, $index);
    // Вставляем последний столбец
    return columnsToRows(
        insertIntoArray($columns, [$column])
    );
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
    [-8, -20, 3, 5, -3, 3],
    [-20, -7, 4, 5, 2, -16],
    [1, -61, 4, -5, 6, -5],
];

echoMultiDimensionalArrayWithKeys(
    getResultArray($array)
);