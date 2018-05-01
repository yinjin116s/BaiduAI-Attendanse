<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/3/13
 * Time: 18:32
 */
session_start();
include "../connect.php";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "$address/db/class.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$post_data = array(
"args"=>"view",
"id" => $_GET[id]
);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$exec = curl_exec($curl);
curl_close($curl);
$data = json_decode($exec,true);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "$address/db/class.php");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$post_data = array(
"args"=>"pic_check",
"id" => $data['user']
);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
$exec = curl_exec($curl);
curl_close($curl);
?>
<link href="../css/style.css" rel="stylesheet" />
<script src="../js/javascript.js"></script>
<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr>
        <td height="33"id="list">Class Editing
        </td>
    </tr>
</table>
<form action="./class_update.php" method="post" name="form1">
    <table width="500" height="180" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">Class Name：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <input type="text" name="c_name" value="<?php echo $data['cname']; ?>" /></td>
        </tr>
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">Note：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <textarea name="notes" cols="20" rows="4"><?php echo $data['note']; ?></textarea></td>
        </tr>
        <tr>
            <td colspan="2" height="30" align="center" valign="middle">
                <input type="hidden" name="args" value="edit">
                <input type="hidden" name="cid" value="<?php echo $_GET[id]?>">
                <input type="submit" value="Submit" />
                <input type="reset" value="Undo" />
            </td>
        </tr>
    </table>
</form>

