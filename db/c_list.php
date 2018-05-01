<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/3/13
* Time: 18:16
*/
include "db_connect.php";
//echo 1;
//SELECT * FROM `491_users` WHERE `admin` = 0
if ($_POST[args] == "c_list") {
    $sql = "SELECT * FROM `491_classes`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "uid=" . $row["cid"] . "name=" .$row['c_name']."id=".$row['cid']."op=".$row['cid']."done";
        }
    }
}
//SELECT `onair` FROM `491_classes` WHERE cid = 1
else if ($_POST[args] == "banana"){
    $sql = "SELECT `onair` FROM `491_classes` WHERE cid = $_POST[id]";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
       /*     if($row["onair"] == 0){
                echo "Not Start Yet";
            }
            elseif ($row["onair"] == 1){
                echo "Started";
            }
            else{
                echo "Unknown";
            }*/
        echo $row["onair"];
        }
    }
}
//echo $sql;
mysqli_free_result($result);
mysqli_close($conn);
?>