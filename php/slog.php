<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/4/13
 * Time: 17:43
 */
session_start();
include "../connect.php";?>

<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "$address/db/account.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$post_data = array(
    "args" => "view2",
    "name" => "$_SESSION[u_name]"
);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$exec = curl_exec($curl);
curl_close($curl);
?>


<link href="../css/style.css" rel="stylesheet"/>
<script src="../js/javascript.js"></script>
<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr>
        <td height="33" id="list">Logs for account - <?php echo $_SESSION[u_name];?>
        </td>
    </tr>
</table>
<table width="765" border="0" cellspacing="0" cellpadding="0" class="big_td">
    <tr>
        <td width="210" height="25" align="center" valign="middle" scope="col">Date</td>
        <td height="25" align="center" valign="middle" scope="col">Code-Explaination</td>
        <td width="150" height="25" align="center" valign="middle" scope="col">Notes</td>
    </tr>
    <?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "$address/db/lclass.php");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $post_data = array(
        "args" => "banana",
        "name" => "$exec"
    );
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $exec = curl_exec($curl);
    curl_close($curl);
    $exec=str_replace("[date=","<td height=30 style=\"text-indent: 30px;\">","$exec");
    $exec=str_replace("][code=","<td height=30 style=\"text-indent: 30px;\">","$exec");
    $exec=str_replace("][status=","</td><td>","$exec");
    $exec=str_replace("][end]","</td></tr>","$exec");



    $exec=str_replace("(201)","201 - User login to the site","$exec");
    $exec=str_replace("(210)","210 - User changed the password","$exec");
    $exec=str_replace("(600)","600 - User attempted attend the class without registered","$exec");
    $exec=str_replace("(601)","601 - User attempted attend the class without correct classroom","$exec");
    $exec=str_replace("(602)","602 - User successful attened to the class","$exec");
    $exec=str_replace("(700)","700 - Class is over","$exec");
    $exec=str_replace("(701)","701 - Class begins","$exec");

    echo $exec;
    ?>
</table>
</center>