<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/25
 * Time: 18:26
 */
session_start();
include "../connect.php";
include "baiduai.php";
//Upload Picture To Baidu Ai database

$groupId = "group1";
$image = file_get_contents("./images/students/".$_SESSION[p_tmp].".png");
$exec = $client->addUser($_SESSION[p_tmp], $_SESSION[p_tmp_2], $groupId, $image);

//echo print_r($exec);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "$address/db/account.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$post_data = array(
    "args"=>"pic_record",
    "id" => $_SESSION[p_tmp]
);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$exec = curl_exec($curl);
curl_close($curl);

echo "<script>alert('Job Done!');window.location.href='../php/s_manage.php';</script>";
//echo $exec;
exec("rm ./images/students/".$_SESSION[p_tmp].".png");
?>
