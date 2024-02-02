<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="soap_files/style.css">
    <title>BonitaVita</title>
</head>
<body>    
    <header id="menu">
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
            <div class="site-info">
                <p>BonitaVita</p>
            </div>
        </div>
        <nav>
            <div class="desktop-menu">
                <ul>
                    <li><a href="./">Главная</a></li>     
                    <li><a href="novelties/">Новинки</a></li>
                    <li><a href="assortment/">Ассортимент</a></li>
                    <li><a href="create/">Создать мыло</a></li>
                    <li><a href="contacts/">Контакты</a></li>
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
                </ul>
            </div>
        </nav>
    </header>
    <?php
    require_once 'config/connect.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    if (isset($_GET['soapId'])) {
        $soapId = $_GET['soapId'];

        $soapSql = "SELECT * FROM soap WHERE soap_id = ?";
        $stmt = $connect->prepare($soapSql);
        $stmt->bind_param("i", $soapId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $soapData = $result->fetch_assoc();

            $ingredientSql = "SELECT ingredient FROM ingredients WHERE soap_id = ?";
            $ingredientStmt = $connect->prepare($ingredientSql);
            $ingredientStmt->bind_param("i", $soapId);
            $ingredientStmt->execute();
            $ingredientResult = $ingredientStmt->get_result();
            
            $ingredients = [];
            while ($ingredientRow = $ingredientResult->fetch_assoc()) {
                $ingredients[] = $ingredientRow['ingredient'];
            }

            echo "
            <div id=\"text-box\">
                <p>{$soapData['soap_name']}</p>
            </div>
            <section id=\"content\">
                    <div class=\"image-carousel\">";
                    $imageAlphabet = range('A', 'Z');
                    foreach ($imageAlphabet as $letter) {
                        $imagePath = "images/soap_images/{$soapData['soap_id']}{$letter}.jpg";
                        if (file_exists($imagePath)) {
                            echo "<img class=\"carousel-image\" src=\"$imagePath\" alt=\"Soap Image\">";
                        }
                    }
                    echo "</div>
                    <div class=\"product-details\">
                        <p><b>Номер: </b>{$soapData['soap_id']}</p>
                        <p><b>Название: </b>{$soapData['soap_name']}</p>
                        <p><b>Цена: </b>{$soapData['soap_cost']}€</p>
                        <p><b>Вес: </b>{$soapData['soap_weight']} г</p>
                        <p><b>Ингредиенты: </b>" . implode(", ", $ingredients) . "</p>
                    </div>
            </section>
            ";
        } else {
            echo "Soap details not found.";
        }

        $stmt->close();
        $ingredientStmt->close();
    } else {
        echo "Invalid request.";
    }

    $connect->close();
    ?>

    <section id="social-links">
        <a href="https://www.instagram.com/_bonitavita_" target="_blank">
            <img src="images/inst-icon.png" alt="Instagram" class="social-icon">
        </a>
        <a href="mailto:bonitavita03@gmail.com">
            <img src="images/mail-icon.png" alt="Mail" class="social-icon">
        </a>
    </section>

    <script src="soap_files/script.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $(document).ready(function(){
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