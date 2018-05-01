
<?php
/**
 * Created by PhpStorm.
 * User: jin
 * Date: 2018/4/13
 * Time: 16:39
 */
session_start();
include "./chk.php"
?>
<link href="../css/style.css" rel="stylesheet" />
<script src="../js/javascript.js"></script>
<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr>
        <td height="33"id="list">Change Your Password
</td>
    </tr>
</table>
<form action="./student_service.php" method="post" name="form1">
    <table width="500" height="180" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="100" height="25" align="right" valign="middle" scope="col">New password：</td>
    <td height="25" align="left" valign="middle" scope="col">
        <input type="password" name="password" value="" /></td>

    <td colspan="2" height="30" align="center" valign="middle">
        <input type="hidden" name="args" value="spw">
        <input type="hidden" name="id" value="<?php echo $_SESSION[u_name]; ?>">
        <input type="submit" value="Confirm" />
        <input type="reset" value="Reset" />
    </td>
</tr>
    </table>
</form>