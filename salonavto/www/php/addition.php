<?php
require_once('../config.php');
require_once('../function/function.php');
$link = mysqli_connect($hostname, $user, $pass, $db) or die("Не могу подключиться к базе данных! Причина:".mysqli_error($link));

?>
<!DOCTYPE html>
<html>
<head>
    <!--Присоединяем стили-->
    <link rel="stylesheet" type="text/css" href="../css/style.css?r=<?= time(); ?>" >
    <title>Добавить автомобиль</title>
</head>
<body>
<div id="block">
    <!--Присоединяем шапку-->
    <?php
    include("../include/header.php");
    ?>

    <!--Основной блок-->
    <section>

        <center>

            <?php
            if(!empty($_POST['name'])){
                add_order();

                ?>
            <p>Автомобиль успешно добавлен!</p>
                <a href="../index.php"> На главную </a>
            <?php

            } else {
                ?>

                <div id="form">

                    <form action="../php/addition.php" method="post">
                        <p>Владелец:</p>
                        <input class="form1" type="text" name="name" placeholder="Имя" required> <br>
                        <input class="form1" type="text" name="surname" placeholder="Фамилия" required> <br>
                        <input class="form1" type="text" name="patronymic" placeholder="Отчество" required> <br>
                        <input class="form1" type="tel" name="phone" placeholder="Телефон" required> <br> <br>
                        <p>Марка:</p>
                        <?php
                        include("../include/mark_var.php");
                        ?><br />
                        <input class="form1" type="text" name="model" placeholder="Модель" required> <br> <br>
                        <p>Салон:</p>
                        <?php
                        include("../include/salon_var.php");
                        ?>
                        <p>Консультант:</p>
                        <?php
                        include("../include/seller_var.php");
                        ?><br />
                        <p>Кузов:</p>
                        <?php
                        include("../include/carcase.php");
                        ?>
                        <br /><br />
                        <input class="form1" type="number" name="year" placeholder="Год выпуска" required> <br>
                        <p>Дата поступления:</p>
                        <input class="form1" type="date" name="data" placeholder="Дата поступления" required> <br>
                        <input class="form1" type="number" name="mile" placeholder="Пробег (км)" required> <br>
                        <input class="form1" type="text" name="v_dvig" placeholder="Объем двигателя (л)" required> <br>
                        <input class="form1" type="text" name="m_dvig" placeholder="Мощьность двигателя (л.с.)" required> <br>
                        <input class="form1" type="text" name="color" placeholder="Цвет" required> <br>
                        <input class="form1" type="number" name="prise" placeholder="Цена (руб.)" required> <br>
                        <p>Фото(если есть):</p>
                        <input class="form1" type="file" name="img" > <br><br>

                        <input type="submit" value="Отправить">

                    </form>

                </div>

                <?php
            }
            ?>


        </center>

    </section>

    <!--Присоединяем подвал-->
    <?php
    include("../include/footer.php");
    ?>

</div>
</body>
</html>