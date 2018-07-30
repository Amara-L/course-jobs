
<ul>

    <?php

//    $result = mysql_query("SELECT * FROM photographer WHERE 1",$link);

    $sql = "SELECT * FROM photographer WHERE 1";

    $result = mysqli_query($link, $sql);
    if ($result) {
        If (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            do {
                echo '
     
  <li><input type="radio" name="photographer" value="' . $row["id"] . '"  required>' . $row["surname"] . ' ' . $row["name"] . ' ' . $row["patronymic"] . '</li><br>
     
    ';
            } while ($row = mysqli_fetch_array($result));
        }
    }
    ?>
</ul>