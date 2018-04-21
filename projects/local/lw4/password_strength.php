<?php
header('Content-Type: text/html');

require_once "../include/string.inc.php";

try {
	if (!isset($_GET["password"])) {
		throw new Exception("Get argument password is not exist");
	} else {
		$password = $_GET["password"];
	}

	echo passwordStrength($password);
} catch (Exception $ex) {
	header("Status: 400");
	echo "Error code 400 - bad request<br><br>";
	echo $ex->getMessage() . "<br>";
}