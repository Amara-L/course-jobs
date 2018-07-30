
<ul>

    <?php

//    $result = mysql_query("SELECT * FROM photographer WHERE 1",$link);

    $sql = "SELECT * FROM service WHERE 1";

    $result = mysqli_query($link, $sql);
    if ($result) {
        If (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            do {
                echo '
     
  <li><input type="radio" name="servise" value="' . $row["id"] . '"  required>' . $row["name"] . ' ' . $row["value"] . ' рублей.</li><br>
     
    ';
            } while ($row = mysqli_fetch_array($result));
        }
    }
    ?>
</ul>
