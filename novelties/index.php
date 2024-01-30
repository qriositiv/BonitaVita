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
            <img src="general_images/logo.png" alt="Logo">
            <div class="site-info">
                <p>BonitaVita</p>
            </div>
        </div>
        <nav>
          <div class="desktop-menu">
            <ul>
                <li><a href="../">Главная</a></li>     
                <li><a href="">Новинки</a></li>
                <li><a href="../assortment/">Ассортимент</a></li>
                <li><a href="../create/">Создать мыло</a></li>
                <li><a href="../contacts/">Контакты</a></li>
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
                        <div>
                            <div>
                                <img src=\"manage_files/images/soap1.jpg\" alt=\"Product Photo\">
                            </div>
                            <div>
                                <p><b>Номер: </b>{$soapData['soap_id']}</p>
                                <p><b>Название: </b>{$soapData['soap_name']}</p>
                                <p><b>Цена: </b>{$soapData['soap_cost']}€</p>
                                <p><b>Вес: </b>{$soapData['soap_weight']} g</p>
                            </div>
                            
                            <div>
                                <p><b>Ингредиенты: </b>" . implode(", ", $ingredients) . "</p>
                                <p><b>Категории: </b>" . implode(", ", $categories) . "</p>
                            </div>
                            <button class=\"view\">Подробнее</button>
                        </div>
                    ";
            }
        } else {
            echo "Новинок не найдено";
        }

        $connect->close();
        ?>
    </section>
</body>
</html>
