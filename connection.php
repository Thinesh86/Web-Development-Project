<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "event";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$con) {
    die("Failed to connect: " . mysqli_connect_error());
}
?>