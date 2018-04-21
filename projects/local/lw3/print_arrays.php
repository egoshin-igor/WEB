<?php
header('Content-Type: text/plain');
$simpleNumbers = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29];
$functionsDescription = [
	"count" => "Подсчитывает количество элементов массива или что-то в объекте",
	"is_array" => "Определяет, является ли переменная массивом",
	"array_merge" => "Сливает один или большее количество массивов",
	"empty" => "Проверяет, пуста ли переменная",
	"print_r" => "Выводит удобочитаемую информацию о переменной"
];
$unitMatrix = [
	[1, 0, 0, 0],
	[0, 1, 0, 1],
	[0, 0, 1, 0],
	[0, 0, 0, 1]
];
print_r($simpleNumbers);
print_r($functionsDescription);
print_r($unitMatrix);