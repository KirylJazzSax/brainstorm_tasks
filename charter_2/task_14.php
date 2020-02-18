<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function isEven(int $num): bool
{
    return $num % 2 == 0 ? true : false;
}

function isOdd(int $num): bool
{
    return $num % 2 != 0 ? true : false;
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

function getPositiveNegativeArray(array $array)
{
    $positiveNegative = arrayFilter($array, function ($element) {
        return $element > 0 ? true : false;
    });

    $negative = arrayFilter($array, function ($element) {
        return $element < 0 ? true : false;
    });

    for ($i = 0; $i < arrayLength($negative); $i++) {
        $positiveNegative = arrayPush($positiveNegative, $negative[$i]);
    }

    return $positiveNegative;
}

function getEvenOddArray(array $array)
{
    $evenOdd = arrayFilter($array, 'isEven');

    $odd = arrayFilter($array, 'isOdd');

    for ($i = 0; $i < arrayLength($odd); $i++) {
        $evenOdd = arrayPush($evenOdd, $odd[$i]);
    }

    return $evenOdd;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

function printResult(array $array): void
{
    echo 'массив положительных и отрицательных элементов' . PHP_EOL;

    echoArrayWithKeys(
        getPositiveNegativeArray($array)
    );

    echo 'массив четных и нечетных элементов' . PHP_EOL;

    echoArrayWithKeys(
        getEvenOddArray($array)
    );
}


################################################################################################################

$array = [12, -13, -14, 1, 2, -17, 18, -19, 20, -13, 15];

printResult($array);

