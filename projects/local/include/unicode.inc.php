<?php
function strSplitUnicode($string, $length = 1)
{
	$temp = preg_split('~~u', $string, -1, PREG_SPLIT_NO_EMPTY);
	if ($length > 1) {
		$chunks = array_chunk($temp, $length);
		foreach ($chunks as $i => $chunk) {
			$chunks[$i] = join('', (array)$chunk);
		}
		$temp = $chunks;
	}
	return $temp;
}