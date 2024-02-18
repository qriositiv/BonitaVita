        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="../../images/logo.png" type="logo">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;700&display=swap">
            <link rel="stylesheet" href="../../files/style.css">
            <link rel="stylesheet" href="temp.css">
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

                <form action="prove-order.php" method="post">

                    <h2>Формы</h2>
                    <?php
                            require('../../config/second-connect.php');

                            if (!$connect) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $query = "SELECT element_id, element_name, element_description
                                    FROM elements
                                    WHERE element_id > 1000 AND element_id < 2000
                                    ORDER BY element_id ASC";
                            $result = mysqli_query($connect, $query);

                            if (!$result) {
                                die("Query failed: " . mysqli_error($connect));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="element" style="display: inline-block; margin: 10px;"><label class="item" id="checkboxLabel' . $row['element_id'] . '">';
                                echo '<input type="checkbox" class="styled-checkbox" name="selected_others[]" value="' . $row['element_id'] . '" onclick="handleCheckboxClick(event)">';
                                echo '<div class="item-content">';
                                echo '<img src="../../images/elements/' . $row['element_id'] . '.jpg" alt="ID' . $row['other_id'] . '">';
                                echo '<p>' . $row['element_name'] . '</p>';
                                echo '<div class="info-icon" style="margin-bottom: -10px;" onclick="showPopup(\'popupContent' . $row['element_id'] . '\')"><img style="max-width: 20px; margin: 2px auto;" src="../../images/info-icon.png" alt="Info Icon"></div>';
                                echo '</div>';
                                echo '<div class="popup-content" id="popupContent' . $row['element_id'] . '">';
                                echo '<p>' . $row['element_description'] . '</p>';
                                echo '</div>';
                                echo '</label></div>';
                            }  

                            mysqli_close($connect);
                            ?>
                    <h2>Цвета</h2>
                    <?php
                            require('../../config/second-connect.php');

                            if (!$connect) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $query = "SELECT element_id, element_name, element_description
                                    FROM elements
                                    WHERE element_id > 2000 AND element_id < 3000
                                    ORDER BY element_id ASC";
                            $result = mysqli_query($connect, $query);

                            if (!$result) {
                                die("Query failed: " . mysqli_error($connect));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="element" style="display: inline-block; margin: 10px;"><label class="item" id="checkboxLabel' . $row['element_id'] . '">';
                                echo '<input type="checkbox" class="styled-checkbox" name="selected_others[]" value="' . $row['element_id'] . '" onclick="handleCheckboxClick(event)">';
                                echo '<div class="item-content">';
                                echo '<img src="../../images/elements/' . $row['element_id'] . '.jpg" alt="ID' . $row['other_id'] . '">';
                                echo '<p>' . $row['element_name'] . '</p>';
                                echo '<div class="info-icon" style="margin-bottom: -10px;" onclick="showPopup(\'popupContent' . $row['element_id'] . '\')"><img style="max-width: 20px; margin: 2px auto;" src="../../images/info-icon.png" alt="Info Icon"></div>';
                                echo '</div>';
                                echo '<div class="popup-content" id="popupContent' . $row['element_id'] . '">';
                                echo '<p>' . $row['element_description'] . '</p>';
                                echo '</div>';
                                echo '</label></div>';
                            }  

                            mysqli_close($connect);
                            ?>
                    <h2>Запахи</h2>
                    <?php
                            require('../../config/second-connect.php');

                            if (!$connect) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $query = "SELECT element_id, element_name, element_description
                                    FROM elements
                                    WHERE element_id > 3000 AND element_id < 4000
                                    ORDER BY element_id ASC";
                            $result = mysqli_query($connect, $query);

                            if (!$result) {
                                die("Query failed: " . mysqli_error($connect));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="element" style="display: inline-block; margin: 10px;"><label class="item" id="checkboxLabel' . $row['element_id'] . '">';
                                echo '<input type="checkbox" class="styled-checkbox" name="selected_others[]" value="' . $row['element_id'] . '" onclick="handleCheckboxClick(event)">';
                                echo '<div class="item-content">';
                                echo '<img src="../../images/elements/' . $row['element_id'] . '.jpg" alt="ID' . $row['other_id'] . '">';
                                echo '<p>' . $row['element_name'] . '</p>';
                                echo '<div class="info-icon" style="margin-bottom: -10px;" onclick="showPopup(\'popupContent' . $row['element_id'] . '\')"><img style="max-width: 20px; margin: 2px auto;" src="../../images/info-icon.png" alt="Info Icon"></div>';
                                echo '</div>';
                                echo '<div class="popup-content" id="popupContent' . $row['element_id'] . '">';
                                echo '<p>' . $row['element_description'] . '</p>';
                                echo '</div>';
                                echo '</label></div>';
                            }  

                            mysqli_close($connect);
                            ?>

                    <h2>Травы</h2>
                    <?php
                            require('../../config/second-connect.php');

                            if (!$connect) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $query = "SELECT element_id, element_name, element_description
                                    FROM elements
                                    WHERE element_id > 4000 AND element_id < 5000
                                    ORDER BY element_id ASC";
                            $result = mysqli_query($connect, $query);

                            if (!$result) {
                                die("Query failed: " . mysqli_error($connect));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="element" style="display: inline-block; margin: 10px;"><label class="item" id="checkboxLabel' . $row['element_id'] . '">';
                                echo '<input type="checkbox" class="styled-checkbox" name="selected_others[]" value="' . $row['element_id'] . '" onclick="handleCheckboxClick(event)">';
                                echo '<div class="item-content">';
                                echo '<img src="../../images/elements/' . $row['element_id'] . '.jpg" alt="ID' . $row['other_id'] . '">';
                                echo '<p>' . $row['element_name'] . '</p>';
                                echo '<div class="info-icon" style="margin-bottom: -10px;" onclick="showPopup(\'popupContent' . $row['element_id'] . '\')"><img style="max-width: 20px; margin: 2px auto;" src="../../images/info-icon.png" alt="Info Icon"></div>';
                                echo '</div>';
                                echo '<div class="popup-content" id="popupContent' . $row['element_id'] . '">';
                                echo '<p>' . $row['element_description'] . '</p>';
                                echo '</div>';
                                echo '</label></div>';
                            }  

                            mysqli_close($connect);
                            ?>
                    <h2>Масла</h2>
                    <?php
                            require('../../config/second-connect.php');

                            if (!$connect) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $query = "SELECT element_id, element_name, element_description
                                    FROM elements
                                    WHERE element_id > 5000 AND element_id < 6000
                                    ORDER BY element_id ASC";
                            $result = mysqli_query($connect, $query);

                            if (!$result) {
                                die("Query failed: " . mysqli_error($connect));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="element" style="display: inline-block; margin: 10px;"><label class="item" id="checkboxLabel' . $row['element_id'] . '">';
                                echo '<input type="checkbox" class="styled-checkbox" name="selected_others[]" value="' . $row['element_id'] . '" onclick="handleCheckboxClick(event)">';
                                echo '<div class="item-content">';
                                echo '<img src="../../images/elements/' . $row['element_id'] . '.jpg" alt="ID' . $row['other_id'] . '">';
                                echo '<p>' . $row['element_name'] . '</p>';
                                echo '<div class="info-icon" style="margin-bottom: -10px;" onclick="showPopup(\'popupContent' . $row['element_id'] . '\')"><img style="max-width: 20px; margin: 2px auto;" src="../../images/info-icon.png" alt="Info Icon"></div>';
                                echo '</div>';
                                echo '<div class="popup-content" id="popupContent' . $row['element_id'] . '">';
                                echo '<p>' . $row['element_description'] . '</p>';
                                echo '</div>';
                                echo '</label></div>';
                            }  

                            mysqli_close($connect);
                            ?>
                    <h2>Доролнительно</h2>
                    <?php
                            require('../../config/second-connect.php');

                            if (!$connect) {
                                die("Connection failed: " . mysqli_connect_error());
                            }

                            $query = "SELECT element_id, element_name, element_description
                                    FROM elements
                                    WHERE element_id > 6000 AND element_id < 7000
                                    ORDER BY element_id ASC";
                            $result = mysqli_query($connect, $query);

                            if (!$result) {
                                die("Query failed: " . mysqli_error($connect));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="element" style="display: inline-block; margin: 10px;"><label class="item" id="checkboxLabel' . $row['element_id'] . '">';
                                echo '<input type="checkbox" class="styled-checkbox" name="selected_others[]" value="' . $row['element_id'] . '" onclick="handleCheckboxClick(event)">';
                                echo '<div class="item-content">';
                                echo '<img src="../../images/elements/' . $row['element_id'] . '.jpg" alt="ID' . $row['other_id'] . '">';
                                echo '<p>' . $row['element_name'] . '</p>';
                                echo '<div class="info-icon" style="margin-bottom: -10px;" onclick="showPopup(\'popupContent' . $row['element_id'] . '\')"><img style="max-width: 20px; margin: 2px auto;" src="../../images/info-icon.png" alt="Info Icon"></div>';
                                echo '</div>';
                                echo '<div class="popup-content" id="popupContent' . $row['element_id'] . '">';
                                echo '<p>' . $row['element_description'] . '</p>';
                                echo '</div>';
                                echo '</label></div>';
                            }  

                            mysqli_close($connect);
                            ?>
                    <h2>Особые пожелания</h2>
                    <label for="message">Здесь можно написать свои особые пожелания и уточнения. <br> Например: <br></label>
                    <textarea id="message" name="message" required autocomplete="off"></textarea>
                    <label for="phone"><br>Введите номер телефона <br></label>
                    <input type="text" id="phone" name="phone" required autocomplete="off"><br>
                
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

        function showPopup(popupId) {
            var popupContent = document.getElementById(popupId);
            if (popupContent.style.display === "none" || popupContent.style.display === "") {
                popupContent.style.display = "block";
            } else {
                popupContent.style.display = "none";
            }
        }
            </script>

        </body>
        </html>
