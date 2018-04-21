<?php
header('Content-Type: text/html');

require_once "../include/string.inc.php";

try {
	if (!isset($_GET["identifier"])) {
		throw new Exception("Get argument identifier is not exist");
	}

	echo checkIdentifier($_GET["identifier"]);
} catch (Exception $ex) {
	header("Status: 400");
	echo "Error code 400 - bad request<br><br>";
	echo $ex->getMessage() . "<br>";
}