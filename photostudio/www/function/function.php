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
    $serviseid = $_POST['servise'];
    $photographerid = $_POST['photographer'];

    //проверяем наличае клиента
    $n = 0;
    $sql = "SELECT id FROM client WHERE name='$name'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;
    $sql = "SELECT id FROM client WHERE surname='$surname'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;
    $sql = "SELECT id FROM client WHERE patronymic='$patronymic'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;
    $sql = "SELECT id FROM client WHERE phone='$phone'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_array($result);
    if (!empty($row)) $n++;

    if($n < 4) {
//добавляем клиента в таблицу
        $sql = "INSERT INTO `client` (`name`, `surname`, `patronymic`, `phone`)
    VALUES ('{$name}','{$surname}','{$patronymic}','{$phone}')";

        if (mysqli_query($link, $sql)) {
        } else {
            echo 'Ошибка<br/>';
        }
    }

//получаем id клиента
    $idclient = 0;
        $sql =  "SELECT id FROM client WHERE phone='$phone'";
        $result = mysqli_query($link, $sql);
        if ($result) {
            if (mysqli_num_rows($result) != 0) {
                $row = mysqli_fetch_array($result);
                $idclient = $row[id];
            }

    }

//заполняем таблицу заказа
    $sql = "INSERT INTO `orders` (`service`, `client`, `photographer`)
    VALUES ('{$serviseid}','{$idclient}','{$photographerid}')";

        if (mysqli_query($link, $sql)) {
        } else {
            echo 'Ошибка<br/>';
        }

        //узнаем id заказа
    $sql =  "SELECT id FROM orders WHERE phone='$phone'";
    $result = mysqli_query($link, $sql);
    if ($result) {
        if (mysqli_num_rows($result) != 0) {
            $row = mysqli_fetch_array($result);
            $idclient = $row[id];
        }

    }

    }


//функция поиска заказа
function sear_order() {
global $link;

    $idorder = $_POST['number'];
    $idclient = 0;
    $idphotographer = 0;
    $idservise = 0;

    $sql = "SELECT * FROM `orders` WHERE id = '$idorder'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $idservise = $row['service'];
        $idphotographer = $row['photographer'];
        $idclient = $row['client'];
//echo $idservise.' '.$idphotographer.' '.$idclient;
//вывод заказа
        if (!empty($idclient)){
    echo '
<div id="">
<table> <tr> <th>Код заказа</th> <th>Клиент</th> <th>Фотограф</th> <th>Услуга</th></tr>  <tr> <td> ' . $idorder . ' </td>
    ';

    $sql = "SELECT * FROM `client` WHERE id = '$idclient'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        echo '
    <td>' .$row['name'].' ' .$row['surname'].' ' .$row['patronymic'].' ' .$row['phone'].'</td>
    ';
    }

    $sql = "SELECT * FROM `photographer` WHERE id = '$idphotographer'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        echo '
<td>' .$row['name'].' ' .$row['surname'].' ' .$row['patronymic'].' ' .$row['phone'].'</td>
    ';
    }

    $sql = "SELECT * FROM `service` WHERE id = '$idservise'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        echo '
<td>' .$row['name'].' ' .$row['value'].' рублей.</td> </tr> </table>
    </div>
    ';
    }
} else echo '<br><p>Заказ с таким кодом отсутствует!</p>';
    } else echo 'Ошибка!';

}

function printorder(){

global $link;

        $sql = "SELECT * FROM `orders` WHERE 1";
        $result = mysqli_query($link, $sql);
    echo '
<div id="">
<a href="../index.php"> На главную </a> <br> <br> <br> <table> <tr> <th>Код заказа</th> <th>Клиент</th> <th>Услуга</th>  </tr>  <tr> 
    ';
        if ($result) {

            while ($row = mysqli_fetch_array($result)) {
                echo '
<td>' . $row['id'] . '</td>

' ;
                $idclient = $row['client'];
                $idservice = $row['service'];
                $sql1 = "SELECT * FROM `client` WHERE id = '$idclient'";
                $result1 = mysqli_query($link, $sql1);
                $row1 = mysqli_fetch_array($result1);
                echo '
                <td>'.$row1['name'] . ' ' . $row1['surname'] . ' ' . $row1['patronymic'] . '</td>
' ;
                $sql2 = "SELECT * FROM `service` WHERE id = '$idservice'";
                $result2 = mysqli_query($link, $sql2);
                $row2 = mysqli_fetch_array($result2);
                echo '
                <td>'.$row2['name'] . '</td></tr>
';
            }

echo '</table></div><br> <a href="../index.php"> На главную </a>';
        }

}

?>