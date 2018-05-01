<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/1/28
 * Time: 15:08
 */
include "../connect.php";
    session_start();
    error_reporting(0);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "$address/db/login.php");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $post_data = array(
        "user" => $_POST[username],
        "pwd" => $_POST[pwd],
        "group" => $_POST[u_group]
    );
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $exec = curl_exec($curl);
    curl_close($curl);

    if ($exec == 2) {
        echo "<script>alert('Username/Password Incorrect');history.go(-1);</script>";
    }else{
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "$address/db/log.php");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $post_data = array(
            "user" => $_POST[username],
            "code" => 201
        );
        curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
        curl_exec($curl);
        curl_close($curl);

        if ($exec == 0) {
            echo "<script>alert('Welcome Student!');location='s_main.php';</script>";
            $_SESSION[u_name] = $_POST[username];
        }elseif ($exec == 1) {
            echo "<script>alert('Welcome Professor!');location='pub_main.php';</script>";
            $_SESSION[u_name] = $_POST[username];
        }
    }

?>
