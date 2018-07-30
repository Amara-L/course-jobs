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
    <title>Добавить сад</title>
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
            <p>Cад успешно добавлен!</p>
                <a href="../index.php"> На главную </a>
            <?php

            } else {
                ?>

                <div id="form">

                    <form action="../php/addition.php" method="post">
                        <input class="form1" type="text" name="name" placeholder="Название" required> <br>
                        <p>Деревья:</p>
                        <?php
                        include("../include/tree_var.php");
                        ?><br />
                        <p>Кустарники:</p>
                        <?php
                        include("../include/shru_var.php");
                        ?>
                        <p>Площадь:</p>
                        <?php
                        include("../include/area_var.php");
                        ?>
                        <p>Садовод:</p>
                        <?php
                        include("../include/svod_var.php");
                        ?> <br> <br>

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