<?php

//функция добавления заказа
function add_order()
{
global $link;

//добавляем в переменные
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $patronymic = $_POST['patronymic'];
    $phone = $_POST['phone'];
    $mark = $_POST['mark'];
    $salon = $_POST['salon'];
    $seller = $_POST['seller'];
    $year = $_POST['year'];
    $mile = $_POST['mile'];
    $prise = $_POST['prise'];
    $img = $_POST['img'];
    $model = $_POST['model'];
    $v_dvig = $_POST['v_dvig'];
    $m_dvig = $_POST['m_dvig'];
    $carcase = $_POST['carcase'];
    $colorm = $_POST['color'];
    $data = $_POST['data'];
//echo 'r '.$salon.' '.$seller.' '.$mark.'r';

    //проверяем наличае клиента
    $n = 0;
    $sql = "SELECT id FROM owner WHERE name='$name'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;
    $sql = "SELECT id FROM owner WHERE surname='$surname'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;
    $sql = "SELECT id FROM owner WHERE patronymic='$patronymic'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;
    $sql = "SELECT id FROM owner WHERE phone='$phone'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;

    if($n < 4) {
//добавляем клиента в таблицу
        $sql = "INSERT INTO `owner` (`name`, `surname`, `patronymic`, `phone`)
    VALUES ('{$name}','{$surname}','{$patronymic}','{$phone}')";

        if (mysqli_query($link, $sql)) {
        } else {
            echo '1Ошибка<br/>';
        }
    }

//получаем id клиента
    $idclient = 0;
        $sql =  "SELECT id FROM owner WHERE phone='$phone'";
        $result = mysqli_query($link, $sql);
        if ($result) {
            if (mysqli_num_rows($result) != 0) {
                $row = mysqli_fetch_array($result);
                $idclient = $row[id];
            }

    }

    $idphoto = 0;
if (!empty($img)) {
    $sql = "INSERT INTO `photo` (`adress`, `description`)
    VALUES ('{$img}','Изображение')";

    if (mysqli_query($link, $sql)) {
    } else {
        echo '2Ошибка<br/>';
    }

    $sql = "SELECT MAX( `id` ) 
FROM `seller` ";
    if (mysqli_query($link, $sql)) {
        $idphoto = (int)mysqli_query($link, $sql);
//        echo $idphoto;
    } else {
        echo '3Ошибка<br/>';
    }
}
//заполняем таблицу
//echo $mark.' '.$year.' '.$mile.' '.$seller.' '.$idclient.' '.$idphoto.' '.$prise.' 0 '.$salon.' ';

    $sql = "INSERT INTO `avto`( `mark`, `model`, `data`, `release`, `v_dvig`, `m_dvig`, `mileage`, `carcase`, `color`, `seller`, `owner`, `photo`, `prise`, `salon`) 
VALUES ('$mark', '$model', '$data', '$year', '$v_dvig', '$m_dvig','$mile', '$carcase', '$colorm','$seller','$idclient','$idphoto','$prise','$salon')

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

    $idavto = $_POST['number'];
    $idmark = 0;
    $mile = 0;
    $year = 0;
    $idsalon = 0;
    $prise = 0;
    $sales = 0;
    $idphoto = 0;
    $model = 0;
    $v_dvig = 0;
    $m_dvig = 0;
    $carcase = 0;
    $colorm = 0;
    $data = 0;

    $sql = "SELECT * FROM `avto` WHERE id = '$idavto'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $idmark = $row['mark'];
        $idsalon = $row['salon'];
        $idphoto = $row['photo'];
        $mile = $row['mileage'];
        $year = $row['release'];
        $prise = $row['prise'];
        $sales = $row['sales'];
        $seller = $row['seller'];
        $owner = $row['owner'];
        $model = $row['model'];
        $v_dvig = $row['v_dvig'];
        $m_dvig = $row['m_dvig'];
        $carcase = $row['carcase'];
        $colorm = $row['color'];
        $data = $row['data'];

//echo $idservise.' '.$idphotographer.' '.$idclient;
//вывод заказа
        if (!empty($idmark)){
    echo '
<div id="viv">
<table class="tab"> <tr> <th>Код автомобиля</th> <th>Марка</th> <th>Модель</th> <th>Год выпуска</th> <th>Пробег</th><th>Объем двигателя</th> <th>Мощность двигателя</th> <th>Цвет</th> <th>Кузов</th><th>Дата поступления</th> <th>Салон</th> <th>Цена</th><th>Консультант</th> <th>Владелец</th> <th>Статус продажи</th> <th>Фото</th></tr>  <tr> <td> ' . $idavto . ' </td>
    ';

    $sql = "SELECT * FROM `mark` WHERE id = '$idmark'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        echo '
    <td>' .$row['name'].'</td><td>'.$model.'</td><td>'.$year.' г.</td><td>'.$mile.' км.</td><td>'.$v_dvig.' л.</td><td>'.$m_dvig.' л.с.</td><td>'.$colorm.' </td>
    ';
    }

            $sql = "SELECT * FROM `carcase` WHERE id = '$carcase'";
            $result = mysqli_query($link, $sql);

            if ($result) {
                $row = mysqli_fetch_array($result);
                echo '
<td>' .$row['name'].'</td><td>'.$data.' </td>
    ';
            }

    $sql = "SELECT * FROM `salon` WHERE id = '$idsalon'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        echo '
<td>' .$row['name'].' ' .$row['adress'].' ' .$row['phone'].'</td><td>'.$prise.' руб.</td>
    ';
    }

            $sql = "SELECT * FROM `seller` WHERE id = '$seller'";
            $result = mysqli_query($link, $sql);

            if ($result) {
                $row = mysqli_fetch_array($result);
                echo '
    <td>' .$row['name'].' ' .$row['surname'].' ' .$row['patronymic'].' ' .$row['phone'].'</td>
    ';
            }

            $sql = "SELECT * FROM `owner` WHERE id = '$owner'";
            $result = mysqli_query($link, $sql);

            if ($result) {
                $row = mysqli_fetch_array($result);
                echo '
<td>' .$row['name'].' ' .$row['surname'].' ' .$row['patronymic'].' ' .$row['phone'].'</td>
    ';
            }

    if($sales != 0) { echo '<td>Продано</td>';
    } else echo '<td> В наличие</td>';

    $sql = "SELECT * FROM `photo` WHERE id = '$idphoto'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        echo '
<td><img src="../avto_img/'.$row['adress'].'"></td> </tr> </table>
    </div>
    <a href="../php/search.php?avto='.$idavto.'"> Продано </a> <br /><br />
    
    ';
    }
} else echo '<br><p>Автомобиля с таким кодом отсутствует!</p>';
    } else echo 'Ошибка!';

}

function printorder()
{

    global $link;

    $sql = "SELECT * FROM `avto` WHERE 1";
    $result = mysqli_query($link, $sql);
    echo '
<div id="">
<a href="../index.php"> На главную </a> <br> <br> <br> <table class="tab"> <tr> <th>Код автомобиля</th> <th>Марка</th> <th>Год выпуска</th> <th>Пробег</th><th>Салон</th> <th>Цена</th> <th>Статус продажи</th> <th>Фото</th>  </tr>  <tr> 
    ';
    if ($result) {

        while ($row = mysqli_fetch_array($result)) {
            echo '
<td>' . $row['id'] . '</td>

';
            $idmark = $row['mark'];
            $idsalon = $row['salon'];
            $idphoto = $row['photo'];
            $mile = $row['mileage'];
            $year = $row['release'];
            $prise = $row['prise'];
            $sales = $row['sales'];


            $sql1 = "SELECT * FROM `mark` WHERE id = '$idmark'";
            $result1 = mysqli_query($link, $sql1);
            $row1 = mysqli_fetch_array($result1);
            echo '
                <td>' . $row1['name'] . '</td><td>' . $year . ' г.</td><td>' . $mile . ' км.</td>
';

            $sql2 = "SELECT * FROM `salon` WHERE id = '$idsalon'";
            $result2 = mysqli_query($link, $sql2);
            $row2 = mysqli_fetch_array($result2);
            echo '
                <td>' . $row2['name'] . ' ' . $row2['adress'] . '</td><td>' . $prise . ' руб.</td>
';


            if ($sales != 0) {
                echo '<td>Продано</td>';
            } else echo '<td> В наличие</td>';

            $sql3 = "SELECT * FROM `photo` WHERE id = '$idphoto'";
            $result3 = mysqli_query($link, $sql3);
            $row3 = mysqli_fetch_array($result3);
            echo '
                <td><img src="../avto_img/' . $row3['adress'] . '"></td> </tr> 
';
        }


        echo '
</table></div> <br> <a href="../index.php"> На главную </a>
';

    }
}

function upd_avto($idavto){
    global $link;

    $sql = "UPDATE `avto` SET `sales` = '1' WHERE `id` = '$idavto'";

    if (mysqli_query($link, $sql)) {
        echo 'Статус продажи успешно изменен! <br />';
    } else {
        echo 'Ошибка<br/>';
    }


}

?>