<?php

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

function countChangingPositiveNegative(array $array): int
{
    $counter = 0;
    $positive = $array[0] > 0 ? 1 : 0;
    $changed = $positive;

    for ($i = 0; $i < arrayLength($array); $i++) {
        $positive = $array[$i] > 0 ? 1 : 0;

        if ($changed !== $positive) {
            $changed = $positive;
            $counter++;
        }
    }
    return $counter;
}

function getIndexRowWithBiggestCount(array $array): int
{
    $index = 0;
    $biggest = countChangingPositiveNegative($array[0]);

    for ($i = 0; $i < arrayLength($array); $i++) {
        $count = countChangingPositiveNegative($array[$i]);
        if ($biggest < $count) {
            $biggest = $count;
            $index = $i;
        }
    }
    return $index;
}

function getResultArray(array $array): array
{
    $index = getIndexRowWithBiggestCount($array);
    $row = $array[$index];

    // Вырезаем из массива ряд с с максимальным количеством знакочередующихся элементов
    $array = arraySplice($array, $index);
            //Вставляем в начало массива
    return arrayUnshift($array, [$row]);
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
    [-8, -20, 4, 5, -3, 3],
    [-20, -7, 4, 5, 2, -16],
    [1, -61, 4, -5, 6, -5],
];

echoMultiDimensionalArrayWithKeys(
    getResultArray($array)
);
