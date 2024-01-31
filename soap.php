<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="index_files/style.css">
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
                    <li><a href="">Главная</a></li>     
                    <li><a href="novelties/">Новинки</a></li>
                    <li><a href="assortment/">Ассортимент</a></li>
                    <li><a href="create/">Создать мыло</a></li>
                    <li><a href="contacts/">Контакты</a></li>
                </ul>
            </div>
            <div class="mobile-menu">
                <button id="mobile-menu-button">&#9776; Меню</button>
                <ul>
                    <li><a href="">Главная</a></li>     
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

    // Use prepared statement to prevent SQL injection
    $soapSql = "SELECT * FROM soap WHERE soap_id = ?";
    $stmt = $connect->prepare($soapSql);
    $stmt->bind_param("i", $soapId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $soapData = $result->fetch_assoc();

        // Fetch ingredients using a separate query
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
            <div>
                <div>
                    <img src=\"images/soap_images/{$soapData['soap_id']}A.jpg\" alt=\"Product Photo\">
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

    

    <script src="index_files/script.js"></script>

</body>
</html>