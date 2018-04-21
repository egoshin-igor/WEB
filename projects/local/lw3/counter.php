<?php
header('Content-Type: text/html');

require_once "../include/unicode.inc.php";

const ARGUMENTS_AMOUNT = 1;

function getCharsAmount($string)
{
	$lowerString = mb_strtolower($string, 'UTF-8');
	$arrayOfChars = strSplitUnicode($lowerString);
	$charAmountArray = [];
	foreach ($arrayOfChars as $value) {
		if (key_exists($value, $charAmountArray)) {
			++$charAmountArray[$value];
		} else
			$charAmountArray[$value] = 1;
	}
	return $charAmountArray;
}

function printCharsAmount($charsAmountArray)
{
	foreach ($charsAmountArray as $key => $value) {
		if ($key == " ") {
			echo "' '", "-", $value, " (пробел)", "<br>";
		} else {
			echo $key, "-", $value, "<br>";
		}
	}
}

try {
	if (count($_GET) != ARGUMENTS_AMOUNT) {
		throw new Exception("Wrong amount of arguments");
	}

	if (!isset($_GET["string"])) {
		throw new Exception("Argument  is wrong");
	}

	$string = $_GET["string"];
	$charsAmountArray = getCharsAmount($string);
	printCharsAmount($charsAmountArray);
} catch (Exception $ex) {
	header("Status: 400");
	echo "Error code 400 - bad request<br><br>";
	echo $ex->getMessage() . "<br><br>";
	echo "Type one argument in this format:<br>";
	echo "string=someString";
}