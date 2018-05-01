<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/3/20
 * Time: 14:45
 */
session_start();
include "../connect.php";
//echo $_POST[c_update];

$arg=$_POST[args];
if ($arg == "new")
{

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "$address/db/class.php");
    //curl_setopt($curl, CURLOPT_URL, 'http:s//localhost/PlanB/Middle/pass.php');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $post_data = array(
        "args" => "member",
        "id" => $_POST[id],
        "lists" => $_POST[c_update]
    );

    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $exec=curl_exec($curl);
    curl_close($curl);

    //echo $exec;

   /* echo $_POST[c_update];
    echo $_POST[c_remove];*/
    $curl2 = curl_init();
    curl_setopt($curl2, CURLOPT_URL, "$address/db/class.php");
    //curl_setopt($curl, CURLOPT_URL, 'http:s//localhost/PlanB/Middle/pass.php');
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);

    $post_data2 = array(
        "args" => "member",
        "id" => "0",
        "lists" => $_POST[c_remove]
    );

    curl_setopt($curl2, CURLOPT_POSTFIELDS, $post_data2);
    $exec2=curl_exec($curl2);
    curl_close($curl2);


    echo "<script>alert('Operation Successful!');history.go(-1);</script>";

//echo $exec;

}
?>