<?php
header('Content-Type: text/plain');

echo 'Query string = ';
echo "'", $_SERVER["QUERY_STRING"], "'";