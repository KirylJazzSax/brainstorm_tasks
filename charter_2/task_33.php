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
    return $num < 0 ? true : false;
}

function arraySort(array $arr): array
{
    $i = 0;
    $length = arrayLength($arr);
    while ($i < $length) {
        if (!isset($arr[$i + 1])) break;
        $j = 0;
        while ($j < $length - 1) {
            if ($arr[$j] > $arr[$j + 1]) {
                $num = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $num;
            }
            $j++;
        }
        $i++;
    }
    return $arr;
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

function insertPositiveElement(array $array, int $element): array
{
    if (isNegative($element)) return $array;

    return arraySort(
        insertIntoArray($array, [$element])
    );
}


function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

###########################################################################################################

$array = [2, 3, 6, 5, 8, 7, 4, 8, 9, 5, 3];

$p = 4;

echoArrayWithKeys(
    insertPositiveElement($array, $p)
);

