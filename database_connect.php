<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "backend_dilo";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if(!$connection){
    // If failed, connection will be stopped
    die("Connection failed: " . mysqli_connect_error());
}
?>