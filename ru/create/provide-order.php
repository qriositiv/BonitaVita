<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if selected_others is set and is an array
    if(isset($_POST['selected_others']) && is_array($_POST['selected_others'])) {
        // Access the selected other_ids
        $selectedOthers = $_POST['selected_others'];

        // Echo the selected other_ids
        echo "Selected other_ids: " . implode(", ", $selectedOthers) . "<br>";
/*
        // Loop through each selected other_id
        foreach ($selectedOthers as $otherId) {
            echo "Selected other_id: " . $otherId . "<br>";
        } */   
    } 

    // Check if the 'message1' input is set
    if(isset($_POST['message'])) {
        // Access and echo the message input
        $message = $_POST['message'];
        echo "Message: " . $message . "<br>";
    }

    // Check if the 'phone' input is set
    if(isset($_POST['phone'])) {
        // Access and echo the phone input
        $phone = $_POST['phone'];
        echo "Phone: " . $phone . "<br>";
    }

    // You can add more input messages similarly

    // Redirect or perform other actions
}
?>
