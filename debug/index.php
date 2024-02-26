<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/green-logo.png" type="logo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="../files/style.css">
    <link rel="stylesheet" href="../files/novelties_files/style.css">
    <title>BonitaVita Debug</title>
</head>
<body>    
    <header id="menu">
        <div class="logo">
            <img src="../images/green-logo.png" alt="Logo">
            <div class="site-info">
                <p>BonitaVita</p>
            </div>
        </div>
        <nav>
            <div class="desktop-menu">
                <ul>
                    <li><a href="../ru/">Главная</a></li>     
                    <li><a href="https://va-love.site/">VA-love.site</a></li>
                </ul>
            </div>
            <div class="mobile-menu">
                <button id="mobile-menu-button">&#9776; Меню</button>
                <ul>
                    <li><a href="../ru/">Главная</a></li>     
                    <li><a href="https://va-love.site/">VA-love.site</a></li>                 
                </ul>
            </div>
        </nav>
    </header>
    <div id="text-box">
        <p>Список всех мыл</p>
    </div>

    <!-- Main content section begin. -->

    <section id="content">
    
    <?php
    require_once '../config/connect.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $sql = "SELECT DISTINCT soap_id
        FROM soap
        ORDER BY soap_id DESC";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $soapId = $row['soap_id'];

            $soapSql = "SELECT * FROM soap WHERE soap_id = $soapId";
            $soapResult = $connect->query($soapSql);
            $soapData = $soapResult->fetch_assoc();

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
        echo "Мыло не найдено";
    }

    $connect->close();
    ?>

    </section>

    <!-- Main content section end. -->

    <section id="social-links">
        <a href="https://www.instagram.com/_bonitavita_" target="_blank">
            <img src="../../images/inst-icon.png" alt="Instagram" class="social-icon">
        </a>
        <a href="mailto:bonitavita03@gmail.com">
            <img src="../../images/mail-icon.png" alt="Mail" class="social-icon">
        </a>
    </section>

    <script src="../files/script.js"></script>

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
