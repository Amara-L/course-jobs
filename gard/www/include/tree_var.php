
<!---->
<!--    <select name="trees[]" multiple required>-->
<!---->
<!--    --><?php
//
//    //    $result = mysql_query("SELECT * FROM photographer WHERE 1",$link);
//
//    $sql = "SELECT * FROM `trees` WHERE 1";
//
//    $result = mysqli_query($link, $sql);
//    if ($result) {
//        If (mysqli_num_rows($result) > 0) {
//            $row = mysqli_fetch_array($result);
//            do {
//                echo '
//
//   <option value="' . $row["id"] . '" >' . $row["name"] . '</option>
//
//    ';
//            } while ($row = mysqli_fetch_array($result));
//        }
//    }
//    ?>
<!--    </select>-->



<select multiple="multiple" name="formCountries[]">
    <?php

    //    $result = mysql_query("SELECT * FROM photographer WHERE 1",$link);

    $sql = "SELECT * FROM `trees` WHERE 1";

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



