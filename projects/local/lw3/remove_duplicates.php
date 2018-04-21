<?php
header('Content-Type: text/plain');

require_once "../include/unicode.inc.php";

const CORRECT_ARGUMENTS_AMOUNT = 2;

function printNonDuplicatesChars(&$string)
{
	$charsArray = strSplitUnicode($string);
	$nonDuplicatesArray = [];
	foreach ($charsArray as $value) {
		if (!in_array($value, $nonDuplicatesArray)) {
			echo $value;
			array_push($nonDuplicatesArray, $value);
		}
	}
}

try {
	if ($argc != CORRECT_ARGUMENTS_AMOUNT) {
		throw new Exception("Incorrect number of arguments!");
	}
	printNonDuplicatesChars($argv[1]);
} catch (Exception $ex) {
	echo $ex->getMessage() . "\n";
	echo "Usage php remove_duplicates.php \"input string\"";
}