<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/logo.png" type="logo">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="../files/style.css">
    <link rel="stylesheet" href="../files/soap_files/style.css">
</head>

<body>
    <header id="menu">
        <div class="logo">
            <img src="../images/logo.png" alt="Logo">
            <div class="site-info">
                <p>BonitaVita</p>
            </div>
        </div>
        <?php
        require_once '../config/connect.php';

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        if (isset($_GET['soapId'])) {
            $soapId = $_GET['soapId'];
        ?>
                <nav>
                    <div class="desktop-menu">
                        <ul>
                            <li><a href="./">Главная</a></li>
                            <li><a href="novelties/">Новинки</a></li>
                            <li><a href="assortment/">Ассортимент</a></li>
                            <li><a href="create/">Создать мыло</a></li>
                            <li><a href="contacts/">Контакты</a></li>
                            <li class="language-switch">
                                <a onclick="toggleLanguageMenu()">
                                    <img src="../images/lang-icon.png" alt="Language">
                                </a>
                                <ul class="language-menu" id="language-menu">
                                    <li><a href="../ru/soap.php?soapId=<?php echo $soapId; ?>">Русский</a></li>
                                    <li><a href="../lt/soap.php?soapId=<?php echo $soapId; ?>">Lietuvių</a></li>
                                    <li><a href="../en/soap.php?soapId=<?php echo $soapId; ?>">English</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="mobile-menu">
                        <button id="mobile-menu-button">&#9776; Меню</button>
                        <ul>
                            <li><a href="./">Главная</a></li>
                            <li><a href="novelties/">Новинки</a></li>
                            <li><a href="assortment/">Ассортимент</a></li>
                            <li><a href="create/">Создать мыло</a></li>
                            <li><a href="contacts/">Контакты</a></li>
                            <li>
                                <a href="../ru/soap.php?soapId=<?php echo $soapId; ?>" style="margin-right: 10px;">RU</a>
                                <a href="../lt/soap.php?soapId=<?php echo $soapId; ?>" style="margin-right: 10px;">LT</a>
                                <a href="../en/soap.php?soapId=<?php echo $soapId; ?>" style="margin-right: 10px;">EN</a>
                            </li>
                        </ul>
                    </div>
                </nav>
    </header>
    <?php
            $soapSql = "SELECT * FROM soap WHERE soap_id = ?";
            $stmt = $connect->prepare($soapSql);

            if (!$stmt) {
                die("Error in soap statement preparation: " . $connect->error);
            }

            $stmt->bind_param("i", $soapId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $soapData = $result->fetch_assoc();

                $ingredientSql = "SELECT ri.ingredient_name
                                  FROM soap_ingredients si
                                  JOIN ru_ingredients ri ON si.ingredient_id = ri.ingredient_id
                                  WHERE si.soap_id = ?
                                  ORDER BY ri.ingredient_order ASC";
                $ingredientStmt = $connect->prepare($ingredientSql);

                if (!$ingredientStmt) {
                    die("Error in ingredient statement preparation: " . $connect->error);
                }

                $ingredientStmt->bind_param("i", $soapId);
                $ingredientStmt->execute();
                $ingredientResult = $ingredientStmt->get_result();

                $ingredients = [];
                while ($ingredientRow = $ingredientResult->fetch_assoc()) {
                    $ingredients[] = $ingredientRow['ingredient_name'];
                }

                $descriptionSql = "SELECT description_name, smells_like
                                   FROM ru_description
                                   WHERE soap_id = ?";
                $descriptionStmt = $connect->prepare($descriptionSql);

                if (!$descriptionStmt) {
                    die("Error in description statement preparation: " . $connect->error);
                }

                $descriptionStmt->bind_param("i", $soapId);
                $descriptionStmt->execute();
                $descriptionResult = $descriptionStmt->get_result();

                if ($descriptionRow = $descriptionResult->fetch_assoc()) {
                    $description = $descriptionRow['description_name'];
                    $smells = $descriptionRow['smells_like'];
                } else {
                    $description = "Нет описания";
                    $smells = "Ничем не пахнет";
                }

                echo "
            <div id=\"text-box\">
                <p>{$soapData['soap_name']}</p>
                <p>Уникальнй номер продукта: <b>{$soapData['soap_id']}</b></p>
            </div>
            <section id=\"content\">
                <div class=\"image-carousel\">";
                $imageAlphabet = range('A', 'Z');
                foreach ($imageAlphabet as $letter) {
                    $imagePath = "../images/soap_images/{$soapData['soap_id']}{$letter}.jpg";
                    if (file_exists($imagePath)) {
                        echo "<img class=\"carousel-image\" src=\"$imagePath\" alt=\"Soap Image\">";
                    }
                }
                
                $priceToShow = isset($soapData['soap_sale']) ? $soapData['soap_sale'] : $soapData['soap_cost'];
                $priceColor = isset($soapData['soap_sale']) ? 'red' : 'black';
                $displayCost = isset($soapData['soap_sale']) ? "<del style=\"color: black;\">{$soapData['soap_cost']}€</del><b> " : '';

                echo "</div>
                <div class=\"product-details\">
                    <p id=\"cost\">{$displayCost}<span style=\"color: $priceColor;\">{$priceToShow}€</b></span></p>
                    <p><b>Вес: </b>{$soapData['soap_weight']} г</p>
                    <p><b>Аромат: </b>{$smells}</p>
                    <p><b>Ингредиенты: </b>" . implode(", ", $ingredients) . "</p>
                    <p><b>Описание: </b>{$description}</p>
                    </div>
                </section>
                ";
                } else {
                    echo "Деталей мыло не найдено";
                }
    
                $stmt->close();
                $ingredientStmt->close();
                $descriptionStmt->close();
            } else {
                echo "Неверный запрос.";
            }
    
            $connect->close();
            ?>
    
        <section id="social-links">
            <a href="https://www.instagram.com/_bonitavita_" target="_blank">
                <img src="../images/inst-icon.png" alt="Instagram" class="social-icon">
            </a>
            <a href="mailto:bonitavita03@gmail.com">
                <img src="../images/mail-icon.png" alt="Mail" class="social-icon">
            </a>
        </section>
    
        <script src="../files/script.js"></script>
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
        <script>
            $(document).ready(function () {
                $('.image-carousel').slick({
                    dots: true,
                    infinite: true,
                    speed: 500,
                    fade: true,
                    cssEase: 'linear'
                });
            });
        </script>
    
        <script>
            function toggleLanguageMenu() {
                var languageMenu = document.getElementById("language-menu");
                languageMenu.style.display = (languageMenu.style.display === "block") ? "none" : "block";
            }
        </script>
    
    </body>
    
    </html>
    
