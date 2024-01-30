<?php
require_once 'config/connect.php';

if (isset($_POST['soap_id'])) {
    $soapId = $_POST['soap_id'];

    // Delete from ingredients table
    $ingredientSql = "DELETE FROM ingredients WHERE soap_id = $soapId";
    $connect->query($ingredientSql);

    // Delete from category table
    $categorySql = "DELETE FROM category WHERE soap_id = $soapId";
    $connect->query($categorySql);

    // Delete from photos table (assuming there is a photos table)
    $photosSql = "DELETE FROM photos WHERE soap_id = $soapId";
    $connect->query($photosSql);

    // Delete from soap table
    $soapSql = "DELETE FROM soap WHERE soap_id = $soapId";
    $connect->query($soapSql);

    echo "Deletion successful";
} else {
    echo "Invalid request";
}

$connect->close();
?>
