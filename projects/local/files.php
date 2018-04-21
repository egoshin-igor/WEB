<?php
const DIR = "./";

$files = array_diff(scandir(DIR), array(".", "..", "files.php"));

foreach ($files as $fileName) {
	if (stristr($fileName, "lw") != false)
		echo "<a href=\"$fileName\">$fileName</a><br>";
}