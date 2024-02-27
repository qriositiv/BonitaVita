<?php
// Include the database connection
require_once('../../config/second-connect.php');

// Retrieve data from the database
$sqlOrders = "SELECT og.order_id, og.email, og.telephone, og.note, s.status_image 
              FROM order_general og
              JOIN status s ON og.status = s.status_id";
$resultOrders = $connect->query($sqlOrders);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/green-logo.png" type="logo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="../../files/style.css">
    <link rel="stylesheet" href="../../files/orders_files/style.css">
    <title>BonitaVita Debug</title>
</head>
<body>    
    <header id="menu">
        <div class="logo">
            <img src="../../images/green-logo.png" alt="Logo">
            <div class="site-info">
                <p>BonitaVita</p>
            </div>
        </div>
        <nav>
            <div class="desktop-menu">
                <ul>
                    <li><a href="../../ru/">BonitaVita.lt</a></li>  
                    <li><a href="../">Каталог</a></li>    
                    <li><a href="">Заказы</a></li>   
                    <li><a href="https://va-love.site/">VA-love.site</a></li>
                </ul>
            </div>
            <div class="mobile-menu">
                <button id="mobile-menu-button">&#9776; Меню</button>
                <ul>
                    <li><a href="../../ru/">BonitaVita.lt</a></li>     
                    <li><a href="../">Каталог</a></li>    
                    <li><a href="">Заказы</a></li>     
                    <li><a href="https://va-love.site/">VA-love.site</a></li>                 
                </ul>
            </div>
        </nav>
    </header>
    <div id="text-box">
        <p>Заказы</p>
    </div>

    <!-- Main content section begin. -->

    <section id="content">

    <?php
    if ($resultOrders->num_rows > 0) {
        while ($rowOrder = $resultOrders->fetch_assoc()) {
            echo "<div>
            <img src=\"../../images/" . $rowOrder['status_image'] . "\" alt=\"Status\">";
            
            echo "<p>Номер заказа:<b> " . $rowOrder['order_id'] . "</b></p>";
            echo "<p>Электроная почта:<b> " . $rowOrder['email'] . "</b></p>";
            echo "<p>Телефон:<b> " . $rowOrder['telephone'] . "</b></p>";
            echo "<p>Заметка: " . $rowOrder['note'] . "</p>";

            $currentOrderId = $rowOrder['order_id'];
            $sqlElements = "SELECT elements.element_name 
                            FROM order_elements 
                            JOIN elements ON order_elements.element_id = elements.element_id 
                            WHERE order_elements.order_id = '$currentOrderId'";
            $resultElements = $connect->query($sqlElements);

            if ($resultElements->num_rows > 0) {
                echo "<p>Элементы: ";
                while ($rowElement = $resultElements->fetch_assoc()) {
                    echo $rowElement['element_name'] . ", ";
                }
                echo "<br>";
            } else {
                echo "<p>Не найдено элементов в этом заказе</p><br>";
            }

            echo "</div>";
        }
    } else {
        echo "<p>Заказов не найдено</p>";
    }
    ?>

    </section>

    <!-- Main content section end. -->

    <script src="../../files/script.js"></script>

    <script>
        function toggleLanguageMenu() {
            var languageMenu = document.getElementById("language-menu");
            languageMenu.style.display = (languageMenu.style.display === "block") ? "none" : "block";
        }
    </script>

</body>
</html>
