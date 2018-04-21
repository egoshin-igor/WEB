<?php
header('Content-Type: text/html');

const ARGUMENTS_AMOUNT = 1;

function swap(&$value1, &$value2)
{
	$temp = $value1;
	$value1 = $value2;
	$value2 = $temp;
}

function reverseArray(&$array)
{
	$arrayLength = count($array);
	for ($i = 0, $j = $arrayLength - 1; $i <= $j; ++$i, --$j) {
		swap($array[$i], $array[$j]);
	}
}

try {
	if (count($_GET) != ARGUMENTS_AMOUNT) {
		throw new Exception("Wrong amount of arguments");
	}
	if (!isset($_GET["arr"])) {
		throw new Exception("Argument arr is wrong");
	}
	$array = $_GET["arr"] != "" ? explode(",", $_GET["arr"]) : array();
	reverseArray($array);
	print_r($array);
} catch (Exception $ex) {
	header("Status: 400");
	echo "Error code 400 - bad request<br><br>";
	echo $ex->getMessage() . "<br><br>";
	echo "Type one argument in this format:<br>";
	echo "arr=arrValue1,arrValue2,...,arrValueN";
}
