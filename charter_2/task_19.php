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

function isPositive(int $num): bool
{
    return $num > 0 ? true : false;
}

function isMultiple(int $num, int $p)
{
    return $num % $p == 0 ? true : false;
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

function replaceElements(array &$arr, $firstIndex, $secondIndex): array
{
    $num = $arr[$firstIndex];
    $arr[$firstIndex] = $arr[$secondIndex];
    $arr[$secondIndex] = $num;

    return $arr;
}

/**
 * @param array $array
 * @param callable $func
 * @param bool $getIndex если поставить true то вернет индекс найденного элемента
 * @return bool|int|mixed false если не найден в обратном случае сам элемент или его индекс
 */
function getLastElement(array $array, callable $func, bool $getIndex = false)
{
    for ($i = arrayLength($array) - 1; $i >= 0; $i--) {
        if ($func($array[$i])) return $getIndex ? $i : $array[$i];
    }
    return false;
}

function doIt(array $array, int $p): array
{
    // Берем индекс нужного элемента
    $indexLastElement = getLastElement($array, function ($element) use ($p) {
        return isEven($element) && isPositive($element) && isMultiple($element, $p) ? true : false;
    }, true);

    // Заменяем значение его индексом
    $array[$indexLastElement] = $indexLastElement;

    // Ставим элемент в конец и возвращаем массив
    replaceElements($array, $indexLastElement, arrayLength($array) - 1);

    return $array;
}

function echoArrayWithKeys(array $arr): void
{
    for ($i = 0; $i < arrayLength($arr); $i++) {
        echo $i . ' => ' . $arr[$i] . PHP_EOL;
    }
}

##############################################################################################################

$array = [12, 13, 12, -14, 25, 18, -19, 20, 25, 20, 14, -13, 15, 15, 15, -20, 15, 15, 15];
$p = 4;

echoArrayWithKeys(
    doIt($array, $p)
);

