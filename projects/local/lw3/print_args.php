<?php
header('Content-Type: text/plain');

function printArgs(&$argv, $argc)
{
	for ($i = 1; $i < $argc; ++$i) {
		echo $i != $argc - 1 ?  $argv[$i] . ' ' :  $argv[$i];
	}
}

try {
	if ($argc < 2) {
		throw new Exception("No parameters were specified!");
	}
	$argumentsAmount = $argc - 1;
	echo "Number of arguments: {$argumentsAmount}" .  "\n";
	echo "Arguments: ";
	printArgs($argv, $argc);
} catch (Exception $ex) {
	echo $ex->getMessage() . '\n';
}
