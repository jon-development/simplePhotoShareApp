<?php

// Page to allow for connection to the SQL database tables

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "userdata";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

?>
