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

/**
 * @param array $arr
 * @return int|bool false если нет отрицательных элементов
 */
function getIndexOfLastNegativeElement(array $arr)
{
    for ($i = arrayLength($arr) - 1; $i >= 0; $i--) {
        if ($arr[$i] < 0) return $i;
    }
    return false;
}

function replaceElements(array $arr, $firstIndex, $secondIndex): array
{
    $num = $arr[$firstIndex];
    $arr[$firstIndex] = $arr[$secondIndex];
    $arr[$secondIndex] = $num;

    return $arr;
}

function replaceElementsInArray(array $arr): array
{
    return replaceElements(
        $arr,
        getIndexOfBiggestElementInArray($arr),
        getIndexOfLastNegativeElement($arr)
    );
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

####################################################################################################################

$array = [1, 2, -1, 3, 4, 8, 4, 6, -3];

echoArrayWithKeys(
    replaceElementsInArray($array)
);

