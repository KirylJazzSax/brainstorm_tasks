<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function getSqrt(int $num): int
{
    $sqrt = (int)($num / 2);
    for ($i = $sqrt; $i > 0; $i--) {
        if ($sqrt * $sqrt == $num) return $sqrt;
        $sqrt--;
    }
    return false;
}

function getSumNumsInArray(array $nums): int
{
    $sum = 0;
    $i = 0;
    while (true) {
        if (isset($nums[$i])) {
            $sum += $nums[$i];
        } else {
            break;
        }
        $i++;
    }
    return $sum;
}

function getMatrixBack(array $array): array
{
    $length = arrayLength($array);
    $rowLength = getSqrt($length);
    $matrix = [];

    for ($i = 0; $i < $length; $i += $rowLength) {
        $row = [];
        $forRow = $i + $rowLength;
        for ($j = $i; $j < $forRow; $j++) {
            $row[] = $array[$j];
        }
        $matrix[] = $row;
    }
    return $matrix;
}

function multiplyElementsInArrayWithSameLength(array $first, array $second): array
{
    for ($i = 0; $i < arrayLength($first); $i++) {
        $first[$i] *= $second[$i];
    }
    return $first;
}

#################################################################################################################

function prepareMatrix(callable $getMatrix): callable
{
    return function (array $array) use ($getMatrix): array {
        return $getMatrix($array);
    };
}

function multipleMatrixOnVector(callable $prepareMatrix, callable $multiply, callable $getSum): callable
{
    return function (array $array, array $vector) use ($prepareMatrix, $multiply, $getSum): array {
        $matrix = $prepareMatrix($array);
        for ($i = 0; $i < arrayLength($matrix); $i++) {
            $matrix[$i] = $getSum($multiply($matrix[$i], $vector));
        }
        return $matrix;
    };
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $arr[$i] . PHP_EOL;
        echo '------------------------------------' . PHP_EOL;
    }
}

#################################################################################################################

$array = [
    3, 7, 6,
    8, 10, 11,
    20, 7, 3,
];

$b = [1, 2, 3];

$prepareMatrix = prepareMatrix('getMatrixBack');
$result = multipleMatrixOnVector(
    $prepareMatrix,
    'multiplyElementsInArrayWithSameLength',
    'getSumNumsInArray'
);

echoArrayWithKeys(
    $result($array, $b)
);