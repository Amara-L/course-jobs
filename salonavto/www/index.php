<!--Главная страница-->
<!DOCTYPE html>
<html>
<head>
    <!--Присоединяем стили-->
    <link rel="stylesheet" type="text/css" href="css/style.css?r=<?= time(); ?>" >
    <title>БД Салона поддержаных автомобилей</title>
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


<div id="glav">
                <a href='php/addition.php'>Добавить автомобиль</a><br />
                <a href='php/search.php'>Найти автомобиль</a><br />
                <a href='php/print.php'>Вывести список автомобилей</a><br />
        </div>

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