<?php
header('Content-Type: text/plain');

echo 'Hello, ';
if (isset($_GET['name']))
    echo 'Dear '. $_GET['name'];
else
    echo 'stranger';
echo '!';