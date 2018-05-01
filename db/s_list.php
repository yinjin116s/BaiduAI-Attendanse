<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/19
 * Time: 19:42
 */
include "db_connect.php";
//echo 1;
//SELECT * FROM `491_users` WHERE `admin` = 0

if ($_POST[args] == "manage"){
    $sql = "SELECT * FROM `491_users`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "uid=" . $row["uid"] . "name=" .$row['name'].";";
        }
    }
}
elseif ($_POST[args] == "manage_null"){
    $sql = "SELECT * FROM `491_users` WHERE `class` = 0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "uid=" . $row["uid"] . "name=" .$row['name'].";";
        }
    }
}
elseif ($_POST[args] == "manage_class"){
    $sql = "SELECT * FROM `491_users` WHERE `class` = ".$_POST[id];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "uid=" . $row["uid"] . "name=" .$row['name'].";";
        }
    }
}
else {
    $sql = "SELECT * FROM `491_users`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "uid=" . $row["uid"] . "name=" . $row['admin'] . "-" . $row['user'] . "id=" . $row['uid'] . "done";
        }
    }
}
//echo $sql;
mysqli_free_result($result);
mysqli_close($conn);
?>