<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/19
 * Time: 19:35
 */
session_start();
include "./chk.php";
include "../connect.php";?>
<link href="../css/style.css" rel="stylesheet" />
<script src="../js/javascript.js"></script>
<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr>
        <td height="33" id="list">Account Management
        </td>
    </tr>
</table>
<table width="765" border="0" cellspacing="0" cellpadding="0" class="big_td">
    <tr>
        <td width="100" height="25" align="center" valign="middle" scope="col">User ID</td>
        <td height="25" align="center" valign="middle" scope="col">Name</td>
        <td width="150" height="25" align="center" valign="middle" scope="col">Options</td>
    </tr>
    <?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "$address/db/s_list.php");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $post_data = array(
        "args" => "s_list"
    );
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    $exec = curl_exec($curl);
    curl_close($curl);
    $exec=str_replace("uid=","<td height=30 style=\"text-indent: 30px;\">","$exec");
    $exec=str_replace("name=","<td height=30 style=\"text-indent: 30px;\">","$exec");
    $exec=str_replace("id=","</td><td><a href='account_edit.php?id=","$exec");
    $exec=str_replace("done","'>Edit</a></td></tr>","$exec");
    echo $exec;
    ?>
    <tr>
        <td height="30" align="right" valign="middle" colspan="3"><a href='account_new.php' target="mainFrame">[New Account]</a></td>
    </tr>
</table>
</center>