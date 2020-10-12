<?php
$test = array(0, 3, 5, 1, 10);

// Array test diubah menjadi string
$testencode = json_encode($test);
echo $testencode."<br>";

$testdecode = json_decode($testencode);
echo $testdecode[4];