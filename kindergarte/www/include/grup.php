<select name="group" required>

    <?php

    //    $result = mysql_query("SELECT * FROM photographer WHERE 1",$link);

    $sql = "SELECT * FROM `group` WHERE 1";

    $result = mysqli_query($link, $sql);
    if ($result) {
        If (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            do {
                echo '
     
   <option value="' . $row["id"] . '" >' . $row["name"] . '</option>
     
    ';
            } while ($row = mysqli_fetch_array($result));
        }
    }
    ?>
</select>
