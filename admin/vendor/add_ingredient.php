<?php
// vendor/add_ingredient.php

// Assuming you have a database connection established
// Replace 'your_database_info' with your actual database information
require_once '../config/connect.php';

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Retrieve ingredient from the form submission
$ingredientName = $_POST['ingredient'];

// Prepare and execute the SQL query to insert data into the "ingredients" table
$sql = "INSERT INTO ingredients (soap_id, ingredient) VALUES (-1, '$ingredientName')";

if ($connect->query($sql) === TRUE) {
    echo "Ingredient added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

// Close the database connection
$connect->close();
