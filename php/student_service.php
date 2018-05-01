<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/4/13
 * Time: 17:16
 */

include "../connect.php";
?>
<?php
$arg=$_POST[args];
if ($arg == "spw")
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "$address/db/log.php");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $post_data = array(
        "user" => $_POST[id],
        "code" => 210
    );
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $exec = curl_exec($curl);
    curl_close($curl);


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "$address/db/account.php");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $post_data = array(
    "args"=>"spw",
    "username" => $_POST[id],
    "password" => $_POST[password]
    );
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $exec=curl_exec($curl);
    curl_close($curl);
    $url="spassword.php";
    echo "<script>alert('Operation Successful!');location='".$url."';</script>";
    //echo $exec;
}
?>