<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName1 = "login_register";
$dbName2 = "add_pass";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName1);
$con = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName2);
if (!$conn) {
    die("Something went wrong;");
}
if (!$con) {
    die("Something went wrong;");
}
?>