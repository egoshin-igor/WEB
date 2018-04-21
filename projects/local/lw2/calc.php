<?php
header('Content-Type: text/html');

const ARGUMENTS_AMOUNT = 3;

function getCalculationValue($firstArgument, $secondArgument, $operation)
{
	switch ($operation) {
		case "add":
			return $firstArgument + $secondArgument;
			break;
		case "sub":
			return $firstArgument - $secondArgument;
			break;
		case "mul":
			return $firstArgument * $secondArgument;
			break;
		case "div":
			if ($secondArgument != 0) {
				return $firstArgument / $secondArgument;
			} else {
				throw new Exception("arg2 is zero. Division by zero is not possible");
			}
			break;
		default:
			throw new Exception("Non-existent operation = {$operation}");
			break;
	}
}

try {
	if (count($_GET) != ARGUMENTS_AMOUNT) {
		throw new Exception("Wrong amount of arguments");
	}

	if (isset($_GET['arg1']) && isset($_GET['arg2']) && isset($_GET['operation'])) {
		$firstArgument = $_GET['arg1'];
		$secondArgument = $_GET['arg2'];
		$operation = $_GET['operation'];

	} else {
		throw new Exception("One or more name of GET arguments is wrong");
	}

	if (!is_numeric($firstArgument) || !is_numeric($secondArgument)) {
		throw new Exception("One or more arguments are not a number");
	}

	$value = getCalculationValue($firstArgument, $secondArgument, $operation);
	echo $value;
} catch (Exception $ex) {
	header("Status: 400");
	echo "Error code 400 - bad request<br><br>";
	echo $ex->getMessage() . "<br><br>";
	echo "Type three arguments in this format:<br>";
	echo "arg1=numericValue&arg2=numericValue&operation=mathOperation";
}