<?php
header('Content-Type: text/html');

require_once "../include/string.inc.php";

try {
	if (!isset($_GET["str"])) {
		throw new Exception("Get argument str is not exist");
	}

	echo withoutLast($_GET["str"]);
} catch (Exception $ex) {
	header("Status: 400");
	echo "Error code 400 - bad request<br><br>";
	echo $ex->getMessage() . "<br>";
}