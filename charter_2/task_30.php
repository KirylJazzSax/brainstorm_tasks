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

function getFirstDerivative(array $coefficients, int $x): int
{
    $pow = generateMaxPow($coefficients);
    return $coefficients[0] * ($pow * powNum($x, $pow - 1));
}

############################################################################################################

// Формула многочлена y = 4x + 3x + 2x + 8,
// степени генерируются в зависимости от колличества коэффицентов в массиве
$coefficients = [4, 3, 2, 8];
$x = 2;
echo 'Значение многочлена ' . getPolynomialValue($coefficients, $x)
    . ' его первой производной ' . getFirstDerivative($coefficients, $x) . PHP_EOL;