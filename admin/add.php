<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="add_files/style.css">
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
        <p>Добавить мыло</p>
    </div>
    <section id="content">
        <form id="soapForm" action="vendor/add_soap.php" method="post" enctype="multipart/form-data">
            <label for="soapId">Номер:</label>
            <input type="text" id="soapId" name="soapId" required>

            <label for="name">Название:</label>
            <input type="text" id="name" name="name" required>

            <label for="cost">Цена:</label>
            <input type="text" id="cost" name="cost" required>

            <label for="weight">Вес:</label>
            <input type="text" id="weight" name="weight" required>

            <label for="photo" id="file-label">Добавить фотографию</label>
            <input type="file" id="photo" name="photo" accept="image/jpeg, image/png">
            <div id="file-names"></div>

            <hr><label for="ingredients">Ингредиенты</label>
            <?php

            require_once 'config/connect.php';
    
            if ($connect->connect_error) {
                die("Connection failed: " . $connect->connect_error);
            }

            $sql = "SELECT ingredient FROM ingredients WHERE soap_id = -1";
            $result = $connect->query($sql);

            while ($row = $result->fetch_assoc()) {
                $currentIngredient = $row['ingredient'];
                echo '<input type="checkbox" name="ingredients[]" value="' . $currentIngredient . '"> ' . $currentIngredient . '<br>';
            }

            $connect->close();
            ?>
            <p>Не хватает ингредиентов?<br><a href="ingredients.php">Добавь здесь.</a></p>

            <hr><label for="categories">Категории</label>
            <p>Нужна новая категория?<br><a href="categories.php">Добавь здесь.</a></p>

            <hr><input type="checkbox" id="public" name="visibility" value="public">
            <label for="public">Добавить в "Новинки"</label>

            <br><button type="submit">Подтвердить</button>
        </form>
    </section>

    <script>
        document.getElementById('photo').addEventListener('change', function () {
            var files = this.files;
            var fileNames = '';
    
            for (var i = 0; i < files.length; i++) {
                fileNames += files[i].name + '<br>';
            }
    
            document.getElementById('file-names').innerHTML = fileNames;
        });
    </script>
    
</body>
</html>
