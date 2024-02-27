<?php
require_once('../../config/second-connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['message']) && isset($_POST['email']) && isset($_POST['phone'])) {
        $message = $_POST['message'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $insertOrderGeneral = "INSERT INTO order_general (email, telephone, note) VALUES ('$email', '$phone', '$message')";
        $connect->query($insertOrderGeneral);

        $orderId = $connect->insert_id;

        if (isset($_POST['selected_others']) && is_array($_POST['selected_others'])) {
            $selectedOthers = $_POST['selected_others'];

            foreach ($selectedOthers as $otherId) {
                $insertOrderElements = "INSERT INTO order_elements (order_id, element_id) VALUES ('$orderId', '$otherId')";
                $connect->query($insertOrderElements);
            }
        }

        echo "Data inserted successfully!";
    } else {
        echo "Incomplete data provided!";
    }
}

$connect->close();
?>
