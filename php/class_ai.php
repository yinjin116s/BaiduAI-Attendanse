<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/4/5
 * Time: 17:16
 */
session_start();
include "../connect.php";
//echo $_POST[id] ."-".$_POST[status];

$status=1-$_POST[status];
//echo $status;

error_reporting(0);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "$address/db/class.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$post_data = array(
    "args" => "banana",
    "id"   => "$_POST[id]",
    "status" => "$status"
);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$exec = curl_exec($curl);
curl_close($curl);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "$address/db/log.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$post_data = array(
    "args" => "class",
    "user" => "$_SESSION[u_name]",
    "code" => $status+=700,
    "target" => $_POST[id]
);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$exec = curl_exec($curl);
curl_close($curl);
?>
<link href="../css/style.css" rel="stylesheet" />
<td height="36" colspan="2" id="list">Processing...</td>
</tr>
<?php
echo "<script>alert('Operation Successful!');history.go(-1);</script>";
?>