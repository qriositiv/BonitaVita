<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="novelties_files/style.css">
    <title>BonitaVita</title>
</head>
<body>    
<header id="menu">
        <div class="logo">
            <img src="../images/logo.png" alt="Logo">
            <div class="site-info">
                <p>BonitaVita</p>
            </div>
        </div>
        <nav>
            <div class="desktop-menu">
                <ul>
                    <li><a href="../">Главная</a></li>     
                    <li><a href="../novelties/">Новинки</a></li>
                    <li><a href="../assortment/">Ассортимент</a></li>
                    <li><a href="../create/">Создать мыло</a></li>
                    <li><a href="../contacts/">Контакты</a></li>
                    <li class="language-switch">
                        <a onclick="toggleLanguageMenu()">
                            <img src="../images/lang-icon.png" alt="Language">
                        </a>
                        <ul class="language-menu" id="language-menu">
                            <li><a href="../ru/">Русский</a></li>
                            <li><a href="../lt/">Lietuvių</a></li>
                            <li><a href="../en/">English</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="mobile-menu">
                <button id="mobile-menu-button">&#9776; Меню</button>
                <ul>
                    <li><a href="../">Главная</a></li>     
                    <li><a href="../novelties/">Новинки</a></li>
                    <li><a href="../assortment/">Ассортимент</a></li>
                    <li><a href="../create/">Создать мыло</a></li>
                    <li><a href="../contacts/">Контакты</a></li>
                    <li>
                        <a href="../ru/" style="margin-right: 10px;">RU</a>
                        <a href="../lt/" style="margin-right: 10px;">LT</a>
                        <a href="../en/" style="margin-right: 10px;">EN</a>
                    </li>                    
                </ul>
            </div>
        </nav>
    </header>
    <div id="text-box">
        <p>Новинки</p>
    </div>
    <section id="content">
    <?php
    require_once '../config/connect.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $sql = "SELECT DISTINCT soap_id FROM soap WHERE is_new_soap = 1";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $soapId = $row['soap_id'];

            $soapSql = "SELECT * FROM soap WHERE soap_id = $soapId";
            $soapResult = $connect->query($soapSql);
            $soapData = $soapResult->fetch_assoc();

            $ingredientSql = "SELECT ingredient FROM ingredients WHERE soap_id = $soapId";
            $ingredientResult = $connect->query($ingredientSql);
            $ingredients = [];
            while ($ingredientRow = $ingredientResult->fetch_assoc()) {
                $ingredients[] = $ingredientRow['ingredient'];
            }

            $categorySql = "SELECT category FROM category WHERE soap_id = $soapId";
            $categoryResult = $connect->query($categorySql);
            $categories = [];
            while ($categoryRow = $categoryResult->fetch_assoc()) {
                $categories[] = $categoryRow['category'];
            }

            echo "
                <div id=\"soap_$soapId\">
                    <div>
                        <img src=\"../images/soap_images/{$soapData['soap_id']}A.jpg\" alt=\"Product Photo\">
                    </div>
                    <div>
                        <p><b>{$soapData['soap_name']}</b></p>
                        <p>{$soapData['soap_cost']}€</p>
                    </div>
                    <button class=\"view\" onclick=\"redirectToSoap($soapId)\">Подробнее</button>
                </div>
            ";
        }
    } else {
        echo "Новинок не найдено";
    }

    $connect->close();
    ?>

    </section>

    <section id="social-links">
        <a href="https://www.instagram.com/_bonitavita_" target="_blank">
            <img src="../images/inst-icon.png" alt="Instagram" class="social-icon">
        </a>
        <a href="mailto:bonitavita03@gmail.com">
            <img src="../images/mail-icon.png" alt="Mail" class="social-icon">
        </a>
    </section>

    <script src="novelties_files/script.js"></script>

    <script>
        function redirectToSoap(soapId) {
            window.location.href = '../soap.php?soapId=' + soapId;
        }
    </script>

    <script>
        function toggleLanguageMenu() {
            var languageMenu = document.getElementById("language-menu");
            languageMenu.style.display = (languageMenu.style.display === "block") ? "none" : "block";
        }
    </script>

</body>
</html>
