<?php

//функция добавления заказа
function add_order()
{
global $link;
    global $maxshru;
    global $maxtree;

//добавляем в переменные
    echo $maxshru;
    $name = $_POST['name'];
    $area = $_POST['area'];
    $svod = $_POST['svod'];
    $idsad = 0;

//добавляем сад
$sql = "INSERT INTO `gardens`( `name`, `area`, `responsible`) VALUES ('$name','$area','$svod')";
//echo $name. ' '.$area . ' '.$svod ;
    if (mysqli_query($link, $sql)) {
    } else {
        echo '1Ошибка<br/>';
    }
//узнаем id сада
    $idsad =  mysqli_insert_id($link);


//добавляем деревья
        $aCountries = $_POST['formCountries'];
        if(!isset($aCountries))
        {
            echo("<p>Вы не выбрали ни один вариант!</p>\n");
        }
        else
        {
            $nCountries = count($aCountries);

            for($i=0;$i<$nCountries;$i++) {

                $sql = "INSERT INTO `trees_sad`(`id_trees`, `id_sad`) VALUES ('$aCountries[$i]','$idsad')";

                if (mysqli_query($link, $sql)) {
                } else {
                    echo '3Ошибка<br/>';
                }

            }
        }
//добавляем кустарники
$aCountriess = $_POST['formmCountries'];
if(!isset($aCountriess))
{
    echo("<p>Вы не выбрали ни один вариант!</p>\n");
}
else {
    $nCountriess = count($aCountriess);

    for ($i = 0; $i < $nCountriess; $i++) {

        $sql = "INSERT INTO `shrubs_sad`(`id_shrubs`, `id_sad`) VALUES ('$aCountriess[$i]','$idsad')";
//echo $nCountriess. ' ' . $idsad;
        if (mysqli_query($link, $sql)) {
        } else {
            echo '4Ошибка<br/>';
        }

    }
}
    }


//функция поиска заказа
function sear_order() {
global $link;

    $idsad = $_POST['number'];
    $idarea = 0;
    $idsvod = 0;
    $name = 0;

    $sql = "SELECT * FROM `gardens` WHERE id = '$idsad'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $idarea = $row['area'];
        $name = $row['name'];
        $idsvod = $row['responsible'];

//echo $idservise.' '.$idphotographer.' '.$idclient;
//вывод заказа
        if (!empty($idarea)){
    echo '
<div id="viv">
<table class="tab"> <tr> <th>Код сада</th> <th>Название</th> <th>Площадь</th> <th>Деревья</th> <th>Кустарники</th><th>Садовод</th></tr>  <tr> <td> ' . $idsad . ' </td><td> ' . $name . ' </td>
    ';

    $sql = "SELECT * FROM `area` WHERE id = '$idarea'";
    $result = mysqli_query($link, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        echo '
    <td>' .$row['area'].'</td> <td>
    ';
    }

            $sql = "SELECT * FROM `trees_sad` WHERE id_sad = '$idsad'";
            $result = mysqli_query($link, $sql);
            if ($result) {
                If (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {

                        $idtree = $row['id_trees'];
                        $sql2 = "SELECT * FROM `trees` WHERE id = '$idtree'";
                        $result2 = mysqli_query($link, $sql2);

                        if ($result2) {
                            $row2 = mysqli_fetch_array($result2);
                           echo $row2['name'].'<br>';
                        }

                    } while ($row = mysqli_fetch_array($result));

                }
            }

            echo ' </td><td>';

            $sql = "SELECT * FROM `shrubs_sad` WHERE id_sad = '$idsad'";
            $result = mysqli_query($link, $sql);
            if ($result) {
                If (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_array($result);
                    do {

                        $idtree = $row['id_shrubs'];
                        $sql2 = "SELECT * FROM `shrubs` WHERE id = '$idtree'";
                        $result2 = mysqli_query($link, $sql2);

                        if ($result2) {
                            $row2 = mysqli_fetch_array($result2);
                            echo $row2['name'].'<br>';
                        }

                    } while ($row = mysqli_fetch_array($result));

                }
            }

            echo ' </td>';

            $sql = "SELECT * FROM `responsible` WHERE id = '$idsvod'";
            $result = mysqli_query($link, $sql);

            if ($result) {
                $row = mysqli_fetch_array($result);
                echo '
    <td>' .$row['surname'].' ' .$row['name'] .' ' . $row['patronymic'].' ' .$row['phone'] .  '</td></tr></table></div> 
    ';
            }

} else echo '<br><p>Cад с таким кодом отсутствует!</p>';
    } else {
        echo 'Ошибка!';
    }

}

function printorder()
{

    global $link;

    $sql = "SELECT * FROM `gardens` WHERE 1";
    $result = mysqli_query($link, $sql);
    echo '
<div id="">
<a href="../index.php"> На главную </a> <br> <br> <br> <table class="tab"> <tr> <th>Код сада</th> <th>Название</th> <th>Площадь</th> </tr>  <tr> 
    ';
    if ($result) {

        while ($row = mysqli_fetch_array($result)) {
            echo '
<td>' . $row['id'] . '</td><td>' . $row['name'] . '</td>
';
            $idarea = $row['area'];

            $sql1 = "SELECT * FROM `area` WHERE id = '$idarea'";
            $result1 = mysqli_query($link, $sql1);
            $row1 = mysqli_fetch_array($result1);
            echo '
               <td>' . $row1['area'] . ' </td></tr>
';
        }


        echo '
</table></div> <br> <a href="../index.php"> На главную </a>
';

    }
}



?>