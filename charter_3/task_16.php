<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
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

function isNull($element): bool
{
    return $element == 0;
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

function findLastColumnWithNull(array $columns)
{
    for ($i = arrayLength($columns) - 1; $i >= 0; $i--) {
        if (findFirstByCondition($columns[$i], 'isNull')) return $i;
    }
    return false;
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

function getResultArray(array $array, $b): array
{
    $columns = getColumns($array);
    $indexColumn = findLastColumnWithNull($columns);

    $columns = insertIntoArray(
        $columns,
        [$b],
        $indexColumn ? $indexColumn - 1 : null
    );

    return columnsToRows($columns);
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
    [3, 4, 5, 6, 13, 5, 5],
    [1, 20, 3, 5, 0, 3, 5],
    [10, 7, 7, 3, 11, 16, 2],
    [1, 61, 11, 5, 2, 5, 7],
];

$b = [2, 3, 4, 5];

echoMultiDimensionalArrayWithKeys(
    getResultArray($array, $b)
);