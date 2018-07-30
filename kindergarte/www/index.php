<!--Главная страница-->
<!DOCTYPE html>
<html>
<head>
    <!--Присоединяем стили-->
    <link rel="stylesheet" type="text/css" href="css/style.css?r=<?= time(); ?>" >
    <title>Детский сад</title>
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
                <a href='php/addition.php'>Добавить ребенка</a><br />
                <a href='php/search.php'>Вывести информацию о ребенке</a><br />
                <a href='php/print.php'>Вывести список всех детей</a><br />
        </div>


        </center>

    </section>

    <!--Присоединяем подвал-->
    <?php
    include("include/footer.php");
    ?>

</div>
</body>
</html>