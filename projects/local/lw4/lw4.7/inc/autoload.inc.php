<?php
function autoload($dir)
{
	define("SEARCH_TEMPLATE", ".inc.php");
	$files = array_diff(scandir($dir), array(".", "..", "autoload.inc.php"));
	foreach ($files as $fileName) {
		if (substr($fileName, -strlen(SEARCH_TEMPLATE)) == SEARCH_TEMPLATE) {
			require_once "$dir" . "$fileName";
		}
	}
}
