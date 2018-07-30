<!--Главная страница-->
<!DOCTYPE html>
<html>
<head>
    <!--Присоединяем стили-->
    <link rel="stylesheet" type="text/css" href="css/style.css?r=<?= time(); ?>" >
    <title>Фотостудия</title>
</head>
<body>
<div id="block">
    <!--Присоединяем шапку-->
    <?php
    include("include/header.php");
    ?>

    <!--Основной блок-->
    <section>

        <center>

            <table>

                <tr><td><a href='php/addition.php'>Добавить заказ</a></td></tr>
                <tr><td><a href='php/search.php'>Найти заказ</a></td></tr>
                <tr><td><a href='php/print.php'>Вывести список заказов</a></td></tr>

            </table>
<!--            -->
<!--            <a href='php/addition.php'>Добавить заказ</a> <br>-->
<!--            <a href='php/search.php'>Найти заказ</a> <br>-->
<!--            <a href='php/print.php'>Вывести список заказов</a>-->
        </center>

    </section>

    <!--Присоединяем подвал-->
    <?php
    include("include/footer.php");
    ?>

</div>
</body>
</html>