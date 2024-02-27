<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/logo.png" type="logo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="../../files/style.css">
    <link rel="stylesheet" href="../../files/assortment_files/style.css">
    <title>BonitaVita</title>
</head>
<body>    
    <header id="menu">
        <div class="logo">
            <img src="../../images/logo.png" alt="Logo">
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
                            <img src="../../images/lang-icon.png" alt="Language">
                        </a>
                        <ul class="language-menu" id="language-menu">
                            <li><a href="../../ru/assortment/">Русский</a></li>
                            <li><a href="../../lt/assortment/">Lietuvių</a></li>
                            <li><a href="../../en/assortment/">English</a></li>
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
                        <a href="../../ru/assortment/" style="margin-right: 10px;">RU</a>
                        <a href="../../lt/assortment/" style="margin-right: 10px;">LT</a>
                        <a href="../../en/assortment/" style="margin-right: 10px;">EN</a>
                    </li>                    
                </ul>
            </div>
        </nav>
    </header>
    <div id="text-box">
        <p>Ассортимент</p>
    </div>

    <!-- Main content section begin. -->

    <div id="section-title">
        <p>Фавориты</p>
    </div>
    <section id="content">
        <?php
        require '../../config/connect.php';

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "SELECT DISTINCT soap_id
            FROM soap
            WHERE is_favorite = 1 AND is_visible = 1
            ORDER BY soap_id DESC";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $soapId = $row['soap_id'];

                $soapSql = "SELECT * FROM soap WHERE soap_id = $soapId";
                $soapResult = $connect->query($soapSql);
                $soapData = $soapResult->fetch_assoc();

                $priceToShow = isset($soapData['soap_sale']) ? $soapData['soap_sale'] : $soapData['soap_cost'];
                $priceColor = isset($soapData['soap_sale']) ? 'red' : 'black';
                $displayCost = isset($soapData['soap_sale']) ? "<del style=\"color: black;\">{$soapData['soap_cost']}€</del><b> " : '';

                echo "
                    <div id=\"soap_$soapId\">
                        <div>
                            <img src=\"../../images/soap_images/{$soapData['soap_id']}A.jpg\" alt=\"Product Photo\">
                        </div>
                        <div>
                            <p><b>{$soapData['soap_name']}</b></p>
                            <p>{$displayCost}<span style=\"color: $priceColor;\">{$priceToShow}€</b></span></p>
                        </div> 
                        <button class=\"view\" onclick=\"redirectToSoap($soapId)\">Подробнее</button>
                    </div>
                ";
            }
        } else {
            echo "Фаворитов не найдено";
        }

        $connect->close();
        ?>
    </section>

    <div id="section-title">
        <p>Сезонное мыло</p>
    </div>
    <section id="content">
        <?php
        require '../../config/connect.php';

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "SELECT DISTINCT soap_id
            FROM soap
            WHERE soap_sale IS NOT NULL AND is_visible = 1
            ORDER BY soap_id DESC";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $soapId = $row['soap_id'];
    
                $soapSql = "SELECT * FROM soap WHERE soap_id = $soapId";
                $soapResult = $connect->query($soapSql);
                $soapData = $soapResult->fetch_assoc();
    
                $priceToShow = isset($soapData['soap_sale']) ? $soapData['soap_sale'] : $soapData['soap_cost'];
                $priceColor = isset($soapData['soap_sale']) ? 'red' : 'black';
                $displayCost = isset($soapData['soap_sale']) ? "<del style=\"color: black;\">{$soapData['soap_cost']}€</del><b> " : '';
    
                echo "
                    <div id=\"soap_$soapId\">
                        <div>
                            <img src=\"../../images/soap_images/{$soapData['soap_id']}A.jpg\" alt=\"Product Photo\">
                        </div>
                        <div>
                            <p><b>{$soapData['soap_name']}</b></p>
                            <p>{$displayCost}<span style=\"color: $priceColor;\">{$priceToShow}€</b></span></p>
                        </div>
                        <button class=\"view\" onclick=\"redirectToSoap($soapId)\">Подробнее</button>
                    </div>
                ";
            }
        } else {
            echo "Фаворитов не найдено";
        }

        $connect->close();
        ?>
    </section>

    <?php
    require '../../config/connect.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $sqlCategories = "SELECT DISTINCT rc.category_id, rc.category_name, rc.category_order
        FROM ru_categories rc
        NATURAL JOIN soap_categories sc
        NATURAL JOIN soap s
        WHERE s.soap_id < 1000
        ORDER BY rc.category_order ASC";
    $resultCategories = $connect->query($sqlCategories);

    if ($resultCategories) {
        while ($rowCategory = $resultCategories->fetch_assoc()) {
            $categoryId = $rowCategory["category_id"];
            $categoryName = $rowCategory["category_name"];
            echo '<div id="section-title">';
            echo '<p>' . $categoryName . '</p>';
            echo '</div>';

            $sqlSoaps = "SELECT s.soap_id
                FROM soap_categories sc
                JOIN soap s ON sc.soap_id = s.soap_id
                JOIN ru_categories c ON sc.category_id = c.category_id
                WHERE c.category_id = '$categoryId' AND s.is_visible = 1
                ORDER BY soap_id DESC";

            $resultSoaps = $connect->query($sqlSoaps);

            if ($resultSoaps) {
                if ($resultSoaps->num_rows > 0) {
                    echo '<section id="content">';
                    while ($rowSoap = $resultSoaps->fetch_assoc()) {
                        $soapId = $rowSoap['soap_id'];

                        $soapSql = "SELECT * FROM soap WHERE soap_id = $soapId";
                        $soapResult = $connect->query($soapSql);
                        $soapData = $soapResult->fetch_assoc();

                        $priceToShow = isset($soapData['soap_sale']) ? $soapData['soap_sale'] : $soapData['soap_cost'];
                        $priceColor = isset($soapData['soap_sale']) ? 'red' : 'black';
                        $displayCost = isset($soapData['soap_sale']) ? "<del style=\"color: black;\">{$soapData['soap_cost']}€</del><b> " : '';

                        echo "
                            <div id=\"soap_$soapId\">
                                <div>
                                    <img src=\"../../images/soap_images/{$soapData['soap_id']}A.jpg\" alt=\"Product Photo\">
                                </div>
                                <div>
                                    <p><b>{$soapData['soap_name']}</b></p>
                                    <p>{$displayCost}<span style=\"color: $priceColor;\">{$priceToShow}€</b></span></p>
                                </div>

                                <button class=\"view\" onclick=\"redirectToSoap($soapId)\">Подробнее</button>
                            </div>
                        ";
                    }
                    echo '</section>';
                } else {
                    echo "<section id=\"content\">Категория не содержит товаров.</section>";
                }
            } else {
                echo "Ошибка запроса: " . mysqli_error($connect);
            }
        }
    } else {
        echo "Сезонное мыло отсутствует. " . mysqli_error($connect);
    }

    $connect->close();
    ?>

    <!-- Main content section end. -->

    <section id="social-links">
        <a href="https://www.instagram.com/_bonitavita_" target="_blank">
            <img src="../../images/inst-icon.png" alt="Instagram" class="social-icon">
        </a>
        <a href="mailto:bonitavita03@gmail.com">
            <img src="../../images/mail-icon.png" alt="Mail" class="social-icon">
        </a>
    </section>

    <script src="../../files/script.js"></script>

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
