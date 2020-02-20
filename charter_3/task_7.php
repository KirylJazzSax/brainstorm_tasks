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
 * @param array $array
 * @param int $element
 * @param callable|null $func для поиска в под или над главной диагональю
 * @return array|bool массив с идексами столбца и строки
 */
function getIndexOfMultidimensional(array $array, int $element, callable $func = null)
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        for ($j = 0; $j < arrayLength($array[$i]); $j++) {
            if ($func !== null && $func($i, $j) && $array[$i][$j] === $element) {
                return [$i, $j];
            } else if ($func === null && $array[$i][$j] === $element) return [$i, $j];
        }
    }
    return false;
}

function replaceElementsInMultidimensional(array $array, array $first, array $second): array
{
    $value = $array[$first[0]][$first[1]];
    $array[$first[0]][$first[1]] = $array[$second[0]][$second[1]];
    $array[$second[0]][$second[1]] = $value;

    return $array;
}

/**
 * @param array $arr
 * @param callable|null $func для поиска в под или над главной диагональю
 * @return int
 */
function getBiggestElementInMultidimensional(array $arr, callable $func = null): int
{
    $max = $arr[0][0];
    for ($i = 0; $i < arrayLength($arr); $i++) {
        for ($j = 0; $j < arrayLength($arr[$i]); $j++) {
            if ($func !== null && $func($i, $j) && $max < $arr[$i][$j]) {
                $max = $arr[$i][$j];
            } else if ($func === null && $max < $arr[$i][$j]) $max = $arr[$i][$j];
        }
    }
    return $max;
}

function lower(int $i, int $j): bool
{
    return $i > $j;
}

function higher(int $i, int $j): bool
{
    return $i < $j;
}

function getResultArray(array $array): array
{
    $indexesBiggestValueInHigherTriangle = getIndexOfMultidimensional(
        $array,
        getBiggestElementInMultidimensional($array, 'higher'),
        'higher'
    );

    $indexesBiggestValueInLowerTriangle = getIndexOfMultidimensional(
        $array,
        getBiggestElementInMultidimensional($array, 'lower'),
        'lower'
    );

    return replaceElementsInMultidimensional(
        $array,
        $indexesBiggestValueInHigherTriangle,
        $indexesBiggestValueInLowerTriangle
    );
}

function echoMultiDimensionalArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo '###############################################################################' . PHP_EOL;
        for ($j = 0; $j < arrayLength($arr[$i]); $j++) {
            echo $j . ' => ' . $arr[$i][$j] . PHP_EOL;
        }
    }
}

#################################################################################################################

$array = [
    [4, 8, 18],
    [8, 20, 16],
    [6, 6, 6]
];

echoMultiDimensionalArrayWithKeys(
    getResultArray($array)
);
