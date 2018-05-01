<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/20
 * Time: 21:43
 */
include "baiduai.php";
//Finding students picture in the database

$groupId = "group1";
//$image = file_get_contents('./images/tmp/'.$_SESSION[u_name].'.png');
$image = file_get_contents('./images/tmp/user.png');
$exec = $client->identifyUser($groupId, $image);
//$result = json_encode($exec);
//$result1 = json_decode($result,true);
//echo print_r($result1);
/*echo "</br>";
echo $result1['result']['0']['scores']['0'];
echo "</br>";
echo print_r($exec);*/
$points = floatval($exec['result']['0']['scores']['0']);
//echo $exec['result']['0']['scores']['0'];
if ($points >= 80)
{
    echo "Matches!";
    echo "<script>alert('Perfect You Are Jin!');history.go(-1);</script>";
}
else{
    echo "OOps";
    echo "<script>alert('OOPS You Are Fired!');history.go(-1);</script>";
}
exec("rm ./images/tmp/user.png");
?>
