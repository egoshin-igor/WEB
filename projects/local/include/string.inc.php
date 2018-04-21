<?php
require_once("unicode.inc.php");

function last($str)
{
	if (!is_string($str)) {
		throw new Exception("It is not string");
	}

	$strLength = mb_strlen($str);

	if ($strLength == 0) {
		throw new Exception("The string is empty");
	} else {
		return mb_substr($str, $strLength - 1);
	}
}

function withoutLast($str)
{
	if (!is_string($str)) {
		throw new Exception("It is not string");
	}

	$strLength = mb_strlen($str);

	if ($strLength == 0) {
		throw new Exception("The string is empty");
	} else {
		return mb_substr($str, 0, $strLength - 1);
	}
}

function reverse($str)
{
	if (!is_string($str)) {
		throw new Exception("It is not string");
	}

	$strArr = preg_split('~~u', $str, -1, PREG_SPLIT_NO_EMPTY);
	$arrayLength = count($strArr);

	for ($i = 0, $j = $arrayLength - 1; $i <= $j; ++$i, --$j) {
		swap($strArr[$i], $strArr[$j]);
	}

	return implode("", $strArr);
}

function checkIdentifier($identifier)
{
	if (!is_string($identifier)) {
		throw new Exception("It is not string");
	}

	if (strlen($identifier) == 0) {
		return "No. Identifier is empty";
	}

	if (!IntlChar::isalpha($identifier[0])) {
		return "No. First char is not a letter";
	}

	if (!isAlNumString($identifier)) {
		return "No. One of chars are not a latin-letter or digit";
	}

	return "Yes";
}

function removeExtraBlanks($str)
{
	if (!is_string($str)) {
		throw new Exception("It is not string");
	}

	if (strlen($str) == 0) {
		return $str;
	}

	define("SPACE", "s");
	define("WORD", "w");

	$strArr = strSplitUnicode($str);
	$strArrLen = COUNT($strArr);

	for ($i = 0; $i < $strArrLen && $strArr[$i] == " "; ++$i) {
		$strArr[$i] = "";
	}
	for ($i = $strArrLen - 1; $i > 0 && $strArr[$i] == " "; --$i) {
		$strArr[$i] = "";
	}

	$state = WORD;
	$strWithoutExtraBlanks = "";
	for ($i = 0; $i < $strArrLen && $strArr[$i] == " "; ++$i) {
		if ($state == WORD) {
			if ($strArr[$i] != " ") {
				$strWithoutExtraBlanks .= $strArr[$i];
			} else {
				$state = SPACE;
				$strWithoutExtraBlanks .= " ";
			}
		} else {
			if ($strArr[$i] != " ") {
				$state = WORD;
			}
		}
	}
	return implode("", $strArr);
	// $str = trim($str);
	// return str_replace("  ", " ", $str);
}

function passwordStrength($password)
{
	if (!is_string($password)) {
		throw new Exception("It is not string");
	}

	if ($password == "") {
		throw new Exception("String is empty");
	}

	if (!isAlNumString($password)) {
		return "No. One of chars are not a latin-letter or digit";
	}

	$strength = 0;
	$digitsAmount = getDigitsAmount($password);
	$passwordLength = strlen($password);
	$lowercaseCharsAmount = similar_text($password, strtolower($password)) - $digitsAmount;
	$uppercaseCharsAmount = $passwordLength - $digitsAmount - $lowercaseCharsAmount;
	$duplicateCharsAmount = getDuplicateCharsAmount($password);

	$strength += 4 * $passwordLength;
	$strength += 4 * $digitsAmount;
	$strength += ($uppercaseCharsAmount != 0 ? ($passwordLength - $uppercaseCharsAmount) * 2 : 0);
	$strength += ($lowercaseCharsAmount != 0 ? ($passwordLength - $lowercaseCharsAmount) * 2 : 0);
	$strength -= ($digitsAmount == 0 || $digitsAmount == $passwordLength ? $passwordLength : 0);
	$strength -= $duplicateCharsAmount;
	return $strength;
}

function swap(&$value1, &$value2)
{
	$temp = $value1;
	$value1 = $value2;
	$value2 = $temp;
}

function isAlNumString($str)
{
	for ($i = 1; $i < strlen($str); ++$i) {
		if (!IntlChar::isalnum($str[$i])) {
			return false;
		}
	}
	return true;
}

function sortString($str)
{
	if (!is_string($str)) {
		throw new Exception("It is not string");
	}

	$stringParts = str_split($str);
	sort($stringParts);
	return implode('', $stringParts);
}

function getDigitsAmount($str)
{
	if (!is_string($str)) {
		throw new Exception("It is not string");
	}

	$digitsAmount = 0;
	for ($i = 0; $i < strlen($str); ++$i) {
		if (IntlChar::isdigit($str[$i])) {
			++$digitsAmount;
		}
	}
	return $digitsAmount;
}

function getDuplicateCharsAmount($str)
{
	if (!is_string($str)) {
		throw new Exception("It is not string");
	}

	$sortedStr = sortString($str);
	$duplicateCharsAmount = 0;
	$result = 0;
	for ($i = 1; $i < strlen($sortedStr); ++$i) {
		if ($sortedStr[$i] == $sortedStr[$i - 1]) {
			++$duplicateCharsAmount;
		} else {
			$result += $duplicateCharsAmount > 0 ? ($duplicateCharsAmount + 1) : 0;
			$duplicateCharsAmount = 0;
		}
	}
	$result += $duplicateCharsAmount > 0 ? ($duplicateCharsAmount + 1) : 0;
	return $result;
}
