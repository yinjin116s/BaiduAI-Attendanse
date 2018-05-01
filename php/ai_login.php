<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/4/7
 * Time: 17:44
 */
session_start();
include "../picture/baiduai.php";
include "../connect.php";

$groupId = "group1";
$image = file_get_contents('../picture/images/tmp/temp.png');
// 调用人脸识别
$exec = $client->identifyUser($groupId, $image);


$shit = false;
$poop = floatval($exec['error_code']);
if ($poop > 0)
{
    $shit=true;
    $error=$exec['error_msg'];
}
if($shit==false) {
    $points = floatval($exec['result']['0']['scores']['0']);
    $name = $exec['result']['0']['user_info'];
    if ($points >= 80) {//Check Database

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "$address/db/baiduai.php");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $post_data = array(
            "args" => "ailogin",
            "name" => "$name"
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        $exec = curl_exec($curl);
        $rank = floatval($exec);
        // 0  1  99999
        curl_close($curl);

        $curl2 = curl_init();
        curl_setopt($curl2, CURLOPT_URL, "$address/db/baiduai.php");
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
        $post_data2 = array(
            "args" => "ainame",
            "name" => "$name"
        );
        curl_setopt($curl2, CURLOPT_POSTFIELDS, $post_data2);
        $exec2 = curl_exec($curl2);
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, "$address/db/log.php");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $post_data = array(
            "user" => $exec2,
            "code" => 201
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        $exec = curl_exec($curl);
        curl_close($curl);

        if($rank == 0){
            $_SESSION[u_name] = $exec2;
            echo "<script>alert('Welcome Student!');location='../php/s_main.php';</script>";

        }elseif($rank == 1) {
            $_SESSION[u_name] = $exec2;
            echo "<script>alert('Welcome Professor!');location='../php/pub_main.php';</script>";
        }
        curl_close($curl);
    }
    else{
        echo "<script>alert('Error: We can\'t find your face in our database.');history.go(-1);</script>";
    }
}
else{
    echo "<script>alert('Baidu AI SERVER Error code:$poop - $error, Please retry.');history.go(-1);</script>";
}

?>