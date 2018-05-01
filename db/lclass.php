<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/4/22
 * Time: 14:49
 * SAMPLE SQL: SELECT * FROM `491_logs` WHERE `tid` = 2 ORDER BY `date` DESC
 * SET @banana = (SELECT `uid` FROM `491_users` WHERE `name` = "Billy Bob");SELECT * FROM `491_logs` WHERE `tid` = @banana ORDER BY `date` DESC
 */
include "db_connect.php";
include "../connect.php";
if ($_POST[args] == "banana") {
    $sql = "SELECT * FROM `491_logs` WHERE `uid` = \"$_POST[name]\" ORDER BY `491_logs`.`date` DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row["cid"]==NULL) {
                if ($row["tid"]==NULL){
                    $status="Self Authorized";
                }
                else{
                    $tmp=$row["tid"];
                    $status="Undefined -> $tmp";
                }
            }elseif($row["cid"]==-1) {
                $tmp=$row["tid"];
                $status="Authorized -> $tmp";
            }
            else{
                $status=$row["cid"]." -> ".$row["tid"];
            }
            echo "[date=".$row["date"]."][code=(".$row["code"].")][status=".$status."][end]";
            //echo "</br>";

        }
    }
}elseif($_POST[args] == "potato"){
    $sql = "SELECT * FROM `491_logs` WHERE `tid` = $_POST[tid] ORDER BY `491_logs`.`date` DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if($row["cid"]==NULL) {
                if ($row["tid"]==NULL){
                    $status="Self Authorized";
                }
                else{
                    $tmp=$row["tid"];
                    $status="Undefined -> $tmp";
                }
            }elseif($row["cid"]==-1) {
                $tmp=$row["tid"];
                $status="Authorized -> $tmp";
            }
            else{
                $tmp=$row["uid"];
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "$address/db/account.php");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                $post_data = array(
                    "args" => "view3",
                    "uid" => "$tmp"
                );
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
                $exec = curl_exec($curl);
                curl_close($curl);

                $status=$exec;
            }
            echo "[date=".$row["date"]."][code=(".$row["code"].")][status=".$status."][end]";
            //echo "</br>";

        }
    }

}
mysqli_free_result($result);
mysqli_close($conn);
?>