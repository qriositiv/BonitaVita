    <?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once '../config/connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $soapId = $_POST['soapId'];
        $soapName = $_POST['name'];
        $soapCost = $_POST['cost'];
        $soapWeight = $_POST['weight'];
        $isNewSoap = isset($_POST['visibility']) ? 1 : 0;

        // Insert soap data into the "soap" table
        $sql = "INSERT INTO soap (soap_id, soap_name, soap_cost, soap_weight, is_new_soap) 
                VALUES ('$soapId', '$soapName', '$soapCost', '$soapWeight', '$isNewSoap')";

        if ($connect->query($sql) === TRUE) {
            $soapId = $connect->insert_id;

            // Insert photos into the "photos" table
            if (!empty($_FILES['photo']['name'])) {
                foreach ($_FILES['photo']['tmp_name'] as $key => $tmp_name) {
                    $photoData = addslashes(file_get_contents($tmp_name));  // Read the binary data
            
                    // Insert photo data into the "photos" table
                    $sqlPhoto = "INSERT INTO photos (soap_id, photo_data) VALUES ('$soapId', '$photoData')";
                    $connect->query($sqlPhoto);
                }
            }

            echo "Soap added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    }

    $connect->close();
    ?>