<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function getBiggestElementInArray(array $arr): int
{
    $max = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($max < $arr[$i]) $max = $arr[$i];
    }
    return $max;
}

function getSmallestElementInArray(array $arr): int
{
    $min = $arr[0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($min > $arr[$i]) $min = $arr[$i];
    }
    return $min;
}

function replaceElements(array &$arr, int $firstIndex, int $secondIndex): array
{
    $num = $arr[$firstIndex];
    $arr[$firstIndex] = $arr[$secondIndex];
    $arr[$secondIndex] = $num;

    return $arr;
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

function getIndexColumnWithBiggestElement(array $columns): int
{
    $biggestIndex = 0;
    $biggest = getBiggestElementInArray($columns[0]);

    for ($i = 0; $i < arrayLength($columns); $i++) {
        if ($biggest < getBiggestElementInArray($columns[$i])) {
            $biggest = getBiggestElementInArray($columns[$i]);
            $biggestIndex = $i;
        }
    }
    return $biggestIndex;
}

function getIndexColumnWithSmallestElement(array $columns): int
{
    $smallestIndex = 0;
    $smallest = getSmallestElementInArray($columns[0]);

    for ($i = 0; $i < arrayLength($columns); $i++) {
        if ($smallest > getSmallestElementInArray($columns[$i])) {
            $smallest = getSmallestElementInArray($columns[$i]);
            $smallestIndex = $i;
        }
    }
    return $smallestIndex;
}


function getResultArray(array $array): array
{
    $columns = getColumns($array);

    return columnsToRows(
        replaceElements(
            $columns,
            getIndexColumnWithSmallestElement($columns),
            getIndexColumnWithBiggestElement($columns)
        )
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
    [3, 4, 88, 2, 4, 5],
    [1, 20, 4, 5, 3, 3],
    [10, 7, 4, 5, 220, 16],
    [1, 61, 4, 5, 6, 5],
];

echoMultiDimensionalArrayWithKeys(
    getResultArray($array)
);
