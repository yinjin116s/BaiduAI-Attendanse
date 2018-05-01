<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/25
 * Time: 15:52
 */
include "db_connect.php";
if($_POST[args]=="new"){
    $sql = "INSERT INTO `491_users` (`uid`, `user`, `name`, `pass`, `admin`, `class`) VALUES (NULL, '$_POST[username]', '$_POST[name]', '$_POST[password]', '$_POST[role]', NULL)";
    $result = $conn->query($sql);
    mysqli_free_result($result);
    //INSERT INTO `491_picture` (`logid`, `uid`, `stat`) VALUES (NULL, 'blablabla', '0')
    $sql2 = "INSERT INTO `491_picture` (`logid`, `uid`, `stat`) VALUES (NULL, '$_POST[username]', '0')";
    $result = $conn->query($sql2);
    mysqli_free_result($result);
    mysqli_close($conn);

}
elseif ($_POST[args]=="view"){
    $sql= "SELECT * FROM `491_users` WHERE `uid` = $_POST[id]";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo json_encode(array(
            "user"=>$row["user"],
            "name"=>$row["name"],
            "password"=>$row["pass"],
            "role"=>$row["admin"]
        ));
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
elseif ($_POST[args]=="view2"){
    $sql= "SELECT * FROM `491_users` WHERE `user` = \"$_POST[name]\"";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo $row["uid"];
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
elseif ($_POST[args]=="view3"){
    $sql= "SELECT * FROM `491_users` WHERE `uid` = \"$_POST[uid]\"";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo $row["name"];
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
elseif ($_POST[args]=="pic_check"){
    $sql= "SELECT * FROM `491_picture` WHERE `uid` = '$_POST[id]'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo $row["stat"];
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
//UPDATE `491_picture` SET `stat` = '1' WHERE `491_picture`.`uid` = "student"
//echo "nothing!";
elseif ($_POST[args]=="pic_record"){
    $sql= "UPDATE `491_picture` SET `stat` = '1' WHERE `491_picture`.`uid` = \"$_POST[id]\"";
    $result = $conn->query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
    //echo $sql;
}
elseif($_POST[args]=="new"){
    $sql = "INSERT INTO `491_users` (`uid`, `user`, `name`, `pass`, `admin`, `class`) VALUES (NULL, '$_POST[username]', '$_POST[name]', '$_POST[password]', '$_POST[role]', NULL)";
    $result = $conn->query($sql);
    mysqli_free_result($result);
    //INSERT INTO `491_picture` (`logid`, `uid`, `stat`) VALUES (NULL, 'blablabla', '0')
    $sql2 = "INSERT INTO `491_picture` (`logid`, `uid`, `stat`) VALUES (NULL, '$_POST[username]', '0')";
    $result = $conn->query($sql2);
    mysqli_free_result($result);
    mysqli_close($conn);

}
//UPDATE `491_users` SET `name` = 'Billy Bobba', `pass` = '1234567', `admin` = '0' WHERE `491_users`.`uid` = 2
elseif ($_POST[args]=="edit"){
    $sql= "UPDATE `491_users` SET `name` = '$_POST[name]', `pass` = '$_POST[password]', `admin` = '$_POST[role]' WHERE `491_users`.`uid` = $_POST[id]";
    $result = $conn->query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
    //echo $sql;
}
elseif ($_POST[args]=="spw"){
    $sql= "UPDATE `491_users` SET `pass` = '$_POST[password]' WHERE `491_users`.`user` LIKE '$_POST[username]'";
    $result = $conn->query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
    //echo $sql;
    //echo $result;
}
?>
