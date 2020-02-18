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

function arrayPush(array $array, $element): array
{
    $array[] = $element;
    return $array;
}


/**
 * @param array $array
 * @return array элементов которые повторяются
 */
function getElementsInSequence(array $array): array
{
    $result = [];
    for ($i = 0; $i < arrayLength($array); $i++) {
        if (isset($array[$i + 1]) && $array[$i] == $array[$i + 1] && !find($result, $array[$i])) {
            $result = arrayPush($result, $array[$i]);
        }
    }
    return $result;
}

function getSequence(array $arr, $elementInSequence): array
{
    $index = getIndexOf($arr, $elementInSequence);
    $result = [];
    for ($i = $index; $i < arrayLength($arr); $i++) {
        if (isset($arr[$i + 1]) && $arr[$i] == $arr[$i + 1]) {
            $result = arrayPush($result, $arr[$i]);
        } else {
            $result = arrayPush($result, $arr[$i]);
            break;
        }
    }
    return $result;
}

function getBiggestSequenceLength(array $array): int
{
    $sequenceElements = getElementsInSequence($array);
    $biggestSequence = [];
    for ($i = 0; $i < arrayLength($sequenceElements); $i++) {
        $sequence = getSequence($array, $sequenceElements[$i]);
        if (arrayLength($biggestSequence) < arrayLength($sequence)) $biggestSequence = $sequence;
    }
    return arrayLength($biggestSequence);
}

################################################################################################################

$array = [12, -13, -14, 25, 25, 25, 18, -19, 20, 20, 20, 20, -13, 15, 15, 15, 15, 15, 15];

echo 'Максимальная длинна последовательности равных чисел равна ' . getBiggestSequenceLength($array) . PHP_EOL;