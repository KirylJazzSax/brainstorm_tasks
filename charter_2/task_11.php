<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
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

/**
 * Находит первый отрицательный элемент
 * @param array $array
 * @param null $index индекс перед которым нужно найти элемент
 * @return int|bool индекс элемента или false если не найден
 */
function findFirstNegativeBefore(array $array, $index = null)
{
    $length = $index ? $index : arrayLength($array) - 1;
    for ($i = $length; $i >= 0; $i--) {
        if ($array[$i] < 0) return $i;
    }
    return false;
}

/**
 * @param array $array
 * @param null $index индекс перед которым нужно найти элемент
 * @return bool|int индекс элемента или false если не найден
 */
function findLastPositiveAfter(array $array, $index = null)
{
    for ($i = arrayLength($array) - 1; $i >= $index ? $index : 0; $i--) {
        if ($array[$i] > 0) return $i;
    }
    return false;
}

function printResult(array $array): void
{
    $negative = $array[findFirstNegativeBefore(
        $array,
        getIndexOfBiggestElementInArray($array)
    )];

    $positive = $array[findLastPositiveAfter(
        $array,
        getIndexOfSmallestElementInArray($array)
    )];

    echo "первый отрицательный элемент, предшествующий максимальному элементу $negative\n"
        . "последний положительный элемент,  стоящий за минимальным элементом $positive\n";
}

############################################################################################################

$array = [-12, 13, -14, 15, 21, 17, -18, 19, -13, -15];

printResult($array);
