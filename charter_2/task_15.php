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
 * @return int|bool index елемента если не нашёл то false
 */
function getIndexOf(array $arr, int $element)
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        if ($arr[$i] == $element) return $i;
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

function getSequence(array $arr, $elementInSequence): array
{
    $index = getIndexOf($arr, $elementInSequence);
    $result = [];
    for ($i = $index; $i < arrayLength($arr); $i++) {
        if (isset($arr[$i]) && $arr[$i] == $arr[$i+1]) {
            $result = arrayPush($result, $arr[$i]);
        } else {
            $result = arrayPush($result, $arr[$i]);
            break;
        }
    }
    return $result;
}

function hasSequence(array $array, array $k, int $x): bool
{
    if (find($k, $x) && find($array, $x)) {
        if ($k == getSequence($array, $x)) return true;
    }
    return false;
}

#########################################################################################################################

$array = [12, -13, -14, 25, 25, 25, 18, -19, 20, 20, -13, 15];
$k = [25, 25, 25];
$x = 25;


echo hasSequence($array, $k, $x)
    ? 'есть последовательность из k элементов, равных числу х' . PHP_EOL
    : 'нет последовательности из k элементов, равных числу х' . PHP_EOL;

