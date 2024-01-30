<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="categories_files/style.css">
    <title>[Admin] BonitaVita</title>
</head>
<body>    
    <header id="menu">
        <div class="logo">
            <img src="../general_images/logo.png" alt="Logo">
            <div class="site-info">
                <p>BonitaVita</p>
            </div>
        </div>
        <nav>
          <div class="desktop-menu">
            <ul>
                <li><a href="manage.php">Мыло</a></li>     
                <li><a href="add.php">Добавить</a></li>
                <li><a href="ingredients.php">Ингредиенты</a></li>
                <li><a href="categories.php">Категории</a></li>
                <li><a href="logout.php">Выйти</a></li>
            </ul>
        </div>
        </nav>
    </header>
    <div id="text-box">
        <p>Категории</p>
    </div>
    <section id="content">
        
        <?php
        require_once 'config/connect.php';

        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $sql = "SELECT DISTINCT category FROM category WHERE soap_id = -1";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $currentCategory = $row['category'];
                echo "<section id='categoty'>
                        <p>$currentCategory</p>
                        <button class='edit'>✏️</button>
                        <button class='delete'>✖️</button>
                    </section>";
            }
        } else {
            echo "No Categories found";
        }

        $connect->close();
        ?>

        <hr><h4>Добавить категорию</h4>
        <form id="addCategoryForm" action="vendor/add_category.php" method="post">
            <input type="text" id="category" name="category" required>
            <button type="submit">Подтвердить</button>
        </form>

    </section>
    
</body>
</html>
