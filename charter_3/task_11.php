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

/**
 * @param array $arr
 * @param int $element
 * @return int|bool index елемента если не нашёл то false
 */
function getIndexOf(array $arr, int $element)
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] == $element) return $i;
    }
    return false;
}

function isPositive(int $num): bool
{
    return $num > 0;
}

function isEven(int $num): bool
{
    return $num % 2 == 0;
}

function getIndexOfBiggestElementInArray(array $arr): int
{
    $max = $arr[0];
    $index = 0;
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($max < $arr[$i]) {
            $max = $arr[$i];
            $index = $i;
        }
    }
    return $index;
}

function getIndexOfSmallestElementInArray(array $arr): int
{
    $min = $arr[0];
    $index = 0;
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($min > $arr[$i]) {
            $min = $arr[$i];
            $index = $i;
        }
    }
    return $index;
}

function getIndexesTwoBiggest(array $array): array
{
    $indexFirst = getIndexOfBiggestElementInArray($array);
    $secondBiggest = $array[getIndexOfSmallestElementInArray($array)];
    $indexSecond = getIndexOfSmallestElementInArray($array);

    for ($i = 0; $i < arrayLength($array); $i++) {
        if ($secondBiggest < $array[$i] && $i !== $indexFirst) {
            $secondBiggest = $array[$i];
            $indexSecond = $i;
        }
    }

    if ($indexFirst < $indexSecond) return [$indexFirst, $indexSecond];
    return [$indexSecond, $indexFirst];
}

function getResultArray(array $array): array
{
    for ($i = 0; $i < arrayLength($array); $i++) {
        $indexesBiggest = getIndexesTwoBiggest($array[$i]);
        $j = 0;
        // Индекс первого элемента с которого будем удалять
        $currentElement = $indexesBiggest[0] + 1;
        // Сколько элементов будем удалять
        $count = ($indexesBiggest[1] - $indexesBiggest[0]) - 1;

        while ($j < $count) {
            // Не увеличиваем $currentElement потому что arraySplice убирает индекс
            if (isEven($array[$i][$currentElement]) && isPositive($array[$i][$currentElement])) {
                $array[$i] = arraySplice($array[$i], getIndexOf($array[$i], $array[$i][$currentElement]));
                $j++;
                continue;
            }
            $currentElement++;
            $j++;
        }
    }
    return $array;
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
    [3, 4, -88, 2, 6, -18],
    [-8, -20, 4, 5, 6, -16],
    [6, -7, 4, 5, 6, 6],
    [1, -61, 4, 5, 6, -5],
];

echoMultiDimensionalArrayWithKeys(
    getResultArray($array)
);

