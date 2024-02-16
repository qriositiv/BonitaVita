<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/logo.png" type="logo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="../../files/style.css">
    <link rel="stylesheet" href="../../files/create_files/style.css">
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
                            <li><a href="../../ru/create/">Русский</a></li>
                            <li><a href="../../lt/create/">Lietuvių</a></li>
                            <li><a href="../../en/create/">English</a></li>
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
                        <a href="../../ru/create/" style="margin-right: 10px;">RU</a>
                        <a href="../../lt/create/" style="margin-right: 10px;">LT</a>
                        <a href="../../en/create/" style="margin-right: 10px;">EN</a>
                    </li>                    
                </ul>
            </div>
        </nav>
    </header>
    <div id="text-box">
        <p>Создать своё мыло</p>
    </div>

    <!-- Main content section begin. -->

    <section id="content">
        <p>Пользуйся своей фантазией по полной! Создай свой собственный дизайн мыла и выбери любые компоненты для него!</p>

        <!-- Spoiler A -->
        <div class="spoiler" onclick="toggleSpoiler('spoilerA', 'spoilerTitleA')">
            <h2>Формочки</h2>
            <p class="spoiler-title" id="spoilerTitleA" style="margin-top: -50px; font-size: 24px;">Клик, чтобы открыть</p>
            <div class="spoiler-content" id="spoilerA" style="display: none;">
                <p>Фотографии формочек</p>
            </div>
        </div>

        <!-- Spoiler B -->
        <div class="spoiler" onclick="toggleSpoiler('spoilerB', 'spoilerTitleB')">
            <h2>Цвета</h2>
            <p class="spoiler-title" id="spoilerTitleB" style="margin-top: -50px; font-size: 24px;">Клик, чтобы открыть</p>
            <div class="spoiler-content" id="spoilerB" style="display: none;">
                <p>Цвета</p>
            </div>
        </div>

        <!-- Spoiler C -->
        <div class="spoiler" onclick="toggleSpoiler('spoilerC', 'spoilerTitleC')">
            <h2>Запахи</h2>
            <p class="spoiler-title" id="spoilerTitleC" style="margin-top: -50px; font-size: 24px;">Клик, чтобы открыть</p>
            <div class="spoiler-content" id="spoilerC" style="display: none;">
                <p>Запахи</p>
            </div>
        </div>

        <!-- Spoiler D -->
        <div class="spoiler" onclick="toggleSpoiler('spoilerD', 'spoilerTitleD')">
            <h2>Травы</h2>
            <p class="spoiler-title" id="spoilerTitleD" style="margin-top: -50px; font-size: 24px;">Клик, чтобы открыть</p>
            <div class="spoiler-content" id="spoilerD" style="display: none;">
                <p>Травы</p>
            </div>
        </div>

        <!-- Spoiler E -->
        <div class="spoiler" onclick="toggleSpoiler('spoilerE', 'spoilerTitleE')">
            <h2>Масла</h2>
            <p class="spoiler-title" id="spoilerTitleE" style="margin-top: -50px; font-size: 24px;">Клик, чтобы открыть</p>
            <div class="spoiler-content" id="spoilerE" style="display: none;">
                <p>Масла</p>
            </div>
        </div>

        <!-- Spoiler F -->
        <div class="spoiler" onclick="toggleSpoiler('spoilerF', 'spoilerTitleF')">
            <h2>Дополнительно</h2>
            <p class="spoiler-title" id="spoilerTitleF" style="margin-top: -50px; font-size: 24px;">Клик, чтобы открыть</p>
            <div class="spoiler-content" id="spoilerF" style="display: none;">
                <div class="image-container">
                    <?php
                    require('../../config/second-connect.php');

                    if (!$connect) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
            
                    $query = "SELECT other_id, other_name, other_description FROM ru_other";
                    $result = mysqli_query($connect, $query);

                    if (!$result) {
                        die("Query failed: " . mysqli_error($connect));
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<label class="item" id="checkboxLabel' . $row['other_id'] . '">';
                        echo '<input type="checkbox" class="styled-checkbox" onclick="handleCheckboxClick(event)">';
                        echo '<div class="item-content">';
                        echo '<img src="../../images/' . $row['other_id'] . '.jpg" alt="Vita Image">';
                        echo '<p>' . $row['other_name'] . '</p>';
                        echo '<p>' . $row['other_description'] . '</p>';
                        echo '</div>';
                        echo '</label>';
                    }

                    mysqli_close($connect);
                    ?>
                </div>
            </div>
        </div>


        <form action="prove-order/" method="post">
            <button type="submit" class="submit">Далее</button>
        </form>

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

    <script src="../../files/script.js"></script>

    <script>
        function toggleLanguageMenu() {
        var languageMenu = document.getElementById("language-menu");
        languageMenu.style.display = (languageMenu.style.display === "block") ? "none" : "block";
    }

    function toggleSpoiler(spoilerId, spoilerTitleId) {
        var spoiler = document.getElementById(spoilerId);
        var spoilerTitle = document.getElementById(spoilerTitleId);

        if (spoiler.style.display === "none") {
            spoiler.style.display = "block";
            spoilerTitle.innerHTML = "Клик, чтобы закрыть";
        } else {
            spoiler.style.display = "none";
            spoilerTitle.innerHTML = "Клик, чтобы открыть";
        }
    }

    function handleCheckboxClick(event) {
    var checkboxLabel = event.target.closest('.item');

    if (checkboxLabel) {
        checkboxLabel.classList.toggle('checked', event.target.checked);
    }
}
    </script>

</body>
</html>
