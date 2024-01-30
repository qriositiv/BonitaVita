<?php

$host = "localhost";
$user = "valotqpq_qriositiv";
$password = "Q!lock+com.9";
$database = "valotqpq_vadata";

$connect = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($connect, "utf8mb4");

if (!$connect) {
    die('Error connecting to the database: ' . mysqli_connect_error());
}

?>
