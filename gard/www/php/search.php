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
    <title>Информация о саде</title>
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


            if(!empty($_POST['number'])){
                sear_order();
                ?> <a href="../index.php"> На главную </a> <?php
            } else {

                ?>

                <div id="form">

                    <form action="../php/search.php" method="post">
                        <p>Введите код сада:</p><br>
                        <input type="number" name="number" placeholder="Код сада" required> <br><br>


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