<?php
// 1. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами – два параметра это числа. Обязательно использовать оператор return. Проверьте деление на ноль и верните текст , ошибка деления на ноль.

function sum($a, $b): int|float
{
    return $a + $b;
}
echo sum(3, 6) . "\n";

function difference($a, $b): int|float
{
    return $a - $b;
}
echo difference(3, 6) . "\n";

function multiplication($a, $b): int|float
{
    return $a * $b;
}
echo multiplication(3, 6) . "\n";

function division($a, $b): int|float|string
{
    return ($b == 0) ? "Ошибка деления на ноль" : ($a / $b);
}
echo division(3, 0) . "\n";

// 2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch). Используйте функции из п.1

function mathOperation($arg1, $arg2, $operation): int|float|string
{
    switch ($operation) {
        case '+':
            return sum($arg1, $arg2);
            break;
        case '-':
            return difference($arg1, $arg2);
            break;
        case '*':
            return multiplication($arg1, $arg2);
            break;
        case '/':
            return division($arg1, $arg2);
            break;
        default:
            return "Введите корректный математический оператор \n";
    }
}
echo  mathOperation(3, 6, '#');

// 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
// Московская область: Москва, Зеленоград, Клин
// Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт
// Рязанская область … (названия городов можно найти на maps.yandex.ru).

$states = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Всеволожск',
        'Павловск',
        'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязать',
        'Вышгород',
        'Рыбное'
    ]
];

foreach ($states as $key => $state) {
    echo $key . ': ';
    foreach ($state as $sity) {
        echo $sity .  ', ';
    }
    echo "\n";
}
