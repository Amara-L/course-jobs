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
    <title>Добавить ребенка</title>
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
            <p>Ребенок добавлен!</p>
                <a href="../index.php"> На главную </a>
            <?php

            } else {
                ?>

                <div id="form">

                    <form action="../php/addition.php" method="post">
                        <p>Ребенок:</p>
                        <input class="form1" type="text" name="name" placeholder="Имя" required> <br>
                        <input class="form1" type="text" name="surname" placeholder="Фамилия" required> <br>
                        <input class="form1" type="text" name="patronymic" placeholder="Отчество" required> <br>
                        <p>Родитель:</p>
                        <input class="form1" type="text" name="name2" placeholder="Имя" required> <br>
                        <input class="form1" type="text" name="surname2" placeholder="Фамилия" required> <br>
                        <input class="form1" type="text" name="patronymic2" placeholder="Отчество" required> <br>
                        <input class="form1" type="tel" name="phone" placeholder="Телефон" required> <br> <br>
                        <input class="form1" type="tel" name="adres" placeholder="Адрес" required> <br> <br>
                        <p>Группа:</p>
                        <?php
                        include("../include/grup.php");
                        ?><br /><br /><br />


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