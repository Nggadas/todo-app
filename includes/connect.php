<?php
session_start();

$servername = "localhost";
$dbname = "db_todoapp";
$username = "root";
$password = "root";

$connect = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}