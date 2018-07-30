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
    <title>Добавить заказ</title>
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
            <p>Заказ успешно добавлен!</p>
                <a href="../index.php"> На главную </a>
            <?php

            } else {
                ?>

                <div id="form">

                    <form action="../php/addition.php" method="post">
                        <p>Клиент:</p><br>
                        <input class="form1" type="text" name="name" placeholder="Имя клиента" required> <br>
                        <input class="form1" type="text" name="surname" placeholder="Фамилия клиента" required> <br>
                        <input class="form1" type="text" name="patronymic" placeholder="Отчество клиента" required> <br>
                        <input class="form1" type="tel" name="phone" placeholder="Телефон клиента" required> <br> <br>
                        <p>Услуга:</p><br>
                        <?php
                        include("../include/servise_var.php");
                        ?>
                        <p>Фотограф:</p><br>
                        <?php
                        include("../include/photographer_var.php");
                        ?>

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