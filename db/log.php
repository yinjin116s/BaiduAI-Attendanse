<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/4/16
 * Time: 16:03
 *
 *
 * SAMPLE: LOG-CODE
 *  200 - Login Failure
 *  201 - Login Success
 *  210 - Picture Taken
 *  211 - Profile Changed
 *  600 - Checkin Failure [No class]
 *  601 - Checkin Failure [Wrong Classroom]
 *  602 - Checkin Success
 *  701 - Password Changed
 *
 * SAMPLE MYSQL: SET @cnt = (SELECT `uid` FROM `491_users` WHERE `user` = "user");
INSERT INTO `491_logs` (`id`, `uid`, `cid`, `tid`, `code`, `date`) VALUES (NULL, @cnt , NULL, NULL, NULL, CURRENT_TIMESTAMP)
 */
include "db_connect.php";

if($_POST[args] == "success")
{
    $sql = "SET @banana = (SELECT `uid` FROM `491_users` WHERE `name` = \"$_POST[user]\"); INSERT INTO `491_logs` (`id`, `uid`, `cid`, `tid`, `code`, `date`) VALUES (NULL, @banana , $_POST[target], $_POST[target], ".$_POST[code].", CURRENT_TIMESTAMP)";
    $result= $conn->multi_query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
}elseif($_POST[args] == "failure"){
    $sql = "SET @banana = (SELECT `uid` FROM `491_users` WHERE `name` = \"$_POST[user]\"); INSERT INTO `491_logs` (`id`, `uid`, `cid`, `tid`, `code`, `date`) VALUES (NULL, @banana , $_POST[class], $_POST[target], ".$_POST[code].", CURRENT_TIMESTAMP)";
    $result= $conn->multi_query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
}elseif($_POST[args] == "failure2"){
    $sql = "SET @banana = (SELECT `uid` FROM `491_users` WHERE `name` = \"$_POST[user]\"); INSERT INTO `491_logs` (`id`, `uid`, `cid`, `tid`, `code`, `date`) VALUES (NULL, @banana , NULL, $_POST[target], ".$_POST[code].", CURRENT_TIMESTAMP)";
    $result= $conn->multi_query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
}elseif($_POST[args] == "class"){
    $sql = "SET @banana = (SELECT `uid` FROM `491_users` WHERE `user` = \"$_POST[user]\"); INSERT INTO `491_logs` (`id`, `uid`, `cid`, `tid`, `code`, `date`) VALUES (NULL, @banana , -1, $_POST[target], ".$_POST[code].", CURRENT_TIMESTAMP)";
    $result= $conn->multi_query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
} else{
    $sql = "SET @banana = (SELECT `uid` FROM `491_users` WHERE `user` = \"$_POST[user]\"); INSERT INTO `491_logs` (`id`, `uid`, `cid`, `tid`, `code`, `date`) VALUES (NULL, @banana , NULL, NULL, ".$_POST[code].", CURRENT_TIMESTAMP)";
    $result= $conn->multi_query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
}
//echo $sql;
//echo $result;
?>

