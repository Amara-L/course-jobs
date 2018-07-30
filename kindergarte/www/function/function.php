<?php

//функция добавления заказа
function add_order()
{
global $link;

//добавляем в переменные
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $patronymic = $_POST['patronymic'];
    $name2 = $_POST['name2'];
    $surname2 = $_POST['surname2'];
    $patronymic2 = $_POST['patronymic2'];
    $phone = $_POST['phone'];
    $group = $_POST['group'];
    $adres = $_POST['adres'];

//echo 'r '.$salon.' '.$seller.' '.$mark.'r';

    //проверяем наличае родителя
    $n = 0;
    $sql = "SELECT id FROM parents WHERE name='$name2'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;
    $sql = "SELECT id FROM parents WHERE surname='$surname2'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;
    $sql = "SELECT id FROM parents WHERE patronymic='$patronymic2'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;
    $sql = "SELECT id FROM parents WHERE phone='$phone'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;

    if($n < 4) {
//добавляем родителя в таблицу
        $sql = "INSERT INTO `parents` (`name`, `surname`, `patronymic`, `phone`,`adress`)
    VALUES ('{$name2}','{$surname2}','{$patronymic2}','{$phone}', '$adres')";

        if (mysqli_query($link, $sql)) {
        } else {
            echo '1Ошибка<br/>';
        }
    }

//получаем id
    $idclient = 0;
        $sql =  "SELECT id FROM parents WHERE phone='$phone'";
        $result = mysqli_query($link, $sql);
        if ($result) {
            if (mysqli_num_rows($result) != 0) {
                $row = mysqli_fetch_array($result);
                $idclient = $row[id];
            }

    }


//заполняем таблицу

    $sql = "INSERT INTO `child`(`name`, `surname`, `patronymic`, `group`, `parents`) 
VALUES ('$name', '$surname', '$patronymic', '$group', '$idclient')

 ";

        if (mysqli_query($link, $sql)) {
        } else {
            echo '42Ошибка<br/>';
        }

        //узнаем id заказа
//    $sql =  "SELECT id FROM avto WHERE phone='$phone'";
//    $result = mysqli_query($link, $sql);
//    if ($result) {
//        if (mysqli_num_rows($result) != 0) {
//            $row = mysqli_fetch_array($result);
//            $idclient = $row[id];
//        }
//
//    }

    }


//функция поиска заказа
function sear_order() {
global $link;

    $idchild = $_POST['number'];
    $name = 0;
    $surname = 0;
    $patronymic = 0;
    $idgroup = 0;
    $idroom = 0;
    $idpar = 0;
    $idarea = 0;
    $ideducat = 0;

    $sql = "SELECT * FROM `child` WHERE id = '$idchild'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $surname = $row['surname'];
        $patronymic = $row['patronymic'];
        $idgroup = $row['group'];
        $idpar = $row['parents'];

//вывод
        if (!empty($idpar)){
    echo '
<div id="viv">
<table class="tab"> <tr> <th>Номер ребенка</th> <th>ФИО Ребенка</th> <th>ФИО Родителя</th> <th>Данные родителя</th> <th>Группа</th><th>Воспитатель</th> <th>Номер кабинета</th> <th>Закрепленная площадка</th></tr>  <tr> <td> ' . $idchild . ' </td><td> ' . $name . ' ' . $surname . ' ' . $patronymic . ' </td>
    ';

    $sql = "SELECT * FROM `parents` WHERE id = '$idpar'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        echo '
    <td>' .$row['name']. ' ' .$row['surname']. ' ' .$row['patronymic']. '</td><td>'.$row['adress']. ' ' .$row['phone'].'</td>
    ';
    }

            $sql = "SELECT * FROM `group` WHERE id = '$idgroup'";
            $result = mysqli_query($link, $sql);

            if ($result) {
                $row = mysqli_fetch_array($result);
                global $ideducat;
                $ideducat = $row['educators'];
                global $idarea;
                $idarea = $row['area'];
                global $idroom ;
                $idroom = $row['room'];
                echo '
<td>' .$row['name'].'</td>
    ';
            }

            global $ideducat;
            global $idarea;
            global $idroom ;
    $sql = "SELECT * FROM `educators` WHERE id = '$ideducat'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        echo '
<td>' .$row['name'].' ' .$row['surname'].' ' .$row['patronymic'].' ' .$row['phone'].'</td>
    ';
    }

            $sql = "SELECT * FROM `room` WHERE id = '$idroom'";
            $result = mysqli_query($link, $sql);

            if ($result) {
                $row = mysqli_fetch_array($result);
                echo '
    <td>№ ' .$row['numb'].' этаж ' .$row['floor'].'</td>
    ';
            }

            $sql = "SELECT * FROM `area` WHERE id = '$idarea'";
            $result = mysqli_query($link, $sql);

            if ($result) {
                $row = mysqli_fetch_array($result);
                echo '
<td>' .$row['place'].' Составляющие:' .$row['inventory'].'</td>
    ';
            }

} else echo '<br><p>Ребенок с таким номером отсутствует!</p>';
    } else echo 'Ошибка!';

}

function printorder()
{

    global $link;

    $sql = "SELECT * FROM `child` WHERE 1";
    $result = mysqli_query($link, $sql);
    echo '
<div id="">
<a href="../index.php"> На главную </a> <br> <br> <br> <table class="tab"> <tr> <th>Номер ребенка</th> <th>ФИ Ребенка</th> <th>Группа</th> <th>Воспитатель</th>  </tr>  <tr> 
    ';
    if ($result) {

        while ($row = mysqli_fetch_array($result)) {
            echo '
<td>' . $row['id'] . '</td>

';
            $name = $row['name'];
            $surname = $row['surname'];
            $idgroup = $row['group'];


            $sql1 = "SELECT * FROM `group` WHERE id = '$idgroup'";
            $result1 = mysqli_query($link, $sql1);
            $row1 = mysqli_fetch_array($result1);
            $idedu = $row1['educators'];
            echo '
               <td>' . $surname . ' ' . $name . '</td> <td>' . $row1['name'] . '</td>
';

            $sql2 = "SELECT * FROM `educators` WHERE id = '$idedu'";
            $result2 = mysqli_query($link, $sql2);
            $row2 = mysqli_fetch_array($result2);
            echo '
                <td>'  . $row2['surname'] . ' ' . $row2['name'] .  ' ' . $row2['patronymic'] . '</td></tr>
';


        }


        echo '
</table></div> <br> <a href="../index.php"> На главную </a>
';

    }
}

