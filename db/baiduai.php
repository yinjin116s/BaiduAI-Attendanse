<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/4/7
 * Time: 13:26
 * Objective: a.Finding the name based on the result of the BAIDU AI, then return the user record and the class id.
 * b. Log the success message into database.
 *
 * SAMPLE MYSQL: SELECT `class` FROM `491_users` WHERE `name` LIKE 'Billy Bob'
 * SAMPLE MYSQL: SELECT `onair` FROM `491_classes` WHERE `cid` = 2
 * SAMPLE MYSQL: INSERT INTO `491_logs` (`id`, `cid`, `user`, `date`) VALUES (NULL, '2', 'Billy Bob', CURRENT_TIMESTAMP)
 * SAMPLE MYSQL: SELECT * FROM `491_users` WHERE `name` LIKE 'Billy Bob'
 */

include "db_connect.php";
//echo 1;
//SELECT * FROM `491_users` WHERE `admin` = 0
if ($_POST[args] == "aicheck") {
    $sql = "SELECT `class` FROM `491_users` WHERE `name` = \"$_POST[name]\"";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["class"];
        }
    }
    else{
        echo 99999;
    }
    mysqli_free_result($result);
}
elseif($_POST[args] == "ailogin"){
    $sql = "SELECT * FROM `491_users` WHERE `name` = \"$_POST[name]\"";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["admin"];
        }
    }
    else{
        echo 99999;//Kaboom
    }
    mysqli_free_result($result);
}
elseif($_POST[args] == "ainame"){
    $sql = "SELECT * FROM `491_users` WHERE `name` = \"$_POST[name]\"";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo $row["user"];
        }
    }
    else{
        echo 99999;//Kaboom
    }
    mysqli_free_result($result);
}
else{
    echo 99999;
}
mysqli_close($conn);
?>