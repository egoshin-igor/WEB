<?php
header('Content-Type: text/html');

try {
	if (count($_GET) != 1) {
		throw new Exception("Wrong amount of arguments");
	}

	if (!isset($_GET["word"])) {
		throw new Exception("Argument  is wrong");
	}
} catch (Exception $ex) {
	header("Status: 400");
	echo "Error code 400 - bad request<br><br>";
	echo $ex->getMessage() . "<br><br>";
	echo "Type one argument in this format:<br>";
	echo "word=someWord";
	exit();
}

$dictionary = [
	"Keyboard" => "Клавиатура",
	"Word" => "Слово",
	"Hello" => "Привет",
	"Bye" => "Пока"
];
$translatedWord = $_GET["word"];
try {
	$possibleTranslatedWord = array_search($translatedWord, $dictionary);
	if (!isset($dictionary[$translatedWord]) && $possibleTranslatedWord === false) {
		throw new Exception("Word = \"$translatedWord\" does not exist in dictionary");
	}

	if (isset($dictionary[$translatedWord])) {
		echo $dictionary[$translatedWord];
	} else {
		echo $possibleTranslatedWord;
	}
} catch (Exception $ex) {
	header("Status: 404");
	echo "Error code 404 - not found<br><br>";
	echo $ex->getMessage();
}
