<?php
/**
 * Created by IntelliJ IDEA.
 * User: jin
 * Date: 2018/2/21
 * Time: 00:20
 */
?>
<link href="../css/style.css" rel="stylesheet" />
<script src="../js/javascript.js"></script>
<table width="765" border="0" cellpadding="0" cellspacing="0" class="big_td">
    <tr>
        <td height="33"id="list">Create New Account
        </td>
    </tr>
</table>
<form action="./account_process.php" method="post" name="form1">
    <table width="500" height="180" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">MOTD：</td>
            <td height="25" align="left" valign="middle" scope="col">I am so handsome</td>
        </tr>
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">Username：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <input type="text" name="username" value="New Student" /></td>
            <td width="100" height="25" align="right" valign="middle" scope="col">Password：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <input type="password" name="password" value="Password" /></td>
        </tr>
        <tr>
            <td width="100" height="25" align="right" valign="middle" scope="col">Name：</td>
            <td height="25" align="left" valign="middle" scope="col">
                <input type="text" name="name" value="Name Here" /></td>
        </tr>

        <!--Role-->
        <tr>
            <td height="30" align="right" valign="middle">Roles：</td>
            <td height="30" align="left" valign="middle">
                <select name="role">
                    <option value="1">Professor</option>
                    <option value="0" selected="selected">Student</option>
                </select>
            </td>
        </tr>


        <tr>
            <td colspan="2" height="30" align="center" valign="middle">
                <input type="hidden" name="args" value="new">
                <input type="submit" value="Submit" />
                <input type="reset" value="Undo" />
            </td>
        </tr>
    </table>
</form>
