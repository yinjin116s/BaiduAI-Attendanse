<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/3/13
 * Time: 18:50
 */
//SQL UPDATE `491_classes` SET `c_name` = 'Test Class 1011', `note` = 'Banana! Tomato! Potato!!' WHERE `491_classes`.`cid` = 1;
include "db_connect.php";
if($_POST[args]=="new"){
    $sql = "INSERT INTO `491_users` (`uid`, `user`, `name`, `pass`, `admin`) VALUES (NULL, '$_POST[username]', '$_POST[name]', '$_POST[password]', '$_POST[role]')";
    $result = $conn->query($sql);
    mysqli_free_result($result);
    //INSERT INTO `491_picture` (`logid`, `uid`, `stat`) VALUES (NULL, 'blablabla', '0')
    $sql2 = "INSERT INTO `491_picture` (`logid`, `uid`, `stat`) VALUES (NULL, '$_POST[username]', '0')";
    $result = $conn->query($sql2);
    mysqli_free_result($result);
    mysqli_close($conn);

}
elseif ($_POST[args]=="view"){
    $sql= "SELECT * FROM `491_classes` WHERE `cid` = $_POST[id]";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo json_encode(array(
            "cname"=>$row["c_name"],
            "note"=>$row["note"]
        ));
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
elseif ($_POST[args]=="edit"){
    $sql= "UPDATE `491_classes` SET `c_name` = '$_POST[c_name]', `note` = '$_POST[note]' WHERE `491_classes`.`cid` = $_POST[cid]";
    $result = $conn->query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
    echo $sql;
}

elseif ($_POST[args]=="member"){
    //User List:Jin,Billy Bob,Name Here,Top banana,END
    //UPDATE `491_users` SET `class` = '2' WHERE `491_users`.`name` = "Jin"

    $sql= $_POST[lists];
    $sql=str_replace("User List:","UPDATE `491_users` SET `class` = '".$_POST[id]."' WHERE `491_users`.`name` = \"","$sql");
    $sql=str_replace(",END","\"","$sql");
    $sql=str_replace(",","\"; UPDATE `491_users` SET `class` = '".$_POST[id]."' WHERE `491_users`.`name` = \"","$sql");
    $result= $conn->multi_query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);

    echo $sql;
}
//INSERT INTO `491_classes` (`cid`, `c_name`, `note`, `onair`) VALUES (NULL, 'Banana', 'Hahaha', '0')
//UPDATE `491_classes` SET `onair` = '0' WHERE `491_classes`.`cid` = 1;
elseif ($_POST[args]=="banana"){
    $sql= "UPDATE `491_classes` SET `onair` = '$_POST[status]' WHERE `491_classes`.`cid` = $_POST[id];";
    $result = $conn->query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
    echo $sql;
}

elseif ($_POST[args]=="class"){
    $sql= "INSERT INTO `491_classes` (`cid`, `c_name`, `note`, `onair`) VALUES (NULL, '$_POST[c_name]', '$_POST[note]', '0');";
    $result = $conn->query($sql);
    mysqli_free_result($result);
    mysqli_close($conn);
    echo $sql;
}