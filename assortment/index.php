<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="assortment_files/style.css">
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
                    <li><a href="">Ассортимент</a></li>
                    <li><a href="../create/">Создать мыло</a></li>
                    <li><a href="../contacts/">Контакты</a></li>
                </ul>
            </div>
            <div class="mobile-menu">
                <button id="mobile-menu-button">&#9776; Меню</button>
                <ul>
                    <li><a href="../">Главная</a></li>     
                    <li><a href="../novelties/">Новинки</a></li>
                    <li><a href="">Ассортимент</a></li>
                    <li><a href="../create/">Создать мыло</a></li>
                    <li><a href="../contacts/">Контакты</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div id="text-box">
        <p>Ассортимент</p>
    </div>
    <div id="section-title">
        <p>Фавориты</p>
    </div>
    <section id="content">
    <?php
        require '../config/connect.php';

        error_reporting(E_ALL);
        ini_set('display_errors', 1);    

        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "SELECT DISTINCT soap_id FROM soap";
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
                                <p><b>Номер: </b>{$soapData['soap_id']}</p>
                                <p><b>Название: </b>{$soapData['soap_name']}</p>
                                <p><b>Цена: </b>{$soapData['soap_cost']}€</p>
                                <p><b>Вес: </b>{$soapData['soap_weight']} g</p>
                            </div>
                            
                            <div>
                                <p><b>Ингредиенты: </b>" . implode(", ", $ingredients) . "</p>
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

    <?php
    require '../config/connect.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    $sqlCategories = "SELECT DISTINCT category FROM category";
    $resultCategories = $connect->query($sqlCategories);

    if ($resultCategories->num_rows > 0) {
        while ($rowCategory = $resultCategories->fetch_assoc()) {
            $category = $rowCategory["category"];
            echo '<div id="section-title">';
            echo '<p>' . $category . '</p>';
            echo '</div>';

            $sqlSoaps = "SELECT DISTINCT s.soap_id
                FROM soap s
                JOIN category c ON s.soap_id = c.soap_id
                WHERE c.category = '$category'";

            $resultSoaps = $connect->query($sqlSoaps);

            if ($resultSoaps->num_rows > 0) {
                echo '<section id="content">';
                while ($rowSoap = $resultSoaps->fetch_assoc()) {
                    $soapId = $rowSoap['soap_id'];

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
                                <p>{$soapData['soap_name']}</p>
                                <p>{$soapData['soap_cost']}€</p>
                            </div>

                            <button class=\"view\" onclick=\"redirectToSoap($soapId)\">Подробнее</button>
                        </div>
                    ";
                }
                echo '</section>';
            } else {
                echo "Новинок не найдено";
            }
        }
    } else {
        echo "0 results";
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

    <script src="assortment_files/script.js"></script>

    <script>
        function redirectToSoap(soapId) {
            window.location.href = '../soap.php?soapId=' + soapId;
        }
    </script>

</body>
</html>
