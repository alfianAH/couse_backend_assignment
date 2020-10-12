<?php
$text = "HASH testing";
echo $text."<br>";
echo md5($text)."<br>";

$salt = "abcdabcd";
echo md5($text.$salt);