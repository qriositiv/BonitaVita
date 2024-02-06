<?php

$host = "localhost";
$user = "bonihtrg_vafamily";
$password = "VA!lock+com.11";
$database = "bonihtrg_soap";

$connect = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($connect, "utf8mb4");

if (!$connect) {
    die('Error connecting to the database: ' . mysqli_connect_error());
}
