<?php


$hostname = "localhost";
$username = "root";
$password = "";
$databank = "restaurante";

$dbConnection = new mysqli($hostname, $username, $password, $databank);

if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}
