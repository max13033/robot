<?php
error_reporting(E_ALL);

// $connect = new mysqli("localhost", "max1303_mistor", "362718aB", "max1303_mistor");

$connect = new mysqli("localhost", "root", "mysql", "robot");

if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}

mysqli_query($connect, "SET NAMES utf8");


?>