<?php

function arrayLength(array $arr): int
{
    $i = 0;
    while (true) {
        if (!isset($arr[$i])) return $i;
        $i++;
    }
}

function powNum(int $n, int $pow)
{
    if ($pow === 0) return 1;
    if ($pow === 1) return $n;
    return $n * pow($n, $pow - 1);
}

function generateMaxPow(array $array): int
{
    return arrayLength($array) - 1;
}

function getPolynomialValue(array $coefficients, int $x): int
{
    $maxPow = generateMaxPow($coefficients);
    $result = null;
    for ($i = 0; $i < arrayLength($coefficients); $i++) {
        $result = $result + ($coefficients[$i] * powNum($x, $maxPow));
        $maxPow--;
    }
    return $result;
}

function getDerivative(int $coefficient, $pow, $x): int
{
    return $coefficient * ($pow * powNum($x, $pow - 1));
}

function getSumNumsInArray(array $nums): int
{
    $sum = 0;
    $i = 0;
    while (true) {
        if (!isset($nums[$i])) break;
        $sum += $nums[$i];
        $i++;
    }
    return $sum;
}


function getDerivativesOfPolynomial(array $coefficients, int $x): array
{
    $pow = generateMaxPow($coefficients);
    $result = [];

    for ($i = 0; $i < arrayLength($coefficients); $i++) {
        $result[] = getDerivative($coefficients[$i], $pow, $x);
        $pow--;
    }

    return $result;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

#############################################################################################################

// Формула многочлена y = 4x + 3x + 2x + 8,
// степени генерируются в зависимости от колличества коэффицентов в массиве
$coefficients = [4, 3, 2, 8];
$x = 2;

$derivatives = getDerivativesOfPolynomial($coefficients, $x);

echo 'Значение многочлена ' . getPolynomialValue($coefficients, $x) . PHP_EOL;

echo 'Значение всех производных' . PHP_EOL;

echoArrayWithKeys($derivatives);

echo 'Значение производной всего многочлена ' . getSumNumsInArray($derivatives) . PHP_EOL;
