<?php
const DIR = "./";

$files = array_diff(scandir(DIR), array(".", "..", "files.php"));

foreach ($files as $fileName) {
	if ($fileName[0] != '.')
        echo "<a target=\"_blank\" href=\"$fileName\">$fileName</a><br>";
}
echo "<a href=\"http://localhost:4000/\">Home</a><br>";