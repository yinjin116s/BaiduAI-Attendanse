<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
* Date: 2018/1/30
* Time: 17:46
*/
include "db_connect.php";
//echo 1;
$sql = "SELECT * FROM `491_users` WHERE `user` = '"."$_POST[user]"."' AND `pass` = '"."$_POST[pwd]"."' AND `admin` = $_POST[group]";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo $_POST[group];
//echo "Have Result";
}
else{
echo "2";
}
//echo $sql;
mysqli_free_result($result);
mysqli_close($conn);
?>