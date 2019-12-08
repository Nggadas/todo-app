<?php
session_start();

$servername = $_ENV["SEVER_NAME"];
$dbname = $_ENV["DB_NAME"];
$username = $_ENV["USERNAME"];
$password = $_ENV["PASSWORD"];

$connect = mysqli_connect($servername,$username,$password,$dbname);

if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}