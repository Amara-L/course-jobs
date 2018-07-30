<!--Главная страница-->
<!DOCTYPE html>
<html>
<head>
    <!--Присоединяем стили-->
    <link rel="stylesheet" type="text/css" href="css/style.css?r=<?= time(); ?>" >
    <title>Сад</title>
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
                <a href='php/addition.php'>Добавить сад</a><br />
                <a href='php/search.php'>Получить информацию по саду</a><br />
                <a href='php/print.php'>Все сады</a><br />
        </div>

<!--            -->
        </center>

    </section>

    <!--Присоединяем подвал-->
    <?php
    include("include/footer.php");
    ?>

</div>
</body>
</html>