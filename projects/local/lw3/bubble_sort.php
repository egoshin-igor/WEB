<?php
header('Content-Type: text/html');

const ARGUMENTS_AMOUNT = 1;

function swap(&$value1, &$value2)
{
	$temp = $value1;
	$value1 = $value2;
	$value2 = $temp;
}

function arrayValuesIsNumeric($array)
{
	foreach ($array as $key) {
		if (!is_numeric($key)) {
			return false;
		}
	}
	return true;
}

function bubbleSort(&$array)
{
	$isSorted = false;
	$arrayLength = count($array);
	while (!$isSorted) {
		$isSorted = true;
		for ($i = 1; $i < $arrayLength; ++$i) {
			if ($array[$i] < $array[$i - 1]) {
				swap($array[$i], $array[$i - 1]);
				$isSorted = false;
			}
		}
	}
}

try {
	if (count($_GET) != ARGUMENTS_AMOUNT) {
		throw new Exception("Wrong amount of arguments");
	}

	if (!isset($_GET["numbers"])) {
		throw new Exception("Argument  is wrong");
	}

	$numbersArray = $_GET["numbers"] != "" ? explode(",", $_GET["numbers"]) : array();
	if (!arrayValuesIsNumeric($numbersArray)) {
		throw new Exception("Not all values are number in argument numbers");
	}

	bubbleSort($numbersArray);
	$stringOfNumbers = implode(",", $numbersArray);
	echo $stringOfNumbers;
} catch (Exception $ex) {
	header("Status: 400");
	echo "Error code 400 - bad request<br><br>";
	echo $ex->getMessage() . "<br><br>";
	echo "Type one argument in this format:<br>";
	echo "numbers=numericValue1,numericValue2,...,numericValueN";
}